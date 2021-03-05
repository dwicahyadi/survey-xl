<div>
    <div class="card bg-soft shadow-soft mb-4">
        <div class="card-body d-flex">
            <div class="mr-2">
                <img src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}" class="rounded-circle" alt="{{ $user->name }}" width="48">
            </div>
            @if(!$editing)
                <div class="pl-4 flex-fill">
                    <h5>{{ $user->name }}</h5>
                    <small class="mr-2"><i class="fas fa-envelope"></i> {{ $user->email }}</small>
                    <small class="mr-2"><i class="fas fa-user-lock"></i> {{ $user->roles[0]->name ?? 'no role' }}</small>
                </div>
                <div>
                    <button class="btn btn-sm btn-primary mr-2" wire:click="$set('editing',1)">Edit</button>
                    <button class="btn btn-sm btn-primary" wire:click="resetPassword">Reset Password</button>
                </div>
            @else
                <div class="pl-4 flex-fill">
                    @livewire('dealer.user-edit-form',['user'=>$user])
                </div>
            @endif
        </div>

    </div>
</div>
