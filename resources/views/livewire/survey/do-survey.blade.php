<div>
    <div wire:loading>
        <div class="bg-info p-4 rounded border-light" style="
    position: fixed;
    left: 10%;
    top: 35%;
    width: 80vw;
    z-index: 1000;">
            <span class="text-white"><i class="fa fa-spin fa-spinner"></i> loading...</span>
    </div>

</div>
<form wire:submit.prevent="save">
    @csrf
    <h3>General</h3>
    <div class="card card-body shadow-soft my-2">
        <div class="d-flex p-2 border-light border-bottom mb-2">
            <div class="mr-2">
                <img src="https://ui-avatars.com/api/?background=random&name={{ $outlet->name }}" class="rounded-circle" alt="{{ $outlet->name }}" width="48">
            </div>
            <div class="pl-4 flex-fill">
                <h5 class="text-facebook">{{ $outlet->msisdn }}</h5>
                <h5>{{ $outlet->name }}</h5>
                <small class="mr-2">
                    {{ $outlet->type }}
                    / {{ $outlet->cluster->name }}
                    / {{ $outlet->micro_cluster }}
                    / {{ $outlet->city }}
                </small>
            </div>
        </div>

        <div class="form-group">
            <label>PIC Name</label>
            <input type="text" class="form-control @error('pic_name') is-invalid @enderror" wire:model.lazy="pic_name">
            @error('pic_name') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label>PIC Contact</label>
            <input type="text" class="form-control @error('pic_contact') is-invalid @enderror" wire:model.lazy="pic_contact">
            @error('pic_contact') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <hr>

        <div class="form-group">
            <label>Note (optional)</label>
            <textarea class="form-control" wire:model.lazy="note"></textarea>
        </div>
    </div>

    <hr>
    @forelse($sections as $section)
        <h3>{{ $section->name }}</h3>
        @forelse($section->questions as $question)
            @if($question->is_active)
                <div class="card my-4 shadow-soft @error('responses.'.$question->id.'.*') border-danger text-danger @enderror" wire:key="question-{{ $question->id }}">
                    <div class="card-header border-light border-bottom">
                        <h4>{{ $question->text }}</h4>
                        <small><i class="fas fa-info-circle text-info"></i> Last response : {{ trim($prevResponses[$question->id]->response ?? '-')  }}</small>
                        @error('responses.'.$question->id.'.*') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="card-body p-0">
                        @if($question->type == 'radio_button')


                            <div class="list-group">
                                @forelse($question->answers as $answer)
                                    <input required type="radio"
                                           value="{{ json_encode($answer) }}"
                                           id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                           wire:model="responses.{{$question->id}}.radio"
                                    />
                                    <label class="list-group-item" for="{{ 'answer-question-'.$question->id.'-'.$answer->id }}">{{ $answer->text }}</label>
                                @empty
                                    <li>----No Response Option Availabe----</li>
                                @endforelse
                            </div>
                        @endif

                        @if($question->type == 'input_number')

                            <div class="p-2">
                                <input required type="number"
                                       class="form-control"
                                       id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                       placeholder="type a number..."
                                       wire:model="responses.{{$question->id}}.number"
                                />
                            </div>
                        @endif

                        @if($question->type == 'input_text')

                            <div class="p-2">
                                <textarea
                                    class="form-control"
                                    id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                    placeholder="type response..."
                                    wire:model="responses.{{$question->id}}.text"></textarea>
                            </div>
                        @endif

                        @if($question->type == 'file')

                            <div class="p-2">
                                <input required type="file"
                                       class="my-4"
                                       id="{{ 'answer-question-'.$question->id.'-'.$answer->id }}"
                                       placeholder="type response..."
                                       wire:model="responses.{{$question->id}}.file" />
                                <small>Max upload filesize : {{ $max_size }}</small>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        @empty
            <div>
                <h4 class="display-4">No question have been created in this section. Please add new one.</h4>
            </div>
        @endforelse
    @empty
    @endforelse

    <hr>

    <button class="btn btn-primary btn-block" type="submit" wire:loading.attr="disabled"><i class="fas fa-check-circle"></i> Save Survey</button>
    <hr>


    @if($errors->any())
        {!! implode('', $errors->all('<p class="text-danger"><i class="fas fa-times mr-2"></i>:message</p>')) !!}
    @endif
</form>

</div>
