@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('roles.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Название</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->title}}</td>
                                <td>
                                    <a href="{{route('roles.edit', $role->id)}}"
                                       class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-construction"
                                            data-path="{{route('roles.destroy', $role->id)}}">
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