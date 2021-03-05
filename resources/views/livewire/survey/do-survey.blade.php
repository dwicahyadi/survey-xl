<div>
    <h3>General</h3>
    <div class="card card-body shadow-soft my-2">
        <div class="form-group">
            <label>PIC Name</label>
            <input type="text" class="form-control" wire:model.defer="pic_name">
        </div>
        <div class="form-group">
            <label>PIC Contact</label>
            <input type="text" class="form-control" wire:model.defer="pic_contact">
        </div>

        <hr>

        <div class="form-group">
            <label>Note (optional)</label>
            <textarea class="form-control" wire:model.defer="note"></textarea>
        </div>
    </div>
    <hr>
    @forelse($sections as $section)
        <h3>{{ $section->name }}</h3>
        @forelse($section->questions as $question)
            <div class="card my-4 shadow-soft" wire:key="question-{{ $question->id }}">
                <div class="card-header border-light border-bottom">
                    <h4>{{ $question->text }}</h4>
                </div>
                <div class="card-body p-0">
                    @if($question->type == 'radio_button')


                        <div class="list-group">
                            @forelse($question->answers as $answer)
                                <input type="radio"
                                       value="{{ $answer->text }}"
                                       id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                       wire:model.defer="responses.{{$question->id}}.value"
                                />
                                <label class="list-group-item" for="{{ 'answer-question-'.$question->id.'-'.$answer->id }}">{{ $answer->text }}</label>
                            @empty
                                <li>----No Response Option Availabe----</li>
                            @endforelse
                        </div>
                    @endif

                        @if($question->type == 'input_number')

                            <div class="p-2">
                                <input type="number"
                                       class="form-control"
                                       id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                       placeholder="type a number..."
                                       wire:model.defer="responses.{{$question->id}}.value"
                                />
                            </div>
                        @endif

                        @if($question->type == 'input_text')

                            <div class="p-2">
                                <textarea
                                    class="form-control"
                                    id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                    placeholder="type response..."
                                    wire:model.defer="responses.{{$question->id}}.value"></textarea>
                            </div>
                        @endif

                        @if($question->type == 'file')

                            <div class="p-2">
                                <input type="file"
                                    class="my-4"
                                    id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                    placeholder="type response..."
                                    wire:model.defer="responses.{{$question->id}}.file" />
                            </div>
                        @endif
                </div>
            </div>
        @empty
            <div>
                <h4 class="display-4">No question have been created in this section. Please add new one.</h4>
            </div>
        @endforelse
    @empty
    @endforelse

    <hr>

    <button class="btn btn-primary btn-block" wire:click="save" wire:loading.attr="disabled"><i class="fas fa-check-circle"></i> Save Survey</button>
</div>
