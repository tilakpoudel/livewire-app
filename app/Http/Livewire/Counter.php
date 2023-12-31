<?php

namespace App\Http\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Counter extends Component
{
    public $count;

    public function mount($count = 0)
    {
        // sleep(2);
        $this->count = $count;
    }

    public function decrement()
    {
        $this->count--;
    }
 
    public function increment()
    {
        $this->count++;
    }

    #[Title('Counter')] 
    public function render()
    {
        return view('livewire.counter');
    }
}
