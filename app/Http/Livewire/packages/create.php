<?php

namespace App\Http\Livewire\packages;
use Session;
use App\Helpers\Helper;
use App\Models\Package;
use App\Models\Category;
use Livewire\Component; 
use App\Models\Packagestatus;
use Livewire\WithFileUploads;

class create  extends Component
{ 

    use WithFileUploads;

    public  $tracking_number;
    public  $name;
    public  $courier;
    public  $courier_status;
    public  $payment_mode;
    public  $payment_status;
    public  $status;
    public  $price;
    public  $weight;
    public  $length;
    public  $width;
    public  $quantity;
    public  $height;
    public  $description;
    public  $user_id;
    public  $team_id;
    public  $invoice;
    public  $confirmation_photo;
    public  $packagestatus_id;
    public  $package_status_date;

    public $estimate_date;
    public $destination;
    public $category_id;

    public  $handover_date;
    public  $handovername;
 

    public $images;

    
    
   // public function mount($data=null){

   // }


    /**
     * Put your custom public properties here!
     */

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [ 
                'tracking_number' => 'required|min:1|max:100',
                'name' => 'required|min:3|max:100',
                'courier' => 'required|min:3|max:100', 
                // 'courier_status' => 'nullable|min:1|max:100',
                'packagestatus_id' => 'nullable|min:1|max:100', 
                'quantity' => 'nullable|min:1|max:10000',
                'status' => 'nullable|min:1|max:100',   
                'price'  => 'nullable|min:1|max:100',
                'weight' => 'nullable|min:1|max:100',  
                'length' => 'nullable|min:1|max:100',   
                'width' =>  'nullable|min:1|max:100',   
                'height' => 'nullable|min:1|max:100', 
                'description' => 'nullable|min:1|max:100',   
                'invoice' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:2048',  
                'confirmation_photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:4048',   
                
                'destination' => 'nullable|min:2|max:100',
                'category_id' => 'nullable|min:1|max:100',
                'estimate_date' => 'nullable|min:1|max:100',
                'handover_date' => 'nullable|min:1|max:100',
                'handovername' => 'nullable|min:1|max:100',
        ];
    }


    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
               if (Session::has('cust_id')) {
                     $this->user_id = Session::get('cust_id');
                     $this->team_id = Session::get('cust_team_id');
               }

 
        return
              [
                'tracking_number' => $this->tracking_number,
                // 'package_id' => Helper::IDGenerator(new Package, 'package_id', 5, session('client_team')->prefix??'FF'),
                'name' => $this->name,
                'courier' => $this->courier,
                 'courier_status' => $this->courier_status !=null ? $this->courier_status : 'Single',
                'packagestatus_id' => $this->packagestatus_id !=null ? $this->packagestatus_id : '1',
                'payment_mode' => $this->payment_mode !== null ? $this->payment_mode :  'Pending', 
                'payment_status' => $this->payment_status !=null ? $this->payment_status:'Unpaid', 
                'status' => $this->status  !=null ? $this->status:'Pending', 
                'package_status_date'=>$this->package_status_date?? date('Y-m-d'),
                'price' => $this->price    !=null ? $this->price:0.0,
                'quantity' => $this->quantity !=null ? $this->quantity:1,
                'weight' => $this->weight  !=null ? $this->weight:0.0,
                'length' => $this->length  !=null ? $this->length:0.0, 
                'width' => $this->width    !=null ? $this->width:0.0,
                'height' => $this->height  !=null ? $this->height:0.0, 
                'destination' => $this->destination  !=null ? $this->destination:'Ware House Address',
                'handovername' => $this->handovername, 
                'handover_date' => $this->handover_date  !=null ? date('Y-m-d', strtotime($this->handover_date) ) : null ,   
                'estimate_date' => $this->estimate_date != null ?   date('Y-m-d H:i:s', strtotime($this->estimate_date)) : null,
                'category_id' => $this->category_id??1,
                'description' => $this->description  !=null ? $this->description:'',
                'user_id' =>  $this->user_id !=null ?  $this->user_id : auth()->user()->id,
                'team_id' => $this->team_id !=null ? $this->team_id : auth()->user()->team_id, 
            ];
    }

 

    public function create()
    {
       $this->validate(); 
       $dataInfo = Package::create($this->modelData());  
                     
       if($this->invoice!=null && isset($this->invoice)){         
          $dataInfo->addMedia($this->invoice->getRealPath())->toMediaCollection('invoice');    
       }

         if ($this->confirmation_photo!=null && isset($this->confirmation_photo)) {
             $dataInfo->addMedia($this->confirmation_photo->getRealPath())->toMediaCollection('confirmation_photo');
         }
      
       session()->flash('message', 'Package  successfully created.');      
       return redirect()->route('packages.list');

    }

   
    public function render()
    {   $statuses = Packagestatus::all();    
        $categories = Category::all();
        return view('livewire.packages.create',['statuses'=>$statuses,'categories'=>$categories]);
    }
}