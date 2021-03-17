<div>
    @forelse($clusters as $cluster)
        @livewire('cluster.cluster-card',['cluster'=>$cluster],key('cl'.$cluster->id))
    @empty
        <span>No Cluster</span>
    @endforelse

</div>
