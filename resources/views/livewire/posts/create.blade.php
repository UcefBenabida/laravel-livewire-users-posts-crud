


<form class="center-align col s6 m6 l6 xl6">
    <b>Create New Post For {{ $selected_user_name_for_post }}</b>
    <div class="form-group">
        <label for="exampleForControlInput">Title</label>
        <input type="text" class="form-control" id="exampleFormConrollerInput1" wire:model="state.title" placeholder="Enter A Post" />
        @error('title')
            <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleForControlInput2">Content</label>
        <input type="text" class="form-control" id="exampleFormConrollerInpu2" wire:model="state.content" placeholder="Descreption" />
        @error('content')
            <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <button wire:click.prevent="storePost()" class="btn btn-seccess">Save</button>
    <button wire:click.prevent="cancelPost()" class="btn btn-seccess">Cancel</button>
</form>