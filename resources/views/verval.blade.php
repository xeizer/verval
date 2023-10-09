@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">

                    <div class="card-body text-center">
                        <img src="https://placehold.co/200x200" class="img-thumbnail" />
                    </div>
                </div>
            </div>
            <div class="col-md-9 mt-3">
                <div class="card border-primary">

                    <div class="card-body">
                        <h4 class="text-center">{{ $user->name }}</h4>
                        <table class="table table-stripped">
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td>{{ $user->siswa->nis }}
                                </td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>:</td>
                                <td>{{ $user->siswa->nisn }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $user->siswa->kelas->tingkat }}-{{ $user->siswa->kelas->nama }}-{{ $user->siswa->jurusan->kode }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td>{{ $user->siswa->jurusan->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td>{{ $user->tempatlahir }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ Carbon\Carbon::parse($user->tgllahir)->isoFormat('D MMMM Y') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
