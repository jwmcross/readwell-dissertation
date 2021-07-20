<?php

namespace App\Http\Livewire\Register;

use App\Models\Child;
use App\Models\Register;
use Livewire\Component;

class Edit extends Component
{
    public array $child = [];

    public Register $register;

    public array $listsForFields = [];

    public function mount(Register $register)
    {
        $this->register = $register;
        $this->child    = $this->register->child()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.register.edit');
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
        $this->listsForFields['age_group'] = $this->register::AGE_GROUP_SELECT;
        $this->listsForFields['child']     = Child::pluck('firstname', 'id')->toArray();
    }
}
