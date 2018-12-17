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
                        <a href="{{route('properties.create')}}" class="btn btn-success">Добавить</a>
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
                        @foreach($properties as $property)
                            <tr>
                                <td>{{$property->id}}</td>
                                <td>{{$property->title}}</td>
                                <td>
                                    <a href="{{route('properties.edit', $property->id)}}"
                                       class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-construction"
                                            data-path="{{route('properties.destroy', $property->id)}}">
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