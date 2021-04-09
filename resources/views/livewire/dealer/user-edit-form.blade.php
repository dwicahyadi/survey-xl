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
                @forelse($roles as $row)
                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                @empty
                    <option value="">No role available</option>
                @endforelse
            </select>
        </div>

        <div class="form-group mb-4">
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="save">Update</button>
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="$emitUp('closeEdit')">Close</button>
        </div>
    </form>

    <form action="{{ route('dealer.user.delete',['user'=>$user]) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-block mr-2 mb-4" onclick="return confirm('Are you sure want to delete user {{ $user->name }}? This action can\'t be undone.')"><i class="fas fa-trash"></i> Delete this user</button>
    </form>
</div>
