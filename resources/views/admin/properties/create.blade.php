@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить свойство
            </h1>
        </section>
        <section class="content">
            <div class="box">
                {!! Form::open(['route' => 'properties.store']) !!}
                <div class="box-header with-border">
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите свойство" name="title">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('properties.index')}}" class="btn btn-primary pull-left">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection