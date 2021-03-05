<div>
    <div class="list-group shadow-soft rounded">
        @forelse($sections as $section)
            <a class="list-group-item @if($selectedSection == $section->id) active text-facebook @endif"
               wire:key="section-{{ $section->id }}"
               wire:click="$emit('selectSection', {{ $section->id }})">
                <strong>{{ $section->name }}</strong><br>
                <small>Total Questions: {{ number_format($section->questions_count) }}</small>
            </a>
        @empty
            <a class="list-group-item">No data available</a>
        @endforelse
    </div>
</div>
