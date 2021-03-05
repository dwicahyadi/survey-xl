<div>
    <div class="p-4">
        <h1 class="display-1 text-success mb-0">{{ number_format($data->average('value')) }}</h1>
        <small>Average</small>
        <div class="d-flex mt-4">
            <div class="p-2 flex-fill rounded shadow-inset mx-2">
                <h5 class="display-5 text-success mb-0">{{ number_format($data->sum('value')) }}</h5>
                <small>Sum</small>
            </div>

            <div class="p-2 flex-fill rounded shadow-inset mx-2">
                <h5 class="display-5 text-danger mb-0">{{ number_format($data->min('value')) }}</h5>
                <small>Min</small>
            </div>

            <div class="p-2 flex-fill rounded shadow-inset mx-2">
                <h5 class="display-5 text-facebook mb-0">{{ number_format($data->max('value')) }}</h5>
                <small>Max</small>
            </div>
        </div>
    </div>
</div>
