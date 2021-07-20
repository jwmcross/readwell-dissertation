<?php

namespace App\Http\Livewire\Session;

use App\Models\Session;
use Livewire\Component;

class Create extends Component
{
    public Session $session;

    public function mount(Session $session)
    {
        $this->session = $session;
    }

    public function render()
    {
        return view('livewire.session.create');
    }

    public function submit()
    {
        $this->validate();

        $this->session->save();

        return redirect()->route('admin.sessions.index');
    }

    protected function rules(): array
    {
        return [
            'session.title' => [
                'string',
                'required',
            ],
        ];
    }
}
