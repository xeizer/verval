<div>
    <div class="container">
        <div class="row justify-content-center mb-2">

            <div class="col-md-12 mb-2">
                <div class="row">

                    <div class="col">
                        <a wire:navigate href="{{ route('biodata') }}" class="p-1 w-100 btn btn-secondary">Bio</a>
                    </div>
                    <div class="col">
                        <a wire:navigate href="{{ route('alamat') }}" class="p-1 w-100 btn btn-outline-primary">Alamat</a>
                    </div>
                    <div class="col">
                        <a wire:navigate href="" class="p-1 w-100 btn btn-outline-primary">Ayah</a>
                    </div>
                    <div class="col">
                        <a wire:navigate href="" class="p-1 w-100 btn btn-outline-primary">Ibu</a>
                    </div>
                    <div class="col">
                        <a wire:navigate href="" class="p-1 w-100 btn btn-outline-primary">Wali</a>
                    </div>

                </div>

            </div>
            <div class="col-md-10 col-10 mb-1">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 20%;" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100">Biodata</div>
                </div>
            </div>
            <div class="col-md-2 col-2 mb-1">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100">20%</div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">{{ $user->name }}</div>

                    <div class="card-body">
                        <form wire:submit='simpan'>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" required wire:model='name'>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" required
                                    wire:model="tempatlahir">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" required
                                    wire:model="tgllahir">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" required wire:model="jeniskelamin">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" id="agama" required wire:model="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" wire:model="tlp">
                            </div>
                            <div class="form-group">
                                <label for="asalsmp">Asal SMP</label>
                                <input type="text" class="form-control" id="asalsmp" required wire:model="smp">
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="submit" class="btn btn-primary w-100" value="SIMPAN" />
                                </div>
                                @if ($status >= 1)
                                    <div class="col">
                                        <a href="{{ route('alamat') }}" class="btn btn-warning w-100"
                                            value="SIMPAN">Selanjutnya</a>
                                    </div>
                                @endif
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
