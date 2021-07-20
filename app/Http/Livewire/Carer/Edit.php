<?php

namespace App\Http\Livewire\Carer;

use App\Models\Carer;
use App\Models\Family;
use Livewire\Component;

class Edit extends Component
{
    public Carer $carer;

    public array $listsForFields = [];

    public function mount(Carer $carer)
    {
        $this->carer = $carer;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.carer.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->carer->save();

        return redirect()->route('admin.carers.index');
    }

    protected function rules(): array
    {
        return [
            'carer.title' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['title'])),
            ],
            'carer.firstname' => [
                'string',
                'required',
            ],
            'carer.lastname' => [
                'string',
                'required',
            ],
            'carer.address' => [
                'string',
                'required',
            ],
            'carer.post_code' => [
                'string',
                'required',
            ],
            'carer.contact_number' => [
                'string',
                'min:11',
                'required',
            ],
            'carer.work_contact_number' => [
                'string',
                'min:11',
                'nullable',
            ],
            'carer.email' => [
                'email:rfc',
                'nullable',
            ],
            'carer.national_insurance_number' => [
                'string',
                'min:9',
                'nullable',
            ],
            'carer.family_id' => [
                'integer',
                'exists:families,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['title']  = $this->carer::TITLE_SELECT;
        $this->listsForFields['family'] = Family::pluck('family_name', 'id')->toArray();
    }
}
