<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class Users extends Component
{

    public $users, $name, $email, $user_id;
    public $updateMode = false;

    public $postUpdateMode = false;
    public $postOperation = false;
    public $selected_user_id_for_post, $selected_user_name_for_post="" ;
    public $posts, $title, $content, $post_id, $post_user_id;

    public $state = [] ;

    public function render()
    {

        $this->users = User::all();
        $this->posts = Post::all();

        return view('livewire.users');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        
    }

    public function store()
    {
        $validateDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);

        User::create($validateDate);

        session()->flash('message', 'User Created Successfully. ');

        $this->resetInputFields();
    }

    public function newPost($user_id, $user_name)
    {
        $this->postOperation = true;
        $this->selected_user_name_for_post = $user_name;
        $this->selected_user_id_for_post = $user_id;
        $this->resetPostInputFields();

    }

    public function storePost()
    {
        /*$validateData = $this->validate([
            'title' => 'required',
            'content' => 'required',

        ]);*/

        $validateData = Validator::make($this->state, [
            'title' => 'required',
            'content' => 'required',
        ])->validate();

        $validateData += [ "user_id" => $this->selected_user_id_for_post ] ;

        Post::create($validateData);

        session()->flash('message', 'User Created Successfully. ');

        $this->resetPostInputFields();
    }

    public function deletePost($id)
    {
        if($id)
        {
            Post::where('id', $id)->delete();
            session()->flash('message', 'Post Deleted Successfully.');
        }
    }

    public function editPost($id)
    {
        $this->postOperation = true;
        $this->postUpdateMode = true;
        $post = Post::find($id);
        $this->state['title'] = $post->title;
        $this->state['content'] = $post->content;
        $this->state['id'] = $id;


    }

    public function updatePost()
    {
        DB::table('posts')
              ->where('id', '=', $this->state['id'])
              ->update(['title' => $this->state['title'], 'content' => $this->state['content'] ]);
    }

    public function cancelPost()
    {
        $this->postOperation = false;
        $this->postUpdateMode = false;
        $this->resetPostInputFields();
    }

    private function resetPostInputFields()
    {
        $this->state['content'] = '';
        $this->state['title'] = '';
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;

        $this->email = $user->email;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validateDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);

        if ($this->user_id)
        {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
            'email' => $this->email,
            ]);

            $this->updateMode = false;

            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        if($id)
        {
            User::where('id', $id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
