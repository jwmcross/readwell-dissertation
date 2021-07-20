<?php

namespace App\Http\Livewire\Child;

use App\Models\Child;
use App\Models\Family;
use Livewire\Component;

class Edit extends Component
{
    public Child $child;

    public array $listsForFields = [];

    public function mount(Child $child)
    {
        $this->child = $child;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.child.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->child->save();

        return redirect()->route('admin.children.index');
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
                //'date_format:' . config('project.date_format'),
            ],
            'child.family_id' => [
                'integer',
                'exists:families,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['family'] = Family::pluck('family_name', 'id')->toArray();
    }
}
