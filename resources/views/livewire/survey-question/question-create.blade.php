<div>
    <form wire:submit.prevent="save">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="text">Question</label>
                    <textarea id="text" class="form-control @error('name') is-invalid @enderror" wire:model="text"></textarea>
                    @error('text') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="response_type">Response Type </label>
                    <select class="custom-select shadow-inset @error('type') is-invalid @enderror" wire:model="type">
                        <option selected value="0">Choose...</option>
                        @foreach($response_types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label>Response Options</label>
                    <div class="alert alert-info d-flex justify-content-start align-items-center">
                        <div class="alert-inner--icon mr-2">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="alert-inner--text">
                            <span>Only fill when <strong>Respon Type</strong> is <strong class="text-danger">radio_button</strong></span>
                        </div>
                    </div>
                    <div class="border-light border rounded p-4">
                        <strong>Instructions</strong>
                        <ul>
                            <li><strong>Index</strong> is used to measure which response is most expected. Bigger is better.</li>
                            <li><strong>Text</strong> is what is displayed as an option during the survey. Blank text will not be save.</li>
                        </ul>
                    </div>
                    @for($i = 0; $i <= 4; $i++)
                        <div class="w-100 d-flex">
                            <div class="mr-2">
                                <input type="number" class="form-control my-4" placeholder="index" wire:model="answers.{{ $i }}.index">
                            </div>
                            <div class="flex-fill">
                                <input type="text" class="form-control my-4" placeholder="text" wire:model="answers.{{ $i }}.text">
                            </div>
                        </div>
                    @endfor



                </div>
                <hr>

                <div class="form-group my-2 d-flex justify-content-between">
                    <a href="{{ route('survey-question.index') }}"><i class="fas fa-chevron-circle-left mr-2"></i> Back to Section List</a>
                    <button type="submit" class="btn btn-primary">Save Question</button>
                </div>

            </div>
        </div>
    </form>
</div>
