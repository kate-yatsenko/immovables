@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            {{Form::open([
                'route'	=>	'users.store',
                'files'	=>	true
            ])}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменить пользователя</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""
                                   value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                        @foreach($roles as $role)
                            <div class="form-group">
                                <label>
                                    {{Form::radio('role_id', $role->id)}}
                                </label>
                                <label>
                                    {{$role->title}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Добавить</button>
                </div>
            </div>
            {{Form::close()}}
        </section>
    </div>
@endsection