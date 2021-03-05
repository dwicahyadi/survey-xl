<div>
    <div class="list-group shadow-soft rounded">
        @forelse($sections as $section)
            <a class="list-group-item @if($selectedSectionId == $section->id) active text-facebook @endif"
               wire:key="section-{{ $section->id }}"
               wire:click="$emit('selectSectionId',{{ $section->id }})">
                <strong>{{ $section->name }}</strong>
            </a>
        @empty
            <a class="list-group-item">No data available</a>
        @endforelse
    </div>
</div>
