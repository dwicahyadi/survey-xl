<div>
    <div class="mb-4">
        <input type="text" wire:model="search" class="form-control" placeholder="search MSISDN..." autocomplete="off">
    </div>
    @forelse($outlets as $outlet)
        @livewire('dealer.outlet-card',['outlet'=>$outlet],key('u'.$outlet->id))
    @empty
        <span>No outlet available</span>
    @endforelse

    <div class="text-center">
        {{ $outlets->links() }}
    </div>
</div>
