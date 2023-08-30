<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Posts extends Component
{
    public $posts = [
        [
            'id' => 1,
            'title' => 'title',
            'body' => 'body ',
        ]
    ];
    public $title, $body, $postId;
    public $updateMode = false;
   
    public function render()
    {
        return view('livewire.posts');
    }
  
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        Post::create($validatedDate);
  
        session()->flash('message', 'Post Created Successfully.');
  
        $this->resetInputFields();
    }
  
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->title = $post->title;
        $this->body = $post->body;
        $this->postId = $id;
  
        $this->updateMode = true;
    }
  
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        $post = Post::find($this->postId);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }
   
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
