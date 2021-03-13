<div>
    @forelse($roles as $role)
        @livewire('setting.role-card',['role'=>$role, 'permissions' => $permissions],key('r'.$role->id))
    @empty
        <span>No Users</span>
    @endforelse

    <div class="text-center">
        {{ $roles->links() }}
    </div>
</div>
