<?php

namespace App\Http\Livewire\packages;

use App\Models\Package;

use App\Models\Category;
use Livewire\Component; 
use App\Mail\receivePackage;
use App\Models\Packagestatus;
use Livewire\WithFileUploads;
use App\Mail\intransitPackage;
use App\Mail\pendingQuotePackage;
use App\Mail\readyForPickupPackage;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;

class edit extends Component
{ 
    use WithFileUploads;
   
    protected Package $model_data;
  
    public $modelId;
  
    public  $tracking_number;
    public  $name;
    public  $courier;
    public  $courier_status;
    public  $payment_mode;
    public  $payment_status;
    public  $status;
    public  $price;
    public  $weight;
    public  $quantity;
    public  $length;
    public  $width;
    public  $height;
    public  $description;
    public  $user_id;
    public  $team_id;
    public  $invoice;
    public  $new_invoice;
    public  $new_confirmation_photo;
    public  $packagestatus_id;
    public  $original_status;
    public  $package_status_date;
    public $images;
    
    public $estimate_date;
    public $destination;
    public $category_id;

    public $custData;

    public  $handover_date;
    public  $handovername;
 

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
            'courier' => 'required|min:2|max:100', 
            'destination' => 'nullable|min:2|max:100',
            'category_id' => 'nullable|min:1|max:100',
            'estimate_date' => 'nullable|min:1|max:100',
            'handover_date' => 'nullable|min:1|max:100',
            'handovername' => 'nullable|min:1|max:100',
            // 'courier_status' => 'nullable|min:1|max:100', 
            'packagestatus_id' => 'nullable|min:1|max:100',
            'status' => 'nullable|min:1|max:100',   
            'price'  => 'nullable|min:1|max:100',
            'quantity' => 'nullable|min:1|max:10000',
            'weight' => 'nullable|min:1|max:100',  
            'length' => 'nullable|min:1|max:100',   
            'width' =>  'nullable|min:1|max:100',   
            'height' => 'nullable|min:1|max:100', 
            'description' => 'nullable|max:100',   
            'new_invoice' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:4048', 
            'new_confirmation_photo' => 'nullable|mimes:jpeg,png,jpg,gif|max:4048',    
    ];
    }


    

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = $this->model_data; 
        $this->custData = $data;
        // Assign the variables here

        $this->tracking_number = $data->tracking_number;
        $this->name = $data->name;
        $this->courier = $data->courier;
      //  $this->courier_status = $data->courier_status;
        $this->packagestatus_id = $data->packagestatus_id;
        $this->payment_mode = $data->payment_mode;
        $this->payment_status = $data->payment_status;
        $this->status = $data->status; 
        $this->original_status = $data->packagestatus_id;
        $this->price = $data->price;
        $this->weight = $data->weight;
        $this->quantity = $data->quantity;
        $this->length = $data->length;
        $this->width = $data->width;
        $this->height = $data->height;
        $this->description = $data->description;
        $this->user_id = $data->user_id;
        $this->team_id = $data->team_id; 
        $this->invoice = $data->invoice;
        $this->package_status_date = $data->package_status_date;
        $this->confirmation_photo = $data->confirmation_photo;
        $this->estimate_date = $data->estimate_date;
        $this->destination = $data->destination;
        $this->category_id = $data->category_id;
        $this->handover_date = $data->handover_date;
        $this->handovername = $data->handovername;


    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */

  Public function setPackageStatus(){

    if ($this->original_status == $this->packagestatus_id) { 

    }else{
    

        
          if ($this->packagestatus_id==Packagestatus::STATUS_PENDING) {
              $this->packagestatus_id = Packagestatus::STATUS_PENDING;
              $this->package_status_date = now();

          
         
          }

          if ($this->packagestatus_id==Packagestatus::STATUS_RECEIVED) {
              $this->packagestatus_id = Packagestatus::STATUS_RECEIVED;
              $this->package_status_date = now();
              $data = [
                'name' => $this->custData->user->name,
                'url' =>  url('/'),
                'package_name' =>  $this->name,
                'description' => $this->description,
                'tracking_number' => $this->tracking_number, 
                'package_id' => $this->custData->package_id,

                   ];
      
            Mail::to($this->custData->user->email)->send(new receivePackage($data));
          }

          if ($this->packagestatus_id==Packagestatus::STATUS_INTRANSIT) {
              $this->packagestatus_id = Packagestatus::STATUS_INTRANSIT;
              $this->package_status_date = now();

              $data = [
                'name' => $this->custData->user->name,
                'url' =>  url('/'),
                'package_name' =>  $this->name,
                'description' => $this->description,
                'tracking_number' => $this->tracking_number, 
                'package_id' => $this->custData->package_id,
                'destination' => $this->destination,

                   ];
      
            Mail::to($this->custData->user->email)->send(new intransitPackage($data));
          }

          if ($this->packagestatus_id==Packagestatus::STATUS_DELIVERED) {
              $this->packagestatus_id = Packagestatus::STATUS_DELIVERED;
              $this->package_status_date = now();        

          }
          

          if ($this->packagestatus_id==Packagestatus::STATUS_PENDING_QUOTE) {
              $this->packagestatus_id = Packagestatus::STATUS_PENDING_QUOTE;
              $this->package_status_date = now();

              $data = [
                'name' => $this->custData->user->name,
                'url' =>  url('/'),
                'package_name' =>  $this->name,
                'description' => $this->description,
                'tracking_number' => $this->tracking_number, 
                'package_id' => $this->custData->package_id,

                   ];
      
            Mail::to($this->custData->user->email)->send(new pendingQuotePackage($data));

          }

          if ($this->packagestatus_id==Packagestatus::STATUS_READY_FOR_PICKUP) {
              $this->packagestatus_id = Packagestatus::STATUS_READY_FOR_PICKUP;
              $this->package_status_date = now();

              $data = [
                'name' => $this->custData->user->name,
                'url' =>  url('/'),
                'package_name' =>  $this->name,
                'description' => $this->description,
                'tracking_number' => $this->tracking_number, 
                'package_id' => $this->custData->package_id,
                'destination' => $this->destination,
                   ];
      
            Mail::to($this->custData->user->email)->send(new readyForPickupPackage($data));

          }

    }
  }


    public function modelData()
    {
      $this->setPackageStatus();
        return
              [  
                'tracking_number' => $this->tracking_number,
                'name' => $this->name,
                'courier' => $this->courier,
              //  'courier_status' => $this->courier_status !=null ? $this->courier_status : 'Single',
                'packagestatus_id' => $this->packagestatus_id !=null ? $this->packagestatus_id : 1,
                // 'payment_mode' => $this->payment_mode !== null ? $this->payment_mode :  'Pending', 
                // 'payment_status' => $this->payment_status !=null ? $this->payment_status:'Unpaid', 
                'status' => $this->status ,  
                'package_status_date'=>$this->package_status_date,
                'price' => $this->price    !=null ? $this->price:0.00,
                'weight' => $this->weight  !=null ? $this->weight:0.0,
                'quantity' => $this->quantity  !=null ? $this->quantity:1,
                'length' => $this->length  !=null ? $this->length:0.0, 
                'width' => $this->width    !=null ? $this->width:0.0,
                'height' => $this->height  !=null ? $this->height:0.0,
                'description' => $this->description  !=null ? $this->description:'',
                'destination' => $this->destination  !=null ? $this->destination:'Ware House Address',
                'handovername' => $this->handovername, 
                'handover_date' => $this->handover_date  !=null ? date('Y-m-d', strtotime($this->handover_date) ) : null ,   
                'estimate_date' => $this->estimate_date != null ?   date('Y-m-d H:i:s', strtotime($this->estimate_date)) : null,
                'category_id' => $this->category_id,
                // 'user_id' => $this->user_id !=null ? $this->user_id : auth()->user()->id,
                // 'team_id' => $this->team_id !=null ? $this->team_id : auth()->user()->current_team_id,
            ];
    }


    /**
     * The update function
     *
     * @return void
     */

    public function update()
    {
       $this->validate();

       $data_saved = Package::findOrfail($this->modelId);
       $data_saved->update($this->modelData());        
     
         if($this->new_invoice!=null && isset($this->new_invoice)){ 

            if(isset($data_saved->invoice)) {

                $data_saved->invoice->delete();

            }   

            $data_saved->addMedia($this->new_invoice->getRealPath())
            ->usingName($this->new_invoice->getClientOriginalName())->toMediaCollection('invoice');

          } 

            if ($this->new_confirmation_photo!=null && isset($this->new_confirmation_photo)) {
                if (isset($data_saved->confirmation_photo)) {
                    $data_saved->confirmation_photo->delete();
                }

                $data_saved->addMedia($this->new_confirmation_photo->getRealPath())
                ->usingName($this->new_confirmation_photo->getClientOriginalName())->toMediaCollection('confirmation_photo');
            }




       session()->flash('message', 'Package  successfully updated.'); 
       return       redirect()->to('packages/list');
      

    }



     public function mount(Package $package)
    {
        $this->model_data = $package;
        $this->modelId    = $this->model_data->id;
        $this->loadModel(); 
    }

 

    public function render()
    {
        $statuses = Packagestatus::all();
        $categories = Category::all();

        return view('livewire.packages.edit',['statuses'=>$statuses,'categories'=>$categories]);
    
 
    }
}