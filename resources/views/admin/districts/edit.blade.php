@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Изменить
                <small>приятные слова..</small>
            </h1>
        </section>
        <section class="content">
            <div class="box">
                {!! Form::open(['route' => ['districts.update', $district->id], 'method'=>'put']) !!}
                <div class="box-header with-border">
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{$district->title}}">
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('city_id',
                            $cities,
                            $district->getCityId(),
                            ['class' => 'form-control select2'])}}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('districts.index')}}" class="btn btn-primary pull-left">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection