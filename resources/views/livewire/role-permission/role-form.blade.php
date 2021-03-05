<div>
    <h4>Add New Role</h4>

    <form action="" class="form row" >
        <div class="col-8 form-group mb-4">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" id="name" wire:model="name" autocomplete="off" placeholder="type new role name then press Enter...">
            @error('name') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-4 form-group mb-4 d-flex justify-content-start">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
