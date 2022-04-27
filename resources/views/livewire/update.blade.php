

<form>

    <div class="form-group">
        <input type="hidden" wire:model="user_id"/>
        <label for="exampleForControlInput1">Name</label>
        <input type="text" class="form-control" id="exampleFormConrollerInpu1" wire:model="name" placeholder="Ente Name" />
        @error('email')
            <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <input type="hidden" wire:model="user_id"/>
        <label for="exampleForControlInput2">Email address</label>
        <input type="text" class="form-control" id="exampleFormConrollerInpu2" wire:model="email" placeholder="Ente Email Address" />
        @error('email')
            <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>


</form>