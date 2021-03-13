<div>
    <div class="card bg-soft shadow-soft mb-4">
        <div class="card-body d-flex border-bottom border-light">
            <div class="mr-2">
                <i class="fas fa-user-lock fa-2x text-dark pb-0"></i>
            </div>
            <strong>{{ $role->name }}</strong>
        </div>
        <div class="card-footer text-left">
            @foreach($permissions as $permission)
                <div class="custom-control custom-switch mb-2">
                    <input type="checkbox"
                           wire:model="rolePermissions"
                           class="custom-control-input"
                           id="{{ $role->id.'-'.$permission->id }}"
                           value="{{ $permission->name }}"
                           wire:loading.attr="disabled"
                    >
                    <label class="custom-control-label" for="{{ $role->id.'-'.$permission->id }}">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

    </div>
</div>
