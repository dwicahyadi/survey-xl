<div>
    <div class="p-4">
        <div class="alert alert-info">
            <span><i class="fas fa-info-circle mr-2"></i> Nothing can count from this question. But here some sample</span>
        </div>
        <table class="table">
            @forelse($data as $row)
                <tr>
                    <td>{{ $row->value }}</td>
                </tr>
            @empty
                <tr>
                    <td>----</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
