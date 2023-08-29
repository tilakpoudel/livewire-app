<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Posts extends Component
{
    public $title = 'Post title...';
    public $posts = [];

    public function render()
    {
        return view('livewire.posts')->with([
            'author' => Auth::user()?->name,
        ]);
    }
}
