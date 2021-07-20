<?php

namespace App\Http\Livewire\Register;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Booking;
use App\Models\Child;
use App\Models\Register;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Create extends Component
{
    use WithPagination;
    use WithSorting;

    //public $children;

    public $register;

    public $age_group = false;

    public $register_date;

    public array $listsForFields = [];

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'register_date',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public $startDay;

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

    public function mount()
    {
        $this->startDay = 0;
        $this->register = new Register;
        $this->register_date = ($this->register->register_date = Carbon::parse('next monday'));
        $this->initListsForFields();
        $this->sortBy            = 'lastname';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Child())->orderable;
    }

    public function render()
    {

        $age_group = $this->age_group ?? 0;
        $query = Child::with('booking')
                ->when($this->age_group>0, function($query) use($age_group){
                     $query->where('age_group', $age_group);
                })->advancedFilter([
                   's'               => $this->search ?: null,
                   'order_column'    => $this->sortBy,
                   'order_direction' => $this->sortDirection,
               ]);
        $children = $query->paginate($this->perPage);

        return view('livewire.register.create', compact('children'));
    }

    public function updatedRegisterDate()
    {
        $this->register->register_date = $this->register_date;
        $this->register_date = $this->register->register_date;
        $this->startDay = Carbon::parse($this->register->register_date)->dayOfWeek;
    }

    public function updatedAgeGroup()
    {
        $this->register->age_group = $this->age_group;
    }

    public function submit()
    {
        $this->validate();

        $this->register->save();
        $this->register->child()->sync($this->child);

        return redirect()->route('admin.registers.index');
    }

    protected function rules(): array
    {
        return [
            'register.title' => [
                'string',
                'required',
            ],
            'register.register_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'register.start_time' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'register.end_time' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'register.age_group' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['age_group'])),
            ],
            'child' => [
                'array',
            ],
            'child.*.id' => [
                'integer',
                'exists:children,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['age_group'] = Register::AGE_GROUP_SELECT;
        $this->listsForFields['booking_groups'] = Booking::BOOKING_TYPES;
        $this->listsForFields['child']     = Child::pluck('firstname', 'id')->toArray();
    }
}
