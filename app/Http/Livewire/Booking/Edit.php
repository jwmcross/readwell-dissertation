<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Child;
use Livewire\Component;

class Edit extends Component
{
    public Booking $booking;

    public $child;

    public array $listsForFields = [];

    public function mount(Booking $booking, Child $child)
    {
        $this->booking = $booking;
        $this->child = $child;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.booking.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->booking->save();

        return redirect()->route('admin.bookings.index');
    }

    protected function rules(): array
    {
        return [
            'booking.monday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['booking_groups'])),
            ],
            'booking.tuesday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['booking_groups'])),
            ],
            'booking.wednesday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['booking_groups'])),
            ],
            'booking.thursday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['booking_groups'])),
            ],
            'booking.friday' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['booking_groups'])),
            ],
//            'booking.child_id' => [
//                'integer',
//                'exists:children,id',
//                'nullable',
//            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['booking_groups'] = Booking::BOOKING_TYPES;
    }
}
