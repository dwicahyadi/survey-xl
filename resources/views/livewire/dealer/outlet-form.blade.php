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
            <label>Outlet Type</label>
            <select class="custom-select @error('type') is-invalid @endif" id="role" wire:model="type">
                <option value="0">Choose..</option>
                @forelse($types as $opt_type)
                    <option value="{{ $opt_type->name }}">{{ $opt_type->name }}</option>
                @empty
                    <option value="0" disabled>No Outlet Type!</option>
                @endforelse
            </select>
            @error('type') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="form-group mb-4">
            <label for="msisdn">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" wire:model="address"></textarea>
            @error('address') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="form-group mb-4">
            <label for="province">Province</label>
            <select class="custom-select @error('province') is-invalid @endif" id="role" wire:model="province">
                <option value="0">Choose..</option>
                @forelse($provinces as $opt_province)
                    <option value="{{ $opt_province }}">{{ $opt_province->name }}</option>
                @empty
                    <option value="0" disabled>No Province. Please add new one</option>
                @endforelse
            </select>
            @error('province') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="province">City</label>
            <select class="custom-select @error('city') is-invalid @endif" id="role" wire:model="city">
                <option value="0">Choose..</option>
                @forelse($cities as $opt_city)
                    <option value="{{ $opt_city }}">{{ $opt_city->name }}</option>
                @empty
                    <option value="0" disabled>Select Province first!</option>
                @endforelse
            </select>
            @error('city') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="form-group mb-4">
            <label for="province">Subdistrict</label>
            <select class="custom-select @error('subdistrict') is-invalid @endif" id="role" wire:model="subdistrict">
                <option value="0">Choose..</option>
                @forelse($subdistricts as $opt_subdistrict)
                    <option value="{{ $opt_subdistrict }}">{{ $opt_subdistrict->name }}</option>
                @empty
                    <option value="0" disabled>Select City first!</option>
                @endforelse
            </select>
            @error('subdistrict') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>


        <hr>
        @if($dealers)
            <div class="form-group mb-4">
                <label for="dealer">Dealer</label>
                <select class="custom-select @error('dealer_id') is-invalid @endif" id="role" wire:model="dealerId">
                    <option value="0">Choose..</option>
                    @forelse($dealers as $dealer)
                        <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                    @empty
                        <option value="0" disabled>No Cluster. Please add new one</option>
                    @endforelse
                </select>
                @error('dealerId') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
            </div>
        @endif

        <hr>

        <div class="form-group mb-4">
            <label for="cluster_id">Cluster</label>
            <select class="custom-select @error('cluster_id') is-invalid @endif" id="role" wire:model="cluster_id">
                <option value="0">Choose..</option>
                @forelse($clusters as $opt_cluster)
                    <option value="{{ $opt_cluster->id }}">{{ $opt_cluster->name }}</option>
                @empty
                    <option value="0" disabled>Choose Province first!</option>
                @endforelse
            </select>
            @error('cluster_id') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="form-group mb-4">
            <label for="province">Micro Cluster</label>
            <select class="custom-select @error('micro_cluster') is-invalid @endif" id="role" wire:model="micro_cluster">
                <option value="0">Choose..</option>
                @forelse($micro_clusters as $opt_micro_cluster)
                    <option value="{{ $opt_micro_cluster->name }}">{{ $opt_micro_cluster->name }}</option>
                @empty
                    <option value="0" disabled>Select Cluster first!</option>
                @endforelse
            </select>
            @error('micro_cluster') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>


        <div class="form-group mb-4">
            <button type="button" class="btn btn-primary mt-2 btn-block" wire:click="save">Save</button>
        </div>
    </form>
</div>
