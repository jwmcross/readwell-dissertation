<?php

namespace App\Http\Livewire\Child;

use App\Models\Child;
use App\Models\Family;
use Livewire\Component;
use Carbon\Carbon;

class Create extends Component
{
    public Child $child;

    public $family;

    public array $listsForFields = [];

    public $age;
    public $date_of_birth;
    public $ageGroup;

    protected $messages = [
        'child.date_of_birth.before' => 'The birth date must be before today.'
    ];

    public function mount(Family $family)
    {
        $this->family = $family;
        $this->child = new Child;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.child.create');
    }

    public function updatedDateOfBirth()
    {

        //$this->date_of_birth = Carbon::parse($this->date_of_birth);
        if(is_null($this->date_of_birth)) return;

        $this->child->date_of_birth = $this->date_of_birth;
        $this->date_of_birth = $this->child->date_of_birth;

        $this->validateOnly('child.date_of_birth');
        $this->resetValidation('child.date_of_birth');

        $this->age = $this->child->age;

        if($this->child->age_year == 0 || $this->child->age_year == 1 && $this->date_of_birth < today()) {
            $this->ageGroup = '1';
            $this->child->age_group = '1';
        }
        elseif($this->child->age_year == 2) {
            $this->ageGroup = '2';
            $this->child->age_group = '2';
        }
        elseif($this->child->age_year == 3 || $this->child->age_year == 4) {
            $this->ageGroup = '3';
            $this->child->age_group = '3';
        } else {
            $this->child->age_group = null;
        }
        //dd($this->child);
    }

    public function updatedAgeGroup()
    {
        $this->child->age_group = $this->ageGroup;
    }

    public function submit()
    {
        $this->validateOnly('child.firstname');
        $this->validateOnly('child.lastname');
        $this->validateOnly('child.date_of_birth');

        $this->child->age_group = $this->ageGroup;

        $this->child->save();

        $this->family->children()->save($this->child);

        return redirect()->route('admin.families.show', $this->family);
    }

    protected function rules(): array
    {
        return [
            'child.firstname' => [
                'string',
                'required',
            ],
            'child.lastname' => [
                'string',
                'required',
            ],
            'child.middlenames' => [
                'string',
                'nullable',
            ],
            'child.date_of_birth' => [
                'nullable',
                'before:'. today(),
                //'date_format:' . config('project.date_format'),
            ]
        ];

    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['family'] = Family::pluck('family_name', 'id')->toArray();
        $this->listsForFields['age_group'] = Child::AGE_GROUP_SELECT;
    }
}
