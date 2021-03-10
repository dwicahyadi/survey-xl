<div>
    <div class="p-4">
        <div class="alert alert-info">
            <span><i class="fas fa-info-circle mr-2"></i> Nothing can count from this question. But here some sample</span>
        </div>
       @isset($data[0])
            <img class="img-fluid" src="{{ asset('storage/survey/'.$data[0]->value) }}" alt="{{ asset('storage/survey/'.$data[0]->value) }}">
            <hr>
            <button class="btn btn-primary" wire:click="$refresh"> Shuffle Image </button>

        @endisset

    </div>
</div>
