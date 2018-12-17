@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить район
            </h1>
        </section>
        <section class="content">
            <div class="box">
                {!! Form::open(['route' => 'districts.store']) !!}
                <div class="box-header with-border">
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите название района" name="title">
                        </div>
                        <input type="file" name="images[]" required multiple
                               title="Загрузите одну или несколько фотографий">
                        <div class="form-group">
                            <label>Город</label>
                            {{Form::select('city_id',
                            $cities,
                            null,
                            ['class' => 'form-control select2'])}}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('districts.index')}}" class="btn btn-primary pull-left">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection