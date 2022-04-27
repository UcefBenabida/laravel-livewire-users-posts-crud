
        <form class="center-align col s6 m6 l6 xl6">
            <b class="center-align">Create New User</b>
            <div class="form-group">
                <label for="exampleForControlInput">Name</label>
                <input type="text" class="form-control" id="exampleFormConrollerInput2" wire:model="name" placeholder="Enter Your Name" />
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
            <button wire:click.prevent="store()" class="btn btn-seccess">Save</button>
        </form>

