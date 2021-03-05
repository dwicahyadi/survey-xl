<div>
    <div class="card my-4 @if($question->is_active) shadow-soft @else shadow-inset @endif">
        <div class="card-header border-light border-bottom">
            <strong>{{ $question->text }}</strong>
        </div>
        <div class="card-body  border-light border-bottom"radio_button>
            Response type: {{ $question->type }}
            @if($question->type == 'radio_button')
                <ul>
                    @forelse($question->answers as $answer)
                        <li>{{ $answer->text }}</li>
                    @empty
                        <li>----No Response Option Availabe----</li>
                    @endforelse
                </ul>
            @endif
        </div>
        <div class="card-footer d-flex justify-content-end">
            @if($question->is_active)
                <button wire:click="toggleActive()" class="btn btn-primary text-danger mr-2"><i class="fas fa-eye-slash"></i>  Set nonactive </button>
            @else
                <button wire:click="toggleActive()" class="btn btn-primary text-success mr-2"><i class="fas fa-eye"></i>  Set active </button>
            @endif

        </div>
    </div>
</div>
