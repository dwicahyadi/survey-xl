<div>
    <div class="card bg-soft shadow-soft mb-4">
        <div class="card-body d-flex">
            <div class="mr-2">
                <img src="https://ui-avatars.com/api/?background=random&name={{ $outlet->name }}" class="rounded-circle" alt="{{ $outlet->name }}" width="48">
            </div>
            @if(!$editing)
                <div class="pl-4 flex-fill">
                    <h5 class="text-facebook">{{ $outlet->msisdn }}</h5>
                    <h5>{{ $outlet->name }}</h5>
                    <small class="mr-2">
                        {{ $outlet->type }}
                        / {{ $outlet->cluster->name }}
                        / {{ $outlet->micro_cluster }}
                        / {{ $outlet->city }}
                    </small>
                </div>
                <div>
                    <button class="btn btn-sm btn-primary mr-2" wire:click="$set('editing',1)">Edit</button>
                </div>
            @else
                <div class="pl-4 flex-fill">
                    @livewire('dealer.outlet-edit-form',['outlet'=>$outlet],key('edit-outlet-'.$outlet->id))
                </div>
            @endif
        </div>

    </div>
</div>
