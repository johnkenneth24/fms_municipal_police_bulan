<div class="col-md-5 d-flex ps-4 align-items-center">
    <label for="" class="form-label mb-0 me-2">From</label>
    <input type="date" name="" wire:model="from" id="" class="form-control">
    <label for="" class="form-label mb-0">To</label>
    <input type="date" name="" wire:model="to" id="" class="form-control mx-2">
    <button class="btn btn-info mb-0" wire:click="export" wire:loading.attr="disabled">Export</button>
</div>
