<div>
    <div class="shadow-soft p-4 rounded">
        <form method="get">
            <div class="form-group">
                <label>Start Date</label>
                <input type="date"
                       name="startDate"
                       class="form-control"
                       wire:model="startDate" />
            </div>

            <div class="form-group">
                <label>End Date</label>
                <input type="date"
                       class="form-control"
                       wire:model="endDate" />
            </div>

            <div class="form-group">
                <label>Dealer</label>
                <select class="custom-select" name="dealer_id"></select>
            </div>

            <div class="form-group">
                <label>Cluster</label>
                <select class="custom-select" name="cluster_id"></select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Show</button>
            </div>
        </form>
    </div>
</div>
