<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;

class Post extends Component
{
    public  $posts;
    public  $post = ['id' => '', 'title' => '', 'description' => ''];
    function add()
    {
        $this->validate([
            'post.title' => 'required',
            'post.description' => 'required'
        ], [
            'post.title.required' => 'Title is required'
        ]);
        $post = new ModelsPost();
        $post->title = $this->post['title'];
        $post->description = $this->post['description'];
        $post->user_id = 1;
        $post->save();

        $this->resetData();
    }
    function edit($id)
    {
        $post = ModelsPost::find($id);
        $this->post["title"] = $post->title;
        $this->post["description"] = $post->description;
        $this->post['id'] = $post->id;
    }

    function save()
    {
        $this->validate([
            'post.title' => 'required',
            'post.description' => 'required'
        ], [
            'post.title.required' => 'Title is required'
        ]);
        $post = ModelsPost::find($this->post['id']);
        $post->title = $this->post['title'];
        $post->description = $this->post['description'];
        $post->save();
        $this->resetData();
    }

    function resetData()
    {
        $this->post = ["title" => '', 'id' => '', 'description' => ''];
    }
    public function render()
    {
        $this->posts = ModelsPost::all();
        return view('livewire.post');
    }
}
