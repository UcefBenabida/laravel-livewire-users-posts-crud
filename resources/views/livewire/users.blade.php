<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="row">
        @if (isset($updateMode) && $updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif
        @if (isset($postOperation) && $postOperation)
            @if (isset($postUpdateMode) && $postUpdateMode)
                    @include('livewire.posts.update')
            @else
                    @include('livewire.posts.create')
            @endif
        @endif
    </div>
     
    <h4 class="center-align">Users List</h4>
    <div class="center-align row">
        <b class="col s1 m2 l3 xl1">No.</b>
        <b class="col s3 m6 l4 xl2">Name</b>
        <b class="col s5 m6 l4 xl3">Email</b>
        <b class="col s3 m6 l4 xl6">Action</b>
    </div>
        @foreach ($users as $user)
        <div class="center-align row row-user">
            <div class="col s1 m2 l3 xl1">{{ $user->id }}</div>
            <div class="col s3 m6 l4 xl2">{{ $user->name }}</div>
            <div class="col s5 m6 l4 xl3">{{ $user->email }}</div>
            <div class="col s3 m6 l4 xl6">
                    <button wire:click="edit({{ $user->id }})" class="btn btn" >Edit</button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn" >Delete</button>
                    <button wire:click="newPost({{ $user->id }}, '{{ $user->name }}') " class="btn btn" >New Post</button>
                    <button id="{{ $user->id }}-btn" onclick="togglePosts({{ $user->id }})" class="btn btn" >Show Posts</button>
            </div>
        </div>
            <div id="{{ $user->id }}-posts" class="section post-section" style="display: none">
                <b style="margin-left: 100px">Posts</b>
                <div class="center-align row">
                    <b class="col s1 m2 l3 xl1"></b>
                    <b class="col s1 m2 l3 xl1">Id</b>
                    <b class="col s3 m6 l4 xl2">Title</b>
                    <b class="col s5 m6 l4 xl3">Content</b>
                    <b class="col s3 m6 l4 xl5">Action</b>
                </div> 
                @foreach ($posts as $post)
                        @if ($post->user_id == $user->id)
                            <div class="center-align row">
                                <div class="col s1 m2 l3 xl1"></div>
                                <div class="col s1 m2 l3 xl1">{{ $post->id }}</div>
                                <div class="col s3 m6 l4 xl2">{{ $post->title }}</div>
                                <div class="col s5 m6 l4 xl3">{{ $post->content }}</div>
                                <div class="col s3 m6 l4 xl5">
                                        <button wire:click="editPost({{ $post->id }})" class="btn btn" >Edit</button>
                                        <button wire:click="deletePost({{ $post->id }})" class="btn btn" >Delete</button>
                                </div>
                            </div>
                        @endif
                @endforeach
            </div>
        @endforeach
</div>
