<?php

namespace App\Http\Livewire\users;

use App\Models\User;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;  

class userList extends Component
{ 
    use WithPagination; 
 
    public $modalConfirmDeleteVisible;
    public $modalConfirmDeleteSelectedVisible;
    public $modelId;

    public $countries=null;
    public $perPage = 5;
    public $sortField='id';
    public $sortAsc = true;

    public $table_name, $model_name; 
 
    public $orderable;
    public $countryId = '';

    public string $search = '';

    public array $selected = [];
   
    public $team_id;
 
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

    public function updatingCountryId()
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
        User::destroy($this->modelId);
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
        User::whereIn('id', $this->selected)->delete(); 
        $this->modalConfirmDeleteSelectedVisible = false;
        $this->resetPage();
        $this->resetSelected();
    }


     public function mergedSelected()
     { 
        User::whereIn('id', $this->selected); 
     }



    public function mount($team_id = null)
    {  
        $this->team_id = $team_id;

        $this->countries =   Country::all();

    }


    public function render()
    {
       
        if(auth()->user()->hasRole('Admin')){

            if ($this->countryId != '') {
                $opperator = '=';
            }else{
                $opperator = '!=';
            }

            $data = $this->search ==''? User::
            where('current_team_id',auth()->user()->team_id)->
             where('users.country_id',$opperator  , $this->countryId ==''? null : $this->countryId)
            ->orderBy('users.'.$this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)  
            
            : User::where('current_team_id',auth()->user()->team_id)->where('users.country_id',$opperator  , $this->countryId ==''? null : $this->countryId)
          
            ->where('name', 'LIKE', "%{$this->search}%")
            ->where( 'email', 'LIKE', '%'.$this->search.'%') 
            ->orderBy('users.'.$this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        }
        elseif(auth()->user()->hasRole('Super')) { 

            if ($this->countryId != '') {
                $opperator = '=';
            }else{
                $opperator = '!=';
            }
          
            $data = $this->search ==''? User::where('users.country_id',$opperator  , $this->countryId ==''? null : $this->countryId)
           ->orderBy('users.'.$this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)  
            
            :User::where('users.country_id',$opperator  , $this->countryId ==''? null : $this->countryId)
            ->where('name', 'LIKE', "%{$this->search}%")
            ->where( 'email', 'LIKE', '%'. $this->search .'%') 
            ->orderBy('users.'.$this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
        }else{
            abort(404);
        }

          
        return view('livewire.users.user-list', [
            'data' =>  $data ,
        ]);

    }

}