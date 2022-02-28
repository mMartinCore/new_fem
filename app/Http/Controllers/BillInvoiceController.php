<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem; 
use LaravelDaily\Invoices\Classes\Party;
use App\Models\Merge;
use App\Models\Package; 

use Session;
class BillInvoiceController  extends Controller
{
    public function merge_bill_invoice( $subdomain, $id)
    {
        
        $merge = Merge::findorfail($id);
        
        if (!session()->exists('merge_id') && $merge->payment_id == null) {
            return back()->with('error', 'Merge not found or already paid');
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
        $name = implode(', ', $name);
        $description = implode(', ', $description);



      if ($price > 0) { 

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
             'Please make payment before or on the day of collecting the package',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('Invoice')
            // ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
             ->status(__('DUE')) 
            ->sequence($package->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now())
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
  

public function bill_invoice( $subdomain, $id)
{

    $package = Package::findOrfail($id);
  if ($package->payment->count() < 1 && $package->price > 0) { 

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
         'Please make payment before or on the day of collecting the package',
    ];
    $notes = implode("<br>", $notes);

    $invoice = Invoice::make('Invoice')
        // ->series('BIG')
        // ability to include translated invoice status
        // in case it was paid
         ->status(__('DUE')) 
        ->sequence($package->id)
        ->serialNumberFormat('{SEQUENCE}/{SERIES}')
        ->seller($client)
        ->buyer($customer)
        ->date(now())
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






    public function invoice()
    {
  
    }
}