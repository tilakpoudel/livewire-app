<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

class Posts extends Component
{
    public $posts = [];
    public $title, $body, $postId;
    public $updateMode = false;
   
    #[Title('Posts')] 
    public function render()
    {
        $this->posts = Post::all();

        return view('livewire.posts');
    }
  
    private function resetInputFields(){
        $this->reset(['title', 'body']); 
        // $this->title = '';
        // $this->body = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        
        // sleep(1);
        Post::create($validatedDate);
  
        session()->flash('message', 'Post created successfully.');
  
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
        
        sleep(1);
        $post = Post::find($this->postId);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post updated successfully.');
        $this->resetInputFields();
    }
   
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post deleted successfully.');
    }
}
