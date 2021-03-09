<div>
    @if($isFiltering)

        <div>
            <form method="get">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date"
                                   name="startDate"
                                   class="form-control datepicker"
                                   wire:model.defer="startDate" />
                        </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date"
                                   name="endDate"
                                   class="form-control datepicker"
                                   wire:model.defer="endDate" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Dealer</label>
                            <select class="custom-select" name="dealer_id" wire:model.defer="dealer_id">
                                <option value="0">All..</option>
                                @forelse($dealers as $dealer)
                                    <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                                @empty
                                    <option value="">No dealer</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Cluster</label>
                            <select class="custom-select" name="cluster_id" wire:model.defer="cluster_id">
                                <option value="0">All..</option>
                                @forelse($clusters as $cluster)
                                    <option value="{{ $cluster->id }}">{{ $cluster->name }}</option>
                                @empty
                                    <option value="">No dealer</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary mr-4">Show <i class="fas fa-check-circle"></i></button>
                            <a class="" wire:click="$set('isFiltering',0)">Hide Filter <i class="fas fa-filter"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    @else
        <button class="btn btn-primary mr-4" wire:click="$set('isFiltering',1)">Use Filter <i class="fas fa-filter"></i></button>
        @if($startDate)
            <span class="badge badge-pill p-2 mr-2">Start date : {{ $startDate }}</span>
        @endif

        @if($endDate)
            <span class="badge badge-pill p-2 mr-2">End date : {{ $endDate }}</span>
        @endif

        @if($dealer_id)
            <span class="badge badge-pill p-2 mr-2">Dealer : {{ $dealers[$dealer_id-1]->name ?? '' }}</span>
        @endif

        @if($cluster_id)
            <span class="badge badge-pill p-2 mr-2">Cluster : {{ $clusters[$cluster_id-1]->name ?? '' }}</span>
        @endif
    @endif


</div>
