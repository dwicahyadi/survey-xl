<div>
    <form action="" class="form" wire:submit.prevent="save">
        <div class="orm-group mb-4">
            <label for="name">Role Name</label>
            @if (session()->has('message'))
                    {{ session('message') }}
            @endif
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" autocomplete="off" placeholder="type new section name then press Enter...">
            @error('name') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>
    </form>
</div>
