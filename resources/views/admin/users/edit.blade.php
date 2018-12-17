@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit User
            </h1>
        </section>
        <section class="content">
            {{Form::open([
                'route'	=>	['users.update', $user->id],
                'method'	=>	'put',
                'files'	=>	true
            ])}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Updating User</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nsme">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""
                                   value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                        @foreach($roles as $role)
                            <div class="form-group">
                                <label>
                                    {{Form::radio('role_id', $role->id, $user->role_id == $role->id)}}
                                </label>
                                <label>
                                    {{$role->title}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Edit</button>
                </div>
            </div>
            {{Form::close()}}
        </section>
    </div>
@endsection