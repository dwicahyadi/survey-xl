<div>
    <h4>Add New</h4>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form action="" class="form">
        <div class="form-group mb-4">
            <label for="name">Cluster Name</label>
            <input type="text" class="form-control" id="name" wire:model="name" autocomplete="off">
            @error('name') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-4">
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="save">Save</button>
        </div>
    </form>
</div>
