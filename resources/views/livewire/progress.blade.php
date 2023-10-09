<div>
    <div class="row justify-content-center mb-2">

        <div class="col-md-12 mb-2">
            <div class="row">

                <div class="col">
                    <a wire:navigate href="{{ route('biodata') }}"
                        class="p-1 w-100 btn 
                        @if (Route::is('biodata')) btn-secondary
                        @else
                            @if ($status >= 1) 
                                btn-primary 
                            @else 
                                btn-outline-primary disabled @endif
                        @endif">Bio</a>
                </div>
                <div class="col">
                    <a wire:navigate href="{{ route('alamat') }}"
                        class="p-1 w-100 btn 
                        @if (Route::is('alamat')) btn-secondary
                        @else
                            @if ($status >= 2) 
                                btn-primary 
                            @else 
                                btn-outline-primary disabled @endif
                        @endif">Alamat</a>

                </div>
                <div class="col">
                    <a wire:navigate href=""
                        class="p-1 w-100 btn
                       @if (Route::is('ayah')) btn-secondary
                        @else
                            @if ($status >= 3) 
                                btn-primary 
                            @else 
                                btn-outline-primary disabled @endif
                        @endif">Ayah</a>
                </div>
                <div class="col">
                    <a wire:navigate href=""
                        class="p-1 w-100 btn
                        @if (Route::is('ibu')) btn-secondary
                        @else
                            @if ($status >= 4) 
                                btn-primary 
                            @else 
                                btn-outline-primary disabled @endif
                        @endif">Ibu</a>
                </div>
                <div class="col">
                    <a wire:navigate href=""
                        class="p-1 w-100 btn
                        @if (Route::is('wali')) btn-secondary
                        @else
                            @if ($status >= 5) 
                                btn-primary 
                            @else 
                                btn-outline-primary disabled @endif
                        @endif">Wali</a>
                </div>

            </div>

        </div>
        <div class="col-md-10 col-10 mb-1">
            <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $status * 20 }}%;"
                    aria-valuenow="{{ $status * 20 }}" aria-valuemin="0" aria-valuemax="100">Biodata</div>
            </div>
        </div>
        <div class="col-md-2 col-2 mb-1">
            <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100"
                    aria-valuemin="0" aria-valuemax="100">{{ $status * 20 }}%</div>
            </div>
        </div>
    </div>
</div>
