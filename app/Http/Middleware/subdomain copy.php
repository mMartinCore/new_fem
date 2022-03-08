<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Models\Team;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class subdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {      
             
      
        if ( $request->route()->parameter('subdomain')) {         
           
           //$subdomain = Route::input('subdomain');
            $subdomain = $request->route()->parameter('subdomain');
         
            $routeName=   Route::currentRouteName(); 
       
            if ($routeName!='livewire.message') {
                //dd($subdomain, Route::currentRouteName() );
                session(['subdomain' => $subdomain ]);
                $subdomain = Team::where('domain', $subdomain)->first();
                if ($subdomain ) { 
                    session(['client_team' => $subdomain ]);  
                }elseif(  $request->route()->parameter('subdomain')=="fempire_live"){
                    
                    
                    return redirect()->route('welcome', ['noBranch' => "nonBranch"]) ;
                }
               
             
            }

            URL::defaults(['subdomain' => $routeName=='livewire.message' ?  session('subdomain') : $request->route()->parameter('subdomain')]);
 
            return $next($request);
        } 

        $routeName=   Route::currentRouteName(); 

        if ($routeName!='livewire.message') {

            Session::forget('client_team');
            // $subdomain = Team::findorFail(1);
            // session(['client_team' => $subdomain ]);
            URL::defaults(['subdomain' => 'FEMPIRE_LIVE']);                

        }else{
            URL::defaults(['subdomain' => $routeName=='livewire.message' ?  session('subdomain') : $request->route()->parameter('subdomain')]);
           
        }
 

        return $next($request);
    }
}
