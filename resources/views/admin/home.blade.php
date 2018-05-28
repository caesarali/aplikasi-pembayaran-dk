@extends('layouts.admin')

@section('content-admin')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Kamu berhasil login sebagain <label class="label label-success">ADMINISTRATOR</label></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
