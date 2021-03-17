<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success shadow-soft">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h4 class="h4">Contact</h4>
            <p class="description">Your general contact information</p>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="mb-4 border-light border-bottom p-2">
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-2">
                    <label>email</label>
                    <input type="text" wire:model="email" class="form-control" readonly>
                </div>

                <div class="form-group mb-2 text-right">
                    <button class="btn btn-primary" wire:click="update_contact">Update</button>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h4 class="h4">Region</h4>
            <p class="description">Specify where your regions</p>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="mb-4 border-light border-bottom p-2">
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

                <div class="form-group mb-2 text-right">
                    <button class="btn btn-primary" wire:click="update_region">Update</button>
                </div>


            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h4 class="h4">Security</h4>
            <p class="description">Update your password.</p>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="mb-4 border-light border-bottom p-2">
                <div class="form-group mb-2">
                    <label>Current Password</label>
                    <input type="password" wire:model="old_password" class="form-control">
                    @error('old_password') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-2">
                    <label>New Password</label>
                    <input type="password" wire:model="new_password" class="form-control">
                    @error('new_password') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Re-type New Password</label>
                    <input type="password" wire:model="new_password_confirmation" class="form-control">
                    @error('new_password_confirmation') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="form-group mb-2 text-right">
                    <button class="btn btn-primary" wire:click="update_password">Update</button>
                </div>


            </div>

        </div>
    </div>
</div>
