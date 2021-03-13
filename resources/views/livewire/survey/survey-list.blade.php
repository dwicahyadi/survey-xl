<div>
    <div class="mb-4">
        <input type="text" wire:model="search" class="form-control" placeholder="search MSISDN..." autocomplete="off">
    </div>
    @forelse($surveys as $survey)
        <a href="{{ route('surveyor.show',['id'=>$survey->id]) }}" class="mt-4">
            <div class="card my-4 shadow-soft">
                <div class="card-body border-bottom border-light">
                    <small>{{ $survey->outlet->msisdn }}</small>
                    <h5>{{ $survey->outlet->name }}</h5>
                    <h6>
                        {{ $survey->outlet->type }}
                        / {{ $survey->cluster->name }}
                        / {{ $survey->outlet->micro_cluster }}
                        / {{ $survey->outlet->city }}
                    </h6>
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
