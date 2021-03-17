@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@forelse($clusters as $cluster)
    @livewire('cluster.cluster-card',['cluster'=> $cluster], key('cluster-'.$cluster->id))
@empty
    <div class="col-sm-12">
        <h1>Empty</h1>
    </div>
@endforelse
