<div>
    <div class="mb-4">
        <input type="text" wire:model="search" class="form-control" placeholder="search MSISDN/Outlet name..." autocomplete="off">
        <div wire:loading >Loading . . .</div>
    </div>

    @forelse($surveys as $survey)
        <a href="{{ route('surveyor.show',['id'=>$survey->id]) }}" class="mt-4">
            <div class="card my-4 shadow-soft">
                <div class="card-body border-bottom d-flex border-light">
                    <div class="mr-2">
                        <img src="https://ui-avatars.com/api/?background=random&name={{ $survey->outlet->name }}" class="rounded-circle" alt="{{ $survey->outlet->name }}" width="48">
                    </div>
                    <div class="flex-fill">
                        <small>{{ $survey->outlet->msisdn }}</small>
                        <h5>{{ $survey->outlet->name }}</h5>
                        <h6>
                            {{ $survey->outlet->type }}
                            / {{ $survey->cluster->name }}
                            / {{ $survey->outlet->micro_cluster }}
                            / {{ $survey->outlet->city }}
                        </h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <span><i class="fas fa-clock mr-2"></i> {{ $survey->created_at }}</span>
                    <span><i class="fas fa-user mr-2"></i> {{ $survey->user->name ?? 'Deleted User'}}</span>
                </div>
            </div>
        </a>
    @empty
        <span>No outlet available</span>
    @endforelse

    <div class="text-center">
        {{ $surveys->links() }}
    </div>
</div>
