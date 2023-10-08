<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form wire:submit='uploadSiswa'>
                            <div class="mb-3">
                                <label for="" class="form-label">Choose file</label>
                                <input type="file" wire:model='file' class="form-control" name=""
                                    id="" placeholder="" aria-describedby="fileHelpId">
                                <div id="fileHelpId" class="form-text">Help text</div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Kirim" wire:loading.attr='disabled' />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
