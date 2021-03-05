<div>
    <div class="custom-file">
        <input type="file" class="" id="customFile" wire:model="file">
        <label class="custom-file-label" for="customFile">{{ $tempName ?? 'Choose File'}}</label>
        @error('file') <span class="error">{{ $message }}</span> @enderror
    </div>


    <button type="button" class="btn btn-primary my-2" wire:click="save">Import</button>
    <div wire:loading>
        Loading ....
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <hr>

    @if($data)
        <div class="mt-0 p-0 bg-white">
            <table>
                @foreach($data as $index => $row)
                    <tr>
                        @foreach($row as $field)
                            <td>{{ $field }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
</div>
