<div>
    @if($selectedSection)
        <div class="d-flex justify-content-between rounded my-2 p-2">
            <h5>Selected Section : {{ $selectedSection->name ?? '' }}</h5>
            <a class="btn btn-primary" href="{{ route('survey-question.create-question', ['section'=>$selectedSection]) }}">New Question</a>
        </div>
        @forelse($questions as $question)
            @livewire('survey-question.question-card',['question'=> $question], key($question->id))
        @empty
            <div>
                <h4 class="display-4">No question have been created in this section. Pleas add new one.</h4>
            </div>
        @endforelse


    @else
        <div class="p-4">
            <h4 class="display-4">Please select section first..</h4>
        </div>
    @endif


</div>
