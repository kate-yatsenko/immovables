@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('users.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Почта</th>
                            <th>Роль</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->getRoleTitle()}}</td>
                                <td><a href="{{route('users.edit', $user->id)}}" class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-construction"
                                            data-path="{{route('users.destroy', $user->id)}}">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection