<form>
    <b class="center-align">Updating {{ $name }}</b>
    <div class="form-group">
        <input type="hidden" wire:model="state.id"/>
        <label for="exampleForControlInput1">Title</label>
        <input type="text" class="form-control" id="exampleFormConrollerInpu1" wire:model="state.title" placeholder="Ente Name" />
        @error('email')
            <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleForControlInput2">Content</label>
        <input type="text" class="form-control" id="exampleFormConrollerInpu2" wire:model="state.content" placeholder="Ente Email Address" />
        @error('email')
            <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <button wire:click.prevent="updatePost()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancelPost()" class="btn btn-danger">Cancel</button>
</form>