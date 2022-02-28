<?php

use App\Models\Team;


use App\Models\User;
use App\Mail\register;
use App\Models\Package;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Teaser;   
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackConroller;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AdminController;
 
   
use App\Http\Controllers\ItemController; 
use App\Http\Controllers\pageController; 
use App\Http\Controllers\StripeController;
   

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BillInvoiceController;
use App\Http\Controllers\ContactsettingController;  
use App\Http\Controllers\MergeCheckoutChargeController;
use App\Http\Controllers\TeamController as AppTeamController;  


Route::domain('{subdomain:domain}.'.config('app.short_url'))->group(function ($subdomain) { 

 
route::get('home', [HomeController::class,'index'])->name('home');
    
    Route::get('/', function ($subdomain) {
 
 





        //  ['subdomain' => session()->exists('subdomain')? session('subdomain'): null ]
        if (!session()->exists('branches')) {
             $branches = Team::get(); 
            session(['branches'=>$branches]);
        }
    
        return view('welcome');
    });
 
     
    Route::get('pages/about',[pageController::class, 'about'])->name('pages.about');
    Route::get('pages/contact',[pageController::class, 'contact'])->name('pages.contact'); 
    Route::get('pages/rates',[pageController::class, 'rates'])->name('pages.rates');
    Route::get('pages/refund',[pageController::class, 'refund'])->name('pages.refund');
    Route::get('pages/price',[pageController::class, 'price'])->name('pages.price');
    Route::get('pages/shipping-policy',[pageController::class, 'shippingPolicy'])->name('pages.shipping-policy');

    Route::get('pages/privacy',[pageController::class, 'privacy'])->name('pages.privacy');
    Route::get('pages/term_condition',[pageController::class, 'term_condition'])->name('pages.term_condition');
 
    
    // Route::post('contacts/sendmail',[sendEmailController::class, 'mail'])->name('send.mail');        
 

    Route::get('mergeStripe/mergeCheckoutCharge', [MergeCheckoutChargeController::class, 'checkoutCharge'])->name('mergeStripe.mergeCheckoutCharge'); 
    Route::post('mergeStripe/mergeCheckoutCharge', [MergeCheckoutChargeController::class, 'mergePost'])->name('mergeStripe.mergePost');
 

    Route::get('stripe/checkoutCharge', [StripeController::class, 'checkoutCharge'])->name('stripe.checkoutCharge'); 
    Route::post('stripe/stripe', [StripeController::class, 'stripePost'])->name('stripe.stripePost');

    // mergecash
    Route::get('mergecash/checkoutCharge', [CashController::class, 'mergecash'])->name('mergecash.checkoutCharge'); 
    Route::post('mergecash/cash', [CashController::class, 'mergeCashPost'])->name('mergecash.mergeCashPost');
    

    // CASH PAYMENT
    Route::get('cash/checkoutCharge', [CashController::class, 'checkoutCharge'])->name('cash.checkoutCharge'); 
    Route::post('cash/cash', [CashController::class, 'cashPost'])->name('cash.cashPost');


    Route::get('stripe/successfulPayment', [StripeController::class, 'successfulPayment'])->name('stripe.successfulPayment');
   // Route::get('stripe', [StripeController::class, 'stripe']);




    
    require_once __DIR__.'/jetstreamRoute.php';
    require_once __DIR__.'/fortify.php';

    Route::middleware(['auth:sanctum', 'verified'])->group(function ($subdomain) {

        Route::resource('/items', ItemController::class);

        Route::get('/invoice_package/{id}', [InvoiceController::class, 'invoice_package']);
        Route::get('/mergeinvoice_package/{id}', [InvoiceController::class, 'mergeinvoice_package']);

        Route::get('merge_bill_invoice/{id}', [BillInvoiceController::class, 'merge_bill_invoice'])->name('merge_bill_invoice');

        Route::get('bill_invoice/{id}', [BillInvoiceController::class, 'bill_invoice'])->name('bill_invoice');

        Route::get('/invoice', [InvoiceController::class, 'invoice'])->name('invoice');
        
        Route::get('/buyformeInvoice/{id}', [InvoiceController::class, 'buyformeInvoice'])->name('buyformeInvoice');
        Route::get('/invoices/invoices-list/{id?}', [InvoiceController::class, 'invoiceList'])->name('invoices.invoiceList');

        Route::get('/tracks/package', [TrackConroller::class, 'track'])->name('tracks.package');
        Route::post('/tracks/searchPage', [TrackConroller::class, 'searchPage'])->name('tracks.searchPage');
        Route::post('/tracks/package', [TrackConroller::class, 'track'])->name('tracks.search');


        require_once __DIR__.'/setting.php';

        $filesName = File::files(base_path().'\routes\generateRoutes\\');
        $arr = [];
        foreach ($filesName as $file) {
            $ex = explode("\\"  , $file); 
            array_push($arr , $ex[count($ex) - 1]);
            } 
        foreach($arr as $file) {
            require_once __DIR__.'/generateRoutes/'.$file;

        }
       

        Route::get('/dashboard', function ($subdomain) {



            //$package=  package::where('user_id',auth()->user()->id)->get();
  
             return view('dashboard' );
          })->name('dashboard');







        Route::get('/teams', [AppTeamController::class, 'index'])->name('teams.index');
        Route::get('/teams/create', [AppTeamController::class, 'create'])->name('teams.create');
        // Route::post('/teams', [AppTeamController::class, 'store'])->name('teams.store');
        Route::get('/teams/{team}', [AppTeamController::class, 'show'])->name('teams.show');
        Route::get('/teams/{team}/edit', [AppTeamController::class, 'edit'])->name('teams.edit'); 
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');



  

        Route::get('role', function () {
      

         $role = Role::create(['name' => 'Super']);
        $permission = Permission::create(['name' => 'Super']);
      
         $role->givePermissionTo($permission); 

        $role = Role::findOrFail(1);
        $permission = Permission::findOrFail(1);
        $user = User::findOrFail(1); 
        $user->permissions()->sync($permission);
        $user->roles()->attach($role);  



        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Customer']);

        $permission = Permission::create(['name' => 'Admin']);
        $permission = Permission::create(['name' => 'Customer']);
        
  

        echo 'done';

        });


    });

 
}); 



 

 


 







