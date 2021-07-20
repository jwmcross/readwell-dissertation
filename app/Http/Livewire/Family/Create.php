<?php

namespace App\Http\Livewire\Family;

use App\Models\Family;
use Livewire\Component;

class Create extends Component
{
    public Family $family;

    public function mount(Family $family)
    {
        $this->family = $family;
    }

    public function render()
    {
        return view('livewire.family.create');
    }

    public function submit()
    {
        $this->validate();

        $this->family->save();

        return redirect()->route('admin.families.show', $this->family);
    }

    protected function rules(): array
    {
        return [
            'family.family_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
