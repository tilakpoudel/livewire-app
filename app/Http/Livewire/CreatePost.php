<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public $title = 'Post title...';
    public $posts = [];

    public function render()
    {
        return view('livewire.create-post')->with([
            'author' => Auth::user()?->name,
        ]);
    }
}
