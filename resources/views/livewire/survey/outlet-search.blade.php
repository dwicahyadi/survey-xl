<div>

    @if($outlet)
        <div class="card bg-primary bg-soft shadow-soft">
            <div class="card-body">

                <div class="d-flex border-light border-bottom mb-2">
                    <div class="mr-2">
                        <img src="https://ui-avatars.com/api/?background=random&name={{ $outlet->name }}" class="rounded-circle" alt="{{ $outlet->name }}" width="48">
                    </div>
                    <div class="pl-4 flex-fill">
                        <h5 class="text-facebook">{{ $outlet->msisdn }}</h5>
                        <h5>{{ $outlet->name }}</h5>
                        <small class="mr-2">
                            {{ $outlet->type }}
                            / {{ $outlet->cluster->name }}
                            / {{ $outlet->micro_cluster }}
                        </small>
                    </div>
                </div>
                <div class="row border-light border-bottom mb-2">
                    <div class="col-6">
                        <small >Adress</small>

                        <h6>{{ $outlet->address ?? 'no address' }}</h6>
                        @if($outlet->latitude  && $outlet->longitude)
                            <a href="geo:{{ $outlet->latitude }},{{ $outlet->longitude }}" target="_blank">Click here for map</a>
                        @endif
                    </div>

                    <div class="col-6">
                        <small class="mt-2">Province</small>
                        <h6>{{ $outlet->province ?? 'no address' }}</h6>
                    </div>

                    <div class="col-6">
                        <small class="mt-2">City</small>
                        <h6>{{ $outlet->city ?? 'no address' }}</h6>
                    </div>

                    <div class="col-6">
                        <small class="mt-2">Subdistrict</small>
                        <h6>{{ $outlet->subdistrict ?? 'no address' }}</h6>
                    </div>
                </div>

                <div class="border-light border-bottom mb-2">
                    <small class="mt-2">Dealer</small>
                    <h5>{{ $outlet->dealer->name ?? 'no dealer' }}</h5>
                </div>

                <small class="mt-2">Last Survey</small>
                @isset($outlet->latest_survey[0])
                    <h6>
                        <span class="text-danger">{{ \Carbon\Carbon::createFromTimestamp(strtotime($outlet->latest_survey[0]->created_at))->diffForHumans() }}</span>
                        by {{ $outlet->latest_survey[0]->user->name ?? 'Deleted User' }}
                    </h6>
                    <a href="{{ route('report.list.from-outlet',['outlet'=> $outlet]) }}">See older survey from this outlet</a>
                @else
                    <h6 class="text-danger">Never</h6>
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
                        <input type="text" class="form-control form-control-lg @error('key') is-invalid @enderror" wire:model.defer="key" wire:keydown.enter="search" placeholder="search Outlet MSISDN..">
                        @error('key') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
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
