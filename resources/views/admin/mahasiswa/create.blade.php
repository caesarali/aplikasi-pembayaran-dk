@extends('layouts.admin')

@section('content-admin')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <a href="{{ route('mahasiswa.index') }}" class="pull-left"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    Data Mahasiswa
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form action="{{ route('mahasiswa.store') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                @include('admin.mahasiswa._form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
