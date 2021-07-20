<?php

namespace App\Http\Livewire\Carer;

use App\Models\Carer;
use App\Models\Family;
use App\Models\Role;
use App\Notifications\SendParentAccessEmail;
use Livewire\Component;
use Str;

class Create extends Component
{
    public $carer;

    public $family;

    public $listsForFields = [];

    public $sendEmail = false;

    public function mount(Family $family)
    {
        $this->family = $family;
        $this->carer = new Carer;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.carer.create');
    }

    public function submit()
    {
        $this->validate();

        $this->carer->save();

        $this->family->carers()->save($this->carer);

        if($this->sendEmail) {
            $passwordString = Str::random(8);
            $user = User::create([
                'name' => $this->carer->full_name,
                'email' => $this->carer->email ?? null,
                'password' => bcrypt($passwordString),
                ]);

            $role = Role::where('title', 'Parent')->first();

            $user->roles()->attach($role);
            //$notify
            $user->notify(new SendParentAccessEmail($user->email, $passwordString));
        }

        return redirect()->route('admin.families.show', $this->family);
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
            'carer.relationship_type' => [
                'string',
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['relationship_type']))
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['title']  = Carer::TITLE_SELECT;
        $this->listsForFields['relationship_type'] = Carer::RELATIONSHIP_TYPE;
    }
}
