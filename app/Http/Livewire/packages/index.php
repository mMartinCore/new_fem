<?php

// namespace App\Http\Livewire\packages;

// use App\Models\Package;
// use Livewire\Component;
// use Livewire\WithPagination;  

// class index extends Component
// { 
//     use WithPagination; 
 
//     public $modalConfirmDeleteVisible;
//     public $modalConfirmDeleteSelectedVisible;
//     public $modelId;

//     public $name;   
    
//     public $modalConfirmMergeVisible;


//     public $perPage = 5;
//     public $sortField='id';
//     public $sortAsc = true;

//     public $table_name, $model_name; 
 
//     public $orderable;

//     public string $search = '';

//     public array $selected = [];
 
 
//     public function sortBy($field)
//     {
//         if ($this->sortField === $field) {
//             $this->sortAsc = ! $this->sortAsc;
//         } else {
//             $this->sortAsc = true;
//         }

//         $this->sortField = $field;
//     }

//     public function getSelectedCountProperty()
//     {
//         return count($this->selected);
//     }

//     public function updatingSearch()
//     {
//         $this->resetPage();
//     }

//     public function updatingPerPage()
//     {
//         $this->resetPage();
//     }

//     public function resetSelected()
//     {
//         $this->selected = [];
//     }
 
//     /**
//      * The delete function.
//      *
//      * @return void
//      */
//     public function delete()
//     {
//         Package::destroy($this->modelId);
//         $this->modalConfirmDeleteVisible = false;
//         $this->resetPage();
//     }
 

//     /**
//      * Shows the delete confirmation modal.
//      *
//      * @param  mixed $id
//      * @return void
//      */
//     public function deleteShowModal($id)
//     {
//         $this->modelId = $id;
//         $this->modalConfirmDeleteVisible = true;
//     }    

    
//     public function deleteShowModalSelected()
//     {
      
//         $this->modalConfirmDeleteSelectedVisible = true;
//     }   

//     public function ShowMergeModal()
//     { 
//         $this->modalConfirmMergeVisible = true;
//     }   
//     public function mergedSelected()
//      {  
//         Package::whereIn('id', $this->selected); 
//      }

    
//     public function deleteSelected()
//     { 
//         Package::whereIn('id', $this->selected)->delete(); 
//         $this->modalConfirmDeleteSelectedVisible = false;
//         $this->resetPage();
//         $this->resetSelected();
//     }


 

//     public function render()
//     {


//         if(auth()->user()->hasRole('Admin')){
            
          
//             $data = $this->search ==''? Package::orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
//             ->paginate($this->perPage) 
//             : Package::where('tracking_number', 'LIKE', "%{$this->search}%")
    
//                ->orWhere( 'name', 'LIKE', '%'. $this->search .'%')
//                 ->orWhere( 'package_id', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'courier_status', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'payment_mode', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'payment_status', 'LIKE', '%'. $this->search .'%')
//             ->orWhere( 'status', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'price', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'weight', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'length', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'width', 'LIKE', '%'. $this->search .'%')
//             // ->orWhere( 'height', 'LIKE', '%'. $this->search .'%')
//             ->orWhere( 'description', 'LIKE', '%'. $this->search .'%') 
//             ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')->paginate($this->perPage);
//         }elseif(auth()->user()->hasRole('Super')){
   
//             $data = $this->search ==''? Package::orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
//             ->paginate($this->perPage) 
//             : Package::where('tracking_number', 'LIKE', "%{$this->search}%")    
//                ->orWhere( 'name', 'LIKE', '%'. $this->search .'%')
//                 ->orWhere( 'package_id', 'LIKE', '%'. $this->search .'%') 
//             ->orWhere( 'status', 'LIKE', '%'. $this->search .'%') 
//             ->orWhere( 'description', 'LIKE', '%'. $this->search .'%') 
//             ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')->paginate($this->perPage);
       
//         }else{

//               abort(403);

//         }



     

//         return view('livewire.packages.index', [
//             'data' =>  $data ,
//         ]);

//     }

// }