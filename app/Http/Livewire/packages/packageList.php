<?php

namespace App\Http\Livewire\packages;

use App\Models\User;
use App\Models\Merge;
use App\Models\Package;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\Packagestatus;
use Dompdf\Positioner\Absolute;
use Livewire\WithPagination;  
use Illuminate\Support\Facades\DB;
use Session;

class packageList extends Component
{ 
    use WithPagination; 
 
    public $modalConfirmDeleteVisible;
    public $modalConfirmDeleteSelectedVisible;
    public $modalConfirmMergeVisible;

    public $name;

    public $modelId;
    public $user;


    public $perPage = 5;
    public $sortField='id';
    public $sortAsc = true;

    public $table_name, $model_name; 
 
    public $orderable;

    public string $search = '';

    public array $selected = [];
 
    public $user_id = null;
    public $team_id = '';

    public function mount($user_id = null)
    { 
        $this->user_id = $user_id;
        if ($this->user_id) {
            $this->user = User::findorfail($this->user_id);
            $this->user ='Customer Name: '. $this->user->name; 
        } 
 
    }
 
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }
 
    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Package::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }
 

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }    

    
    public function deleteShowModalSelected()
    {
      
        $this->modalConfirmDeleteSelectedVisible = true;
    }   

    
    public function deleteSelected()
    { 

        foreach ($this->selected as $id) {

          $package=  Package::findorfail($id);
          if ($package->price > 0 &&$package->price != null) {
               dd('You can not delete a package with a price');
          }else{
              $package->delete();
          }

        }
        // Package::whereIn('id', $this->selected)->delete(); 
        $this->modalConfirmDeleteSelectedVisible = false;
        $this->resetPage();
        $this->resetSelected();
    }



    public function rules()
    {
        return [  
                'name' => 'required|min:3|max:100',     
        ];
    }
  

    public function ShowMergeModal()
    { 
        $this->modalConfirmMergeVisible = true;
 
    }   
    public function mergedSelected()
     {  
        $this->validate(); 
        if (Session::has('cust_id')) {
            $this->user_id = Session::get('cust_id');
            $this->team_id = Session::get('cust_team_id');
         }
        try {
        $get_team_id = Package::findorfail(min($this->selected) )->first('team_id'); 
        $letter=chr(rand(65,90));
        $num=rand(2,100);
      
        DB::Transaction(function () use ($get_team_id, $letter, $num) {
            $merge=Merge::create([
            'name' => $this->name.' '.$letter.$num,
            'packagestatus_id' => Packagestatus::STATUS_PENDING,
            'user_id' =>  $this->user_id !=null ?  $this->user_id : auth()->user()->id,
            'team_id' => $this->team_id !=null? $this->team_id : auth()->user()->team_id, 
         
        ]);

        $packages = Package::whereIn('id', $this->selected)->get();
        foreach ($packages as $package) {
            $package->courier_status = 'Merged';    
            $package->save();
        }

            $merge->packages()->attach($this->selected);
        });
        } catch (\Exception $exception) {
            dd($exception);
            session()->flash('error', $exception->getMessage());   
            return url()->previous();;
        }
        $this->modalConfirmMergeVisible = false;
        $this->resetPage();
        $this->resetSelected();
        session()->flash('message', 'Package Merged successfully .');   
        return redirect()->route('merges.merge-list');

     }

  

    public function render()
    { 

        
 
        if(auth()->user()->hasRole('Customer')){ 
            $data = $this->search ==''? Package::where('user_id',  auth()->user()->id)

            ->where('courier_status','!=', 'Merged')
            ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
            ->paginate($this->perPage) 
            : Package::where('user_id',  auth()->user()->id)
            ->where('courier_status','!=', 'Merged')
            ->where('tracking_number', 'LIKE', "%{$this->search}%")
               ->orWhere( 'name', 'LIKE', '%'. $this->search .'%')
               ->orWhere( 'package_id', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'courier', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'courier_status', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'payment_mode', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'payment_status', 'LIKE', '%'. $this->search .'%')
            ->orWhere( 'status', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'price', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'weight', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'length', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'width', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'height', 'LIKE', '%'. $this->search .'%')
            ->orWhere( 'description', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'user_id', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'team_id', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'var16', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'var17', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'var18', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'var19', 'LIKE', '%'. $this->search .'%')
            // ->orWhere( 'var20', 'LIKE', '%'. $this->search .'%')
           // ->orWhere( 'var21', 'LIKE', '%'. $this->search .'%')
            ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')->paginate($this->perPage);

        }elseif(auth()->user()->hasRole('Admin')){
         
            $data = $this->search ==''? Package::where('user_id',  auth()->user()->id)

            ->where('courier_status','!=', 'Merged')
            ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
            ->paginate($this->perPage) 
            : Package::where('user_id',  auth()->user()->id)
            ->where('courier_status','!=', 'Merged')
            ->where('tracking_number', 'LIKE', "%{$this->search}%")
            ->orWhere( 'name', 'LIKE', '%'. $this->search .'%')
            ->orWhere( 'package_id', 'LIKE', '%'. $this->search .'%') 
            ->orWhere( 'status', 'LIKE', '%'. $this->search .'%') 
            ->orWhere( 'description', 'LIKE', '%'. $this->search .'%') 
            ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')->paginate($this->perPage);

       
        }
        elseif(auth()->user()->hasRole('Super')){
    
      
        if ($this->user_id !=null) {
                $data = $this->search ==''?
            Package::where('user_id', $this->user_id)
            ->where('courier_status', '!=', 'Merged')
            ->where('handover_date', null)->where('handovername', null)
            ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
            ->paginate($this->perPage)
            :
            Package::where('user_id', $this->user_id)
            ->where('courier_status', '!=', 'Merged')
            ->where('courier', 'LIKE', "%{$this->search}%")
            ->where('tracking_number', 'LIKE', "%{$this->search}%")
            ->orWhere('name', 'LIKE', '%'. $this->search .'%')
            ->orWhere('package_id', 'LIKE', '%'. $this->search .'%')
            ->orWhere('status', 'LIKE', '%'. $this->search .'%')
            ->orWhere('description', 'LIKE', '%'. $this->search .'%')
            ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
            ->paginate($this->perPage);
            }
            else{

                $data = $this->search ==''?
                Package::where('courier_status', '!=', 'Merged')
                ->where('handover_date', null)->where('handovername', null)
                ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
                ->paginate($this->perPage)
                :
                Package::where('courier_status', '!=', 'Merged')
                ->where('courier', 'LIKE', "%{$this->search}%")
                ->where('tracking_number', 'LIKE', "%{$this->search}%")
                ->orWhere('name', 'LIKE', '%'. $this->search .'%')
                ->orWhere('package_id', 'LIKE', '%'. $this->search .'%')
                ->orWhere('status', 'LIKE', '%'. $this->search .'%')
                ->orWhere('description', 'LIKE', '%'. $this->search .'%')
                ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
                ->paginate($this->perPage);
            }

        }else{
            abort(404);
          }

            

        return view('livewire.packages.package-list', [
            'data' =>  $data ,
        ]);

    }

}