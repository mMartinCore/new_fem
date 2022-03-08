<?php

namespace App\Actions\Fortify;

use Session;
use  Newsletter;
use App\Models\Team;
use App\Models\User;
use App\Mail\register;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        if (!session()->has('client_team')) {
            abort(404);
        }
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string','min:5', 'max:255'],
            'phone' => ['required', 'string', 'min:7','max:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country_id' => ['required', 'integer'],
            'city' => ['required', 'string', 'min:3', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

                

         

           try {
               
    return DB::transaction(function () use ($input) {
        $team = Team::findorfail(session('client_team')->id);   
       $virtual_number= $team->prefix.str_pad($team->virtual_number + 1, 6, '0', STR_PAD_LEFT);

        return tap(User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'team_id' => $team->id,
            'country_id'=> $input['country_id'],
            'city'=> $input['city'],
            'virtual_number'=> $virtual_number,
            'password' => Hash::make($input['password'])

        ]), function (User $user ) use ($input, $team) {
            $team->increment('virtual_number');
            $this->addUserToClientTeam($user);
            
            $user->createAsStripeCustomer();
            $role = Role::findorfail(3);
            $user->assignRole($role);
            // $this->createTeam($user);
            
            if (!Newsletter::isSubscribed($input['email'])) {
                Newsletter::subscribe($input['email']);
                Session::flash('message', 'Visit your email and follow the Newsletter instruction!');
            }

             
            $data = [
                'name' => $input['name'],
                'url' =>  url('/')
                ,'virtual_number'=> $user->virtual_number, 
                'address'=> $user->address,
                   ];
      
            Mail::to($input['email'])->send(new register($data));


            
        });
    });
           } catch (\Throwable $th) {
                return back()->with('error', $th->getMessage());
           }        



    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */

    protected function addUserToClientTeam(User $user)
    {
        $team= session('client_team');
        $team->users()->attach(
            $user,
            ['role' => 'customer']
        );
        DB::table('users')->where('id', $user->id)->update(array('current_team_id' => session('client_team')->id));
    }

    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
            'domain' => $user->name,
        ]));
    }
}
