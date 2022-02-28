<?php

namespace App\Http\Livewire\contactsettings;

use App\Models\Contactsetting;
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
        Contactsetting::destroy($this->modelId);
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
        Contactsetting::whereIn('id', $this->selected)->delete(); 
        $this->modalConfirmDeleteSelectedVisible = false;
        $this->resetPage();
        $this->resetSelected();
    }


     public function mergedSelected()
     { 
        Contactsetting::whereIn('id', $this->selected); 
     }


    public function render()
    {
        $data = $this->search ==''? Contactsetting::orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
        ->paginate($this->perPage) 
        : Contactsetting::where('email_1', 'LIKE', "%{$this->search}%")

           ->orWhere( 'email_2', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'phone_no_1', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'phone_no_2', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'contact_title', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'content', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'google_map_1', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'google_map_2', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'team_id', 'LIKE', '%'. $this->search .'%')
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
        ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')->paginate($this->perPage);

        return view('livewire.contactsettings.index', [
            'data' =>  $data ,
        ]);

    }

}