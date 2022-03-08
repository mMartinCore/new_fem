<?php

namespace App\Http\Livewire\merges;

use App\Models\User;
use App\Models\Merge;
use Livewire\Component;
use Livewire\WithPagination;

class mergeList extends Component
{
    use WithPagination;

    public $modalConfirmDeleteVisible;
    public $modalConfirmDeleteSelectedVisible;
    public $modelId;

    public $user_id = null;
    public $user;

    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = true;

    public $table_name;
    public $model_name;

    public $orderable;

    public string $search = '';

    public array $selected = [];


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function mount($user_id = null)
    {
        $this->user_id = $user_id;
        if ($this->user_id) {
            $this->user = User::find($this->user_id);
            $this->user = 'Customer Name: ' . $this->user->name;
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
        Merge::destroy($this->modelId);
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
        Merge::whereIn('id', $this->selected)->delete();
        $this->modalConfirmDeleteSelectedVisible = false;
        $this->resetPage();
        $this->resetSelected();
    }


    public function mergedSelected()
    {
        Merge::whereIn('id', $this->selected);
    }


    public function render()
    {
        if (auth()->user()->hasRole('Customer')) { 
            $data = $this->search == '' ? Merge::where('user_id', auth()->user()->id)->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                ->paginate($this->perPage)
                :
                 Merge::where('user_id', auth()->user()->id)->where('name', 'LIKE', "%{$this->search}%")
                ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')->paginate($this->perPage);
        } elseif (auth()->user()->hasRole('Admin')) {
            if ($this->user_id) {
                $data = $this->search == '' ? Merge::where('user_id', $this->user_id)
                    ->where('team_id', auth()->user()->team_id)
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->paginate($this->perPage)
                    :
                    Merge::where('user_id', $this->user_id)
                    ->where('team_id', auth()->user()->team_id)
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')->paginate($this->perPage);
            } else {
                abort(404);
            }
        } elseif (auth()->user()->hasRole('Super')) {
            if ($this->user_id) {
                $data = $this->search == '' ? Merge::where('user_id', $this->user_id)
               ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
               ->paginate($this->perPage)
               :
               Merge::where('user_id', $this->user_id)
               ->where('name', 'LIKE', "%{$this->search}%")
               ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')->paginate($this->perPage);
            } else {
               
                $data = $this->search == '' ?  Merge::orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                                                ->paginate($this->perPage)
             :
                 Merge::where('name', 'LIKE', "%{$this->search}%")
                ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')->paginate($this->perPage);
            }
        } else {
            abort(404);
        }
       
        return view('livewire.merges.merge-list', [
                'data' =>  $data,
            ]);
    }
}
