<?php

namespace App\Http\Livewire\teams;

use App\Models\Team;
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
       if ($field !='') {
        
            if ($this->sortField === $field) {
                $this->sortAsc = ! $this->sortAsc;
            } else {
                $this->sortAsc = true;
            }

            $this->sortField = $field;
        }
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
        Team::destroy($this->modelId);
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
        Team::whereIn('id', $this->selected)->delete(); 
        $this->modalConfirmDeleteSelectedVisible = false;
        $this->resetPage();
        $this->resetSelected();
    }


     public function mergedSelected()
     { 
        Team::whereIn('id', $this->selected); 
     }


    public function render()
    {
        $data = $this->search ==''? Team::orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')
        ->paginate($this->perPage) 
        : Team::where('name', 'LIKE', "%{$this->search}%")

           ->orWhere( 'domain', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'logo_title', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'team_logo', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'theme_color', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'theme_color_hover', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'instagram_link', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'fackbook_link', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'whatsapp_link', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'twitter_link', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'content_link', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'content_title', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'content', 'LIKE', '%'. $this->search .'%')
        // ->orWhere( 'carousel_txt_1', 'LIKE', '%'. $this->search .'%') 

        ->orderBy($this->sortField, $this->sortAsc ? 'desc':'asc')->paginate($this->perPage);

        return view('livewire.teams.index', [
            'data' =>  $data ,
        ]);

    }

}