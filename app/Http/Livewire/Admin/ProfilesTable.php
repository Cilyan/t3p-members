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
    public $only = 'all';

    protected $rules = [
        'only' => 'in:all,helpers,not-helpers',
    ];

    protected $queryString = [
        'search' => ['except' => ''],
        'only' => ['except' => 'all'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedOnly($value)
    {
        $this->validateOnly('only');
    }

    public function onOnlyChange()
    {
        switch ($this->only) {
            case 'all':
                $this->only = 'helpers';
                break;
            case 'helpers':
                $this->only = 'not-helpers';
                break;
            case 'not-helpers':
                $this->only = 'all';
                break;
            default:
                $this->only = 'all';
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

        if ($this->only == 'helpers') {
            $profilesQuery = $profilesQuery->has('helpers_active');
        }
        elseif ($this->only == 'not-helpers') {
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
