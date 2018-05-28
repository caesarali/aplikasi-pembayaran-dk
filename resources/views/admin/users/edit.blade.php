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
                            <form action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                @include('admin.users._form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
