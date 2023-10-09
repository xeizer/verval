<div>
    <div class="container">

        <div wire:loading class="float">
            <i class="fa-solid fa-spinner fa-spin-pulse fa-2xl my-float"></i>
        </div>
        <div class="row justify-content-center mb-2">

            <div class="col-md-12 mb-2">
                <div class="row">

                    <div class="col">
                        @if ($status < 0)
                            <button class="p-1 w-100 btn btn-outline-secondary disabled">Bio</button>
                        @else
                            <button
                                class="p-1 w-100 btn 
                        @if ($pilihan == 'bio') btn-secondary @elseif($status >= 1) btn-primary @else btn-outline-secondary @endif"
                                wire:click="pilih('bio')">Bio</button>
                        @endif
                    </div>
                    <div class="col">
                        @if ($status < 1)
                            <button class="p-1 w-100 btn btn-outline-secondary disabled">Alamat</button>
                        @else
                            <button
                                class="p-1 w-100 btn 
                        @if ($pilihan == 'alamat') btn-secondary @elseif($status >= 2) btn-primary @else btn-outline-secondary @endif"
                                wire:click="pilih('alamat')">Alamat</button>
                        @endif
                    </div>
                    <div class="col">
                        @if ($status < 2)
                            <button class="p-1 w-100 btn btn-outline-secondary disabled">Ayah</button>
                        @else
                            <button
                                class="p-1 w-100 btn 
                        @if ($pilihan == 'ayah') btn-secondary @elseif($status >= 3) btn-primary @else btn-outline-secondary @endif"
                                wire:click="pilih('ayah')">Ayah</button>
                        @endif
                    </div>
                    <div class="col">
                        @if ($status < 3)
                            <button class="p-1 w-100 btn btn-outline-secondary disabled">Ibu</button>
                        @else
                            <button
                                class="p-1 w-100 btn 
                        @if ($pilihan == 'ibu') btn-secondary @elseif($status >= 4) btn-primary @else btn-outline-secondary @endif"
                                wire:click="pilih('ibu')">Ibu</button>
                        @endif
                    </div>
                    <div class="col">
                        @if ($status < 4)
                            <button class="p-1 w-100 btn btn-outline-secondary disabled">Wali</button>
                        @else
                            <button
                                class="p-1 w-100 btn 
                        @if ($pilihan == 'wali') btn-secondary @elseif($status >= 5) btn-primary @else btn-outline-secondary @endif"
                                wire:click="pilih('wali')">Wali</button>
                        @endif

                    </div>

                </div>

            </div>
            <div class="col-md-12 mb-1">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $status * 20 }}%;"
                        aria-valuenow="{{ $status * 20 }}" aria-valuemin="0" aria-valuemax="100">{{ $status * 20 }}%
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">{{ $user->name }}</div>

                    <div class="card-body">
                        @if ($pilihan == 'bio')
                            <form wire:submit='simpan'>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" required
                                        wire:model='name'>
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
                                    <select class="form-control" id="jenis_kelamin" required wire:model="jkel">
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
                                            <button type="button" wire:click="pilih('alamat')"
                                                class="btn btn-warning w-100">Selanjutnya</button>
                                        </div>
                                    @endif
                                </div>


                            </form>
                        @elseif($pilihan == 'alamat')
                            <form wire:submit="simpanAlamat">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" wire:model='alamat'></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" required
                                        wire:model="prov" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <select class="form-control" id="kota" required wire:model.live="kota"
                                        wire:loading.attr='disabled'>
                                        <option value="" selected>--PILIH--</option>
                                        @foreach ($listkota as $kot)
                                            <option value="{{ $kot->id }}">{{ $kot->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($kota)
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control" id="kecamatan" required
                                            wire:model.live="kec" wire:loading.attr='disabled'>
                                            @foreach ($listkec as $kecamatan)
                                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if ($kec)
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan</label>
                                        <select class="form-control" id="kelurahan" required wire:model="kel"
                                            wire:loading.attr='disabled'>
                                            @foreach ($listkel as $kelurahan)
                                                <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="submit" class="btn btn-primary w-100" value="SIMPAN" />
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
