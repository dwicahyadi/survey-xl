@forelse($dealers as $dealer)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card bg-primary shadow-soft mb-4">
            <div class="card-body border-bottom border-light text-center">
                <img class="" src="{{ asset('/assets/img/brand/axiata.png') }}" alt="Logo light" height="48">
                <h4 class="h4 mb-2">{{ $dealer->name }}</h4>
                <p class="mb-2">{{ $dealer->address }}</p>
                <span class="mr-2" title="Outlets" ><i class="fas fa-store-alt"></i> <strong>{{ number_format($dealer->outlets_count) }}</strong></span>
                <span class="mr-2" title="Users" ><i class="fas fa-users"></i> <strong>{{ number_format($dealer->users_count) }}</strong></span>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('dealer.user',['dealer'=>$dealer]) }}" class="btn btn-primary">Manage Users</a>
                <a href="{{ route('dealer.outlet',['dealer'=>$dealer]) }}" class="btn btn-primary">Manage Outlet</a>
            </div>
        </div>
    </div>
@empty
    <div class="col-sm-12">
        <h1>Empty</h1>
    </div>
@endforelse
