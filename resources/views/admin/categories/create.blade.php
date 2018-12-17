@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить категорию
                <small>приятные слова..</small>
            </h1>
        </section>
        <section class="content">
            <div class="box">
                {!! Form::open(['route' => 'categories.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем категорию</h3>
                    @include('admin.errors')

                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите название категории" name="title">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('categories.index')}}" class="btn btn-primary pull-left">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection