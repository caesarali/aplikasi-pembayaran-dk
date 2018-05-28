@extends('layouts.admin')

@section('content-admin')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    User Akun
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form action="{{ route('user.store') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                @include('admin.users._form')
                                {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="control-label col-sm-3">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" placeholder="Nama akun" required>
                                        @if($errors->has('name'))
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label class="control-label col-sm-3">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="username" placeholder="Username akun" required>
                                        @if($errors->has('username'))
                                            <span class="help-block">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label class="control-label col-sm-3">Level User</label>
                                    <div class="col-sm-8">
                                        @foreach($levels as $level)
                                            <label class="radio-inline">
                                                <input type="radio" name="level" value="{{ $level->id }}" {{ $loop->first ? 'checked="checked"' : '' }} required>
                                                {{ strtoupper($level->name) }}
                                            </label>
                                        @endforeach
                                        @if($errors->has('level'))
                                            <span class="help-block">{{ $errors->first('level') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <button class="btn btn-primary" type="submit">Simpan <i class="fa fa-fw fa-check"></i></button>
                                        <a href="{{ route('user.index', 'teller') }}" class="btn btn-default">Batal</a>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
