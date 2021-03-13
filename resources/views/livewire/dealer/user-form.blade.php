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
                <option value="">Choose</option>
                @forelse($roles as $row)
                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                @empty
                    <option value="">No role available</option>
                @endforelse
            </select>
        </div>
        <div class="form-group mb-4">
            <label for="address">Password</label>
            <div class="alert alert-info p-2">
                <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
                <span class="alert-inner--text">Password for new user is "<strong>password</strong>".</span>
                <span class="alert-inner--text">Please update password at first login.</span>
            </div>
        </div>

        <div class="form-group mb-4">
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="save">Save</button>
        </div>
    </form>
</div>
