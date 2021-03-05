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
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" autocomplete="off">
            @error('name') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-4">
            <label for="msisdn">MSISDN</label>
            <input type="number" class="form-control @error('msisdn') is-invalid @enderror" id="msisdn" wire:model="msisdn" autocomplete="off" placeholder="please use prefix 628">
            @error('msisdn') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="xl_outlet_id">XL Outlet ID</label>
            <input type="text" class="form-control @error('xl_outlet_id') is-invalid @enderror" id="msisdn" wire:model="xl_outlet_id">
            @error('xl_outlet_id') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="type">Type</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" wire:model="type">
            @error('type') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="msisdn">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" wire:model="address"></textarea>
            @error('address') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="city">City</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="msisdn" wire:model="city">
            @error('city') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="province">Province</label>
            <input type="text" class="form-control @error('province') is-invalid @enderror" id="msisdn" wire:model="province">
            @error('province') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <hr>

        <div class="form-group mb-4">
            <label for="cluster_id">Cluster</label>
            <select class="custom-select" id="role" wire:model="cluster_id">
                <option value="0">Choose..</option>
                @forelse($clusters as $cluster)
                    <option value="{{ $cluster->id }}">{{ $cluster->name }}</option>
                @empty
                    <option value="0" disabled>No Cluster. Please add new one</option>
                @endforelse
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="micro_cluster">Micro Cluster</label>
            <input type="text" class="form-control @error('micro_cluster') is-invalid @enderror" id="msisdn" wire:model="micro_cluster">
            @error('micro_cluster') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="form-group mb-4">
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="save">Save</button>
        </div>
    </form>
</div>
