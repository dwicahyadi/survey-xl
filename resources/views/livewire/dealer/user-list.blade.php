<div>
    <div class="mb-4">
        <input type="text" wire:model="search" class="form-control" placeholder="search name..." autocomplete="off">
    </div>
    @forelse($users as $user)
        @livewire('dealer.user-card',['user'=>$user],key('u'.$user->id))
    @empty
        <span>No Users</span>
    @endforelse

    <div class="text-center">
        {{ $users->links() }}
    </div>
</div>
