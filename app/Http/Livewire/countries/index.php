<?php

namespace App\Http\Livewire\countries;

use App\Models\Country;
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
        Country::destroy($this->modelId);
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
        Country::whereIn('id', $this->selected)->delete(); 
        $this->modalConfirmDeleteSelectedVisible = false;
        $this->resetPage();
        $this->resetSelected();
    }


     public function mergedSelected()
     { 
        Country::whereIn('id', $this->selected); 
     }


    public function render()
    {
        $data = $this->search ==''? Country::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage) 
        : Country::where( 'name', 'LIKE', '%'. $this->search .'%')
           ->orWhere( 'short_name', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'icon', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var3', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'var4', 'LIKE', '%'. $this->search .'%')
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
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

        return view('livewire.countries.index', [
            'data' =>  $data ,
        ]);

    }

}