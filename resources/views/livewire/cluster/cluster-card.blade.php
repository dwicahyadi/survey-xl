<div>
    <div class="card bg-primary shadow-soft mb-4">
        <div class="card-body border-bottom border-light ">
            <div class="d-flex align-items-center">
                <img class="" src="{{ asset('/assets/img/brand/axiata.png') }}" alt="Logo light" height="48">
                <h4 class="h4 mr-2">{{ $cluster->name }}</h4>
                <p class="mr-2 flex-fill">{{ number_format($cluster->outlets_count) }} Outlets</p>
                <button class="btn btn-primary" wire:click="delete({{ $cluster->id }})" @if($cluster->outlets_count) disabled @endif>Delete Cluster</button>
            </div>
            <strong>Micro Clusters :</strong>
            <ul>
                @forelse($cluster->micro_clusters as $micro_cluster)
                    <li>{{ $micro_cluster->name }}</li>
                @empty
                    <li>no micro cluster has been created for this cluster</li>
                @endforelse
            </ul>

            <input type="text" class="form-control" placeholder="type new micro cluster then press ENTER"
                   wire:model="mc_name"
                   wire:keydown.enter="saveMicroCluster">
        </div>
    </div>
</div>
