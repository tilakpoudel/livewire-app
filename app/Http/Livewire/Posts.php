<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule; 
use Livewire\Attributes\Title;
use Livewire\Component;

class Posts extends Component
{
    public $posts = [];
    public $postId;
    public $updateMode = false;

    #[Rule('required | min:3')] 
    public $title = '';
 
    #[Rule('required | min:5')] 
    public $body = '';
   
    #[Title('Posts')] 
    public function render()
    {
        $this->posts = Post::all();

        return view('livewire.posts');
    }
  
    private function resetInputFields(){
        $this->reset(['title', 'body']); 
    }

    public function store()
    {
        $validatedData = $this->validate();
        
        sleep(1);
        Post::create($validatedData);
  
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
       $this->validate();
        
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
