<div>
    <div class="row justify-content-center text-center">
        <div class="col-lg-8 col-xl-8">
            <h3 class="display-4 mb-3">General Information</h3>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-lg-6">
            <div class="card shadow-soft border-light">
                <div class="card-body d-flex">
                    <div class="p-4">
                        <h2 class="display-2 mb-2">{{ number_format($outletsCount) }}</h2>
                        <h3 class="h4 text-black">Outlets</h3>
                    </div>
                    <div class="flex-fill d-flex justify-content-end align-items-center">
                        <a href="{{ route('dealer.outlet',['dealer'=>$dealer]) }}" class="btn btn-primary">Manage Outlet</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-soft border-light">
                <div class="card-body d-flex">
                    <div class="p-4">
                        <h2 class="display-2 mb-2">{{ number_format($usersCount) }}</h2>
                        <h3 class="h4 text-black">Users</h3>
                    </div>
                    <div class="flex-fill d-flex justify-content-end align-items-center">
                        <a href="{{ route('dealer.user',['dealer'=>$dealer]) }}" class="btn btn-primary">Manage User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
