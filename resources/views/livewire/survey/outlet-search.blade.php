<div>

    @if($outlet)
        <div class="card bg-primary bg-soft shadow-soft text-center">
            <div class="card-body">

                <h4 class="display-4 pt-4">
                    {{ $outlet->name }}
                </h4>

                <span class="mt-2">MSISDN</span>
                <h5>{{ $outlet->msisdn }}</h5>

                <span class="mt-2">Type</span>
                <h5>{{ $outlet->type }}</h5>

                <span class="mt-2">Adress</span>
                <h5>{{ $outlet->address ?? 'no address' }}</h5>

                <span class="mt-2">City</span>
                <h5>{{ $outlet->city ?? 'no address' }}</h5>

                <span class="mt-2">Province</span>
                <h5>{{ $outlet->province ?? 'no address' }}</h5>

                <span class="mt-2">Cluster</span>
                <h5>{{ $outlet->cluster->name ?? 'no cluster' }}</h5>

                <span class="mt-2">Micro Cluster</span>
                <h5>{{ $outlet->micro_cluster ?? 'no cluster' }}</h5>

                <span class="mt-2">Dealer</span>
                <h5>{{ $outlet->dealer->name ?? 'no dealer' }}</h5>

                <hr>
                <span class="mt-2">Last Survey</span>
                @isset($outlet->latest_survey[0])
                    <h5>
                        <span class="text-danger">{{ \Carbon\Carbon::createFromTimestamp(strtotime($outlet->latest_survey[0]->created_at))->diffForHumans() }}</span>
                        by {{ $outlet->latest_survey[0]->user->name ?? 'Deleted User' }}
                    </h5>
                @else
                    <span class="text-danger">Never</span>
                @endisset
                <hr>
                <div class="btn-group btn-block">
                    <a class="btn btn-primary mr-4" href="{{ route('surveyor.new-survey') }}">Search other Outlet</a>
                    <a class="btn btn-primary mr-4" href="{{ route('surveyor.do-survey',['outlet'=> $outlet]) }}">Start Survey</a>
                </div>
            </div>
        </div>

    @else


        @if (!session()->has('notfound'))
            <div class="card border-light shadow-inset">
                <div class="card-header">
                    <h4>Search Outlet by MSISDN</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <label>Input Outlet MSISDN</label>
                        <input type="text" class="form-control form-control-lg @error('key') is-invalid @enderror" wire:model.defer="key" placeholder="search Outlet MSISDN..">
                        @error('key') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                        <span class="text-danger">Pleas use 628 prefix</span>
                        <button  class="btn btn-block btn-primary mt-4" wire:click="search"><i class="fas fa-search-location"></i> Search</button>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger alert-dismissible shadow-soft fade show mt-4" role="alert">
                <span class="alert-inner--icon"><i class="fas fa-stop-circle"></i></span>
                <span class="alert-inner--text">{{ session('notfound') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <hr>
            <a class="btn btn-primary mr-4 btn-block mb-4" href="{{ route('surveyor.new-survey') }}">Search other Outlet</a>

            <h4 class="h4 mb-4">Or Add New Outlet</h4>

            @livewire('dealer.outlet-form',['msisdn'=> $key, 'dealerId'=>Auth::user()->dealer_id])

        @endif

    @endif

</div>
