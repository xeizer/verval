@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/upload" class="btn btn-primary">Upload Siswa</a>
                        <a href="/uploadkotkeckel" class="btn btn-primary">Upload KotKecKel</a>
                        <a href="/upload" class="btn btn-primary">Progress</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
