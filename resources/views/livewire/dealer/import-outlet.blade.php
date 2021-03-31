<div>
    <div class="alert">
        <ul>
            <li>Max file size is 1MB</li>
            <li>Max data can imported is 1000 rows</li>
            <li>Outlets with duplicate MSISDN will be ignored</li>
        </ul>
    </div>
    <form>
        <div class="form-group mb-4">
            <label for="cluster_id">Cluster</label>
            <select class="custom-select @error('cluster_id') is-invalid @endif" id="role" wire:model="cluster_id">
                <option value="0">Choose..</option>
                @forelse($clusters as $cluster)
                    <option value="{{ $cluster->id }}">{{ $cluster->name }}</option>
                @empty
                    <option value="0" disabled>Choose Province first!</option>
                @endforelse
            </select>
            @error('cluster_id') <span class="form-text text-muted text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="custom-file">
            <label class="custom-file-label" for="customFile">{{ $tempName ?? 'Choose File'}}</label>
            <input type="file" class="" id="customFile" wire:model="file">
            @error('file') <span class="error">{{ $message }}</span> @enderror
        </div>
    </form>


    <button type="button" class="btn btn-primary my-2" wire:click="save">Import</button>
    <div wire:loading>
        Loading ....
    </div>

    <hr>

    @if($data)
        <div class="mt-0 p-0 bg-white">
            <table>
                @foreach($data[0] as $index => $row)
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
