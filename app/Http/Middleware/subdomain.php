<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\models\Team;
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

        //$subdomain = Route::input('subdomain');
         $subdomain = $request->route()->parameter('subdomain');
         
         $routeName=   Route::currentRouteName() ;
      
       

        if ($routeName!='livewire.message') {
         //   dd($subdomain, Route::currentRouteName() );
              session(['subdomain' => $subdomain ]);
              $subdomain = Team::where('domain',$subdomain)->firstorFail();
              session(['client_team' => $subdomain ]);
             
            //   if ( $subdomain->carousel_img_2 !='') {
                 
            //  dd( $subdomain->carousel_txt_1);
            //   }

        }

        URL::defaults(['subdomain' => $routeName=='livewire.message' ?  session('subdomain') :$request->route()->parameter('subdomain')]) ;

      
     

    // if ($subdomain!=null) {
    //     $domain = Cache::remember('team_'.$subdomain, 1, function() use ($subdomain) {
    //         return Team::where('domain',$subdomain)->firstorFail();
    //     });
    //     Session::put('subdomain', $domain->domain);
    //     dd($subdomain ,  Session::get('subdomain'));  
    // }
    
     
          
        
         
      
        
        
       
   // if($subdomain == 'vorkkloc'){
        //     return $next($request);
        // }
        return $next($request);
    }
}
