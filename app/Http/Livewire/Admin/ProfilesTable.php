<?php

namespace App\Http\Livewire\Admin;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;

class ProfilesTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $filterHelpers = 'all';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function onFilterHelpersChange()
    {
        switch ($this->filterHelpers) {
            case 'all':
                $this->filterHelpers = 'helpers';
                break;
            case 'helpers':
                $this->filterHelpers = 'not_helpers';
                break;
            case 'not_helpers':
                $this->filterHelpers = 'all';
                break;
            default:
                $this->filterHelpers = 'all';
                break;
        }
        $this->resetPage();
    }

    public function render()
    {
        $profilesQuery = Profile::where(function($query) {
            $query->where('last_name', 'like', "%{$this->search}%")
                ->orWhere('first_name', 'like', "%{$this->search}%")
                ->orWhereHas('user', function($query) {
                    $query->where('email', 'like', "%{$this->search}%");
                });
        });

        if ($this->filterHelpers == 'helpers') {
            $profilesQuery = $profilesQuery->has('helpers_active');
        }
        elseif ($this->filterHelpers == 'not_helpers') {
            $profilesQuery = $profilesQuery->doesntHave('helpers_active');
        }
        else {
            /* No extra filtering of query */
        }

        return view('livewire.admin.profiles-table', [
            "profiles" => $profilesQuery
                    ->orderBy('last_name')
                    ->orderBy('first_name')
                    ->with(['helpers_active', 'user'])
                    ->paginate(20)
        ]);
    }
}
