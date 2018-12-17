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
                        <a href="{{route('types.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" data-role="{{Auth::user()->role_id}}" data-content="{{\App\User::CONTENT_MANAGER}}" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Название</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr>
                                <td>{{$type->id}}</td>
                                <td>{{$type->title}}</td>
                                <td>
                                    <a href="{{route('types.edit', $type->id)}}"
                                       class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-construction"
                                            data-path="{{route('types.destroy', $type->id)}}">
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