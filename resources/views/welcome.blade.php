@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">NISN</div>

                    <div class="card-body">
                        @error('nisn')
                            <div class="alert alert-danger" role="alert">

                                <strong>
                                    <small id="helpId" class="text-danger">ERROR !!! {{ $message }}</small>
                                </strong>

                            </div>
                        @enderror
                        <p>
                            Aplikasi ini digunakan untuk melakukan Verivikasi data Anda. yang akan digunakan untuk
                            dokumen rapor Anda
                        </p>
                        <p>
                            Jika terdapat kesalahan pada Informasi Anda, silahkan perbaiki
                        </p>
                        <p>
                            Jika data masih kosong, silahkan isi dengan benar
                        </p>
                        <p>
                            silahkan masukkan NISN anda
                        </p>
                        <form action="{{ route('ceknisn') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">NISN</label>
                                <input type="text" name="nisn" id="" class="form-control form-control-lg"
                                    placeholder="" aria-describedby="helpId">
                                @error('nisn')
                                    <small id="helpId" class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <input type="submit" class="btn btn-primary w-100">
                        </form>
                        <div style="position: absolute; top: 0; right: 0;">
                            <div id="loading" style="display:none;">
                                <div class="spinner-border text-primary" role="status">
                                </div>
                            </div>
                        </div>

                        <script>
                            $('form').submit(function() {
                                $('#loading').show();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
