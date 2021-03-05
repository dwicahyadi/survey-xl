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
                        by {{ $outlet->latest_survey[0]->user->name }}
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
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('assets/img/illustrations/new_survey.svg') }}" alt="New Survey" class="img-fluid w-25 mb-4">
            <label>Input Outlet MSISDN</label>
            <input type="text" class="form-control" wire:model="key" placeholder="search MSISDN..">
            <button  class="btn btn-block btn-primary mt-2" wire:click="search"><i class="fas fa-search-location"></i> Search</button>
            @if (session()->has('notfound'))
                <div class="alert alert-danger mt-4 shadow-soft text-danger">
                    <h5><i class="fas fa-trash-alt mr-2"></i> {{ session('notfound') }}</h5>
                </div>
            @endif
        </div>

    @endif

</div>
