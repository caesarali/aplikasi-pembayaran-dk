@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    MAIN NAVIGATION
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="{{ route('admin.home') }}" class="list-group-item {{ $halaman === 'admin' ? 'active' : '' }}">
                            <i class="fa fa-fw fa-home"></i> Home
                        </a>
                        <a href="{{ route('mahasiswa.index') }}" class="list-group-item {{ $halaman === 'mahasiswa' ? 'active' : '' }}">
                            <i class="fa fa-fw fa-user"></i> Data Mahasiswa
                        </a>
                    </div>
                    <div class="list-group">
                        <a href="{{ route('user.index', 'teller') }}" class="list-group-item {{ $halaman === 'teller' ? 'active' : '' }}">
                            @if ($halaman == 'teller')
                                <i class="fa fa-fw fa-user-circle" style="margin-right: 8px"></i> 
                                <b>BANK UIT</b>
                            @else
                                <i class="fa fa-fw fa-user-circle text-success" style="margin-right: 8px"></i>
                                <b class="text-success">BANK UIT</b>
                            @endif
                        </a>
                        <a href="{{ route('user.index', 'bendum') }}" class="list-group-item {{ $halaman === 'bendum' ? 'active' : '' }}">
                            @if ($halaman == 'bendum')
                                <i class="fa fa-fw fa-user-circle" style="margin-right: 8px"></i> 
                                <b>BEM FIKOM</b>
                            @else
                                <i class="fa fa-fw fa-user-circle text-danger" style="margin-right: 8px"></i> 
                                <b class="text-danger">BEM FIKOM</b>
                            @endif
                        </a>
                        <a href="{{ route('user.create') }}" class="list-group-item {{ $halaman === 'user' ? 'active' : '' }}">
                            <i class="fa fa-fw fa-plus" style="margin-right: 8px"></i> 
                            <b class="">AKUN USER</b>
                        </a>
                    </div>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-block hidden-xs" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <b>LOGOUT</b> <i class="fa fa-fw fa-sign-out"></i>
                    </a>
                </div>
            </div>
        </div>

        @yield('content-admin')
    </div>
</div>
@endsection
