<?php

namespace App\Http\Controllers;

use Session;

use App\Models\User;
use App\Models\Merge;
use App\Models\Package;
use App\Models\Buyforme;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem; 

class InvoiceController extends Controller
{
    public function invoice_package(Request $request)
    {
        $package = Package::findOrfail($request->id);
      if ($package->paid()->payment_id !='') { 

        $client = new Party([
            'name'          => 'Fempirefreight',
            'address'       => 'Hartlepool Enterprise Centre,Brougham Terrace,Unit 33 ,Hartlepool,TS248EY.',
            'phone'         => '+447717750364',
            'custom_fields' => [
                'Email'        => 'info@fempirefreight.com',
            ],
        ]);

        $customer = new Party([
            'name'          => $package->user->name,
            'address'       =>  $package->user->address,
            'phone'         =>  $package->user->phone,
            'custom_fields' => [
                'Payment Id'        =>  $package->paid()->payment_id ,
                'Payment Mode ' =>  $package->paid()->payment_mode ,
                'Email'        =>  $package->user->email,

            ],
        ]);

        $items = [
            (new InvoiceItem())
                ->title($package->name)
                ->description($package->description)
                ->pricePerUnit($package->price)
                ->quantity($package->quantity)
                ->discount(0),
            // (new InvoiceItem())->title('Service 5')->pricePerUnit(58.18)->quantity(33)->discount(3),
        ];

        $notes = [
             'Please show this receipt when you receive the package',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            // ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
             ->status(__('PAID'))
            // ->status(__('Due'))
            ->sequence($package->paid()->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date($package->paid()->created_at)
            ->dateFormat('m/d/Y')
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . '_' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}
  


public function mergeinvoice_package( $subdomain, $id)
    { 
     

         $merge = Merge::findOrfail($id);
        if ( $merge->payment_id == null) {
            return back()->with('error', 'No payment is available');
        }


        $price=null;
        $description=null;
        $name=null;
        $user_package=null;
        $get_user=false;

        foreach ($merge->packages as $package )
        {
           
            if(!$get_user && $package->user_id != null){
                $get_user=true; 
                $user_package = $package;
            }
          
            $name []= $package->name;

            $description []=$package->description; 
            
            if ($package->payment->count()<1) {  
                $total= $package->quantity * $package->price;
                $price += $total;  
             
            }
        } 

        $client = new Party([
            'name'          => 'Fempirefreight',
            'address'       => 'Hartlepool Enterprise Centre,Brougham Terrace,Unit 33 ,Hartlepool,TS248EY.',
            'phone'         => '+447717750364',
            'custom_fields' => [
                'Email'        => 'info@fempirefreight.com',
            ],
        ]);

        $customer = new Party([
            'name'          => $user_package->user->name,
            'address'       =>  $user_package->user->address,
            'phone'         =>  $user_package->user->phone,
            'custom_fields' => [
                'Payment Id'        =>  $merge->payment_id ,
                'Payment Mode ' =>  $user_package->paid()->payment_mode ,
                'Email'        =>  $user_package->user->email,

            ],
        ]);

        foreach ($merge->packages as $package) {

            $invoice=  new InvoiceItem();
                 $invoice->title($package->name)
                 ->description($package->description)
                 ->pricePerUnit($package->price)
                 ->quantity($package->quantity)
                 ->discount(0);

                 $items[] = $invoice;
            }

        $notes = [
             'Please show this receipt when you receive the package',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            // ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
             ->status(__('PAID'))
            // ->status(__('Due'))
            ->sequence($package->paid()->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date($package->paid()->created_at)
            ->dateFormat('m/d/Y')
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . '_' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
 
} 







    public function invoice()
    {
        if (Session::has('invoice_package_id')) {
            $client = new Party([
                    'name'          => 'Roosevelt Lloyd',
                    'address'       => 'Hartlepool Enterprise Centre,Brougham Terrace,Unit 33 ,Hartlepool,TS248EY.',
                    'phone'         => '+447717750364',
                    'custom_fields' => [
                        'Email'        => 'info@fempirefreight.com',
                    ],
                ]);
        
            $customer = new Party([
                    'name'          => 'Ashley Medina',
                    'address'       => 'The Green Street 12',
                    'code'          => '#22663214',
                    'custom_fields' => [
                        'order number' => '> 654321 <',
                    ],
                ]);
        
            $items = [
                    (new InvoiceItem())
                        ->title('Service 1')
                        ->description('Your product or service description')
                        ->pricePerUnit(47.79)
                        ->quantity(2)
                        ->discount(10),
                    (new InvoiceItem())->title('Service 2')->pricePerUnit(71.96)->quantity(3)->discount(3),
                    // (new InvoiceItem())->title('Service 3')->pricePerUnit(4.56)->quantity(5)->discount(3),
                    // (new InvoiceItem())->title('Service 4')->pricePerUnit(76.32)->quantity(2)->discount(3),
                    // (new InvoiceItem())->title('Service 5')->pricePerUnit(58.18)->quantity(33)->discount(3),
                ];
        
            $notes = [
                    'your multiline',
                    'additional notes',
                    'in regards of delivery or something else',
                ];
            $notes = implode("<br>", $notes);
        
            $invoice = Invoice::make('receipt')
                    ->series('BIG')
                    // ability to include translated invoice status
                    // in case it was paid
                     ->status(__('PAID'))
                    ->status(__('Due'))
                    ->sequence(667)
                    ->serialNumberFormat('{SEQUENCE}/{SERIES}')
                    ->seller($client)
                    ->buyer($customer)
                    ->date(now()->subWeeks(3))
                    ->dateFormat('m/d/Y')
                    ->payUntilDays(14)
                    ->currencySymbol('$')
                    ->currencyCode('USD')
                    ->currencyFormat('{SYMBOL}{VALUE}')
                    ->currencyThousandsSeparator('.')
                    ->currencyDecimalPoint(',')
                    ->filename($client->name . ' ' . $customer->name)
                    ->addItems($items)
                    ->notes($notes)
                    ->logo(public_path('vendor/invoices/sample-logo.png'))
                    // You can additionally save generated invoice to configured disk
                    ->save('public');
        
            $link = $invoice->url();
            // Then send email to party with link
        
            // And return invoice itself to browser or have a different view
            return $invoice->stream();
        }
    }







    public function buyformeInvoice(  $subdomain, $id)
    {
    
        try {
            
            $buyforme = Buyforme::findOrfail($id);
            if ($buyforme->status =='paid') {
                $client = new Party([
              'name'          => 'Fempirefreight',
              'address'       => 'Hartlepool Enterprise Centre,Brougham Terrace,Unit 33 ,Hartlepool,TS248EY.',
              'phone'         => '+447717750364',
              'custom_fields' => [
                  'Email'        => 'info@fempirefreight.com',
              ],
          ]);
  
                $customer = new Party([
              'name'          => $buyforme->user->name,
              'address'       =>  $buyforme->user->address,
              'phone'         =>  $buyforme->user->phone,
              'custom_fields' => [
                  'Payment Id'        =>  $buyforme->payment_id ,
                  'Payment Mode ' =>  $buyforme->payment->payment_mode ,
                  'Email'        =>  $buyforme->user->email,
  
              ],
          ]);
                //BUY_FORME_FEE shoulde be static and not changeable after payment
                $items = [
              (new InvoiceItem())
                  ->title($buyforme->name)
                  ->description($buyforme->description)
                  ->pricePerUnit(Buyforme::BUY_FORME_FEE)
                  ->quantity(1)
                  ->discount(0),
              // (new InvoiceItem())->title('Service 5')->pricePerUnit(58.18)->quantity(33)->discount(3),
          ];
  
                $notes = [
               'Please show this receipt when you receive the package',
          ];
                $notes = implode("<br>", $notes);
  
                $invoice = Invoice::make('receipt')
              // ->series('BIG')
              // ability to include translated invoice status
              // in case it was paid
               ->status(__('PAID'))
              // ->status(__('Due'))
              ->sequence($buyforme->id)
              ->serialNumberFormat('{SEQUENCE}/{SERIES}')
              ->seller($client)
              ->buyer($customer)
              ->date($buyforme->created_at)
              ->dateFormat('m/d/Y')
              ->currencySymbol('$')
              ->currencyCode('USD')
              ->currencyFormat('{SYMBOL}{VALUE}')
              ->currencyThousandsSeparator('.')
              ->currencyDecimalPoint(',')
              ->filename($client->name . '_' . $customer->name)
              ->addItems($items)
              ->notes($notes)
              ->logo(public_path('vendor/invoices/sample-logo.png'))
              // You can additionally save generated invoice to configured disk
              ->save('public');
  
                $link = $invoice->url();
                // Then send email to party with link
  
                // And return invoice itself to browser or have a different view
                return $invoice->stream();
            }else {
                return back()->with('error', 'Not Paid Yet'); 
            }
        } 
        catch(\Throwable $exception) {
            return back()->with('error', $exception->getMessage());  
        }
    

    }
    





    public function invoiceList($subdomain, $id=null){
        $user = null;
        if ($id) { 
            if(auth()->user()->hasRole('Super') || auth()->user()->hasRole('Admin')){ 
                $user = User::findOrfail($id); 
                $packages = $user->package->where('payment_status', 'Unpaid')->where('price','>',0);    
            } else{    
                return back()->with('error', 'You are not authorized to access this page');        
        
            } 
        }else{

            if(auth()->user()->hasRole('Super') || auth()->user()->hasRole('Admin')){ 
               
                $packages = Package::where('payment_status', 'Unpaid')->where('price','>',0)->get();;    
            } else{    
                $packages =  auth()->user()->package->where('payment_status', 'Unpaid')->where('price','>',0);    
        
            }
           
        }
     
        return view('invoices.invoices-list',compact('packages','user'));

    }


}