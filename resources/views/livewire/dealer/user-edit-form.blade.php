<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form action="" class="form">
        <div class="form-group mb-4">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" wire:model="name" autocomplete="off">
            @error('name') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email" autocomplete="off">
            @error('email') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-4">
            <label for="role">Role</label>
            <select class="custom-select" id="role" wire:model="role">
                <option value="surveyor">surveyor</option>
                <option value="admin dealer">admin dealer</option>
            </select>
        </div>

        <div class="form-group mb-4">
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="save">Update</button>
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="$emitUp('closeEdit')">Close</button>
        </div>
    </form>
</div>
