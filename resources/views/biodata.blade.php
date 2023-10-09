@extends('layouts.app')

@section('content')
    @if ($user)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Cek Dulu !!!</div>

                        <div class="card-body">
                            <table class="table table-stripped">
                                <tr>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td>{{ $user->siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td>{{ $user->siswa->nis }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><b>{{ $user->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>{{ $user->siswa->kelas->tingkat }}-{{ $user->siswa->jurusan->kode }}-{{ $user->siswa->kelas->nama }}
                                    </td>
                                </tr>
                            </table>
                            {{ $user->name }}
                            <div class="alert alert-primary" role="alert">
                                <strong>Apakah benar ini informasi Anda ?</strong>
                                <a href="{{ route('allinone') }}" class="btn btn-primary">YA</a>
                                <a href="/" class="btn btn-danger">TIDAK</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            <strong>GALAT !! </strong> Silahkan <a href="/" class="btn btn-primary">Ulangi lagi</a>
        </div>
    @endif
@endsection
