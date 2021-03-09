@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@forelse($clusters as $cluster)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card bg-primary shadow-soft mb-4">
            <div class="card-body border-bottom border-light text-center">
                <img class="" src="{{ asset('/assets/img/brand/axiata.png') }}" alt="Logo light" height="48">
                <h4 class="h4 mb-2">{{ $cluster->name }}</h4>
                <p class="mb-2">{{ number_format($cluster->outlets_count) }} Outlets</p>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary" wire:click="delete({{ $cluster->id }})">Delete Cluster</button>
            </div>
        </div>
    </div>
@empty
    <div class="col-sm-12">
        <h1>Empty</h1>
    </div>
@endforelse
