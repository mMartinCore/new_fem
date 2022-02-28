<?php

namespace App\Http\Livewire\packagestatuss;

use App\Models\Packagestatus;
use Livewire\Component;
use Livewire\WithPagination;  

class index extends Component
{ 
    use WithPagination; 
 
    public $modalConfirmDeleteVisible;
    public $modalConfirmDeleteSelectedVisible;
    public $modelId;


    public $perPage = 5;
    public $sortField='id';
    public $sortAsc = true;

    public $table_name, $model_name; 
 
    public $orderable;

    public string $search = '';

    public array $selected = [];
 
 
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
        Packagestatus::destroy($this->modelId);
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
        Packagestatus::whereIn('id', $this->selected)->delete(); 
        $this->modalConfirmDeleteSelectedVisible = false;
        $this->resetPage();
        $this->resetSelected();
    }


     public function mergedSelected()
     { 
        Packagestatus::whereIn('id', $this->selected); 
     }


    public function render()
    {
        $data = $this->search ==''? Packagestatus::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage) 
        : Packagestatus::where('name', 'LIKE', "%{$this->search}%")

           ->orWhere( 'description', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'user_id', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'team_id', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var5', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var6', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var7', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var8', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var9', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var10', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var11', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var12', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var13', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var14', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var15', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var16', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var17', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var18', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var19', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var20', 'LIKE', '%'. $this->search .'%')
       // ->orWhere( 'var21', 'LIKE', '%'. $this->search .'%')
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

        return view('livewire.packagestatuss.index', [
            'data' =>  $data ,
        ]);

    }

}