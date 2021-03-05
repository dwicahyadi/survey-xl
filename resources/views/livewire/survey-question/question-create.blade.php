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
                            <i class="fas fa-info-circle fa-2x"></i>
                        </div>
                        <div class="alert-inner--text">
                            <h5>Only fill when <strong>Respon Type</strong> is <strong class="text-danger">radio_button</strong></h5>
                        </div>

                    </div>
                    <input type="text" class="form-control my-4" placeholder="blank value will not saved" wire:model="answers.0">
                    <input type="text" class="form-control my-4" placeholder="blank value will not saved" wire:model="answers.1">
                    <input type="text" class="form-control my-4" placeholder="blank value will not saved" wire:model="answers.2">
                    <input type="text" class="form-control my-4" placeholder="blank value will not saved" wire:model="answers.3">
                    <input type="text" class="form-control my-4" placeholder="blank value will not saved" wire:model="answers.4">

                    <pre>
                        {{ var_dump($answers) }}
                    </pre>

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
