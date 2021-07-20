<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Child;
use Livewire\Component;

class Create extends Component
{
    public Booking $booking;

    public $child;

    public array $listsForFields = [];

    public function mount(Child $child)
    {
        $this->child = $child;
        $this->booking = new Booking;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.booking.create');
    }

    public function submit()
    {
        $this->validate();

        $this->booking->save();

        $this->child->booking()->save($this->booking);

        return redirect()->route('admin.families.show', $this->child->family);
    }

    protected function rules(): array
    {
        return [
            'booking.monday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['monday'])),
            ],
            'booking.tuesday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['tuesday'])),
            ],
            'booking.wednesday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['wednesday'])),
            ],
            'booking.thursday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['thursday'])),
            ],
            'booking.friday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['friday'])),
            ],
            'booking.child_id' => [
                'integer',
                'exists:children,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['monday']    = $this->booking::MONDAY_SELECT;
        $this->listsForFields['tuesday']   = $this->booking::TUESDAY_SELECT;
        $this->listsForFields['wednesday'] = $this->booking::WEDNESDAY_SELECT;
        $this->listsForFields['thursday']  = $this->booking::THURSDAY_SELECT;
        $this->listsForFields['friday']    = $this->booking::FRIDAY_SELECT;
        $this->listsForFields['child']     = Child::pluck('firstname', 'id')->toArray();
    }
}
