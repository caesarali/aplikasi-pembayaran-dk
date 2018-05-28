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
                            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
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
