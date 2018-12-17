@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить постройку
            </h1>
        </section>
        <section class="content">
            {{Form::open(['route'=>'constructions.store', 'files'=>true, 'id' => 'messageForm'])}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем статью</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Тип постройки</label>
                            {{Form::select('type_id',
                            $types,
                            null,
                            ['class' => 'form-control select2'])}}
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('category_id',
                            $categories,
                            null,
                            ['class' => 'form-control select2'])}}
                        </div>
                        <hr>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="">
                                {{ csrf_field() }}
                                <div class="form-group-sm">

                                    <div class="col-md-5">
                                        {{Form::select('city',
                                        $cities,
                                        null,
                                        ['class' => 'form-control select2', 'name'=>'city', 'placeholder' => 'Выберите город'])}}
                                    </div>
                                    <div class="col-md-5">
                                        {{Form::select('district',
                                        $districts,
                                        null,
                                        ['class' => 'form-control select2', 'name'=>'district', 'placeholder' => 'Выберите район'])}}
                                    </div>
                                    <div class="col-md-2">
                                        <span id="loader">
                                            <i class="fa fa-spinner fa-2x fa-spin"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="inputs"></div>
                        </div>
                        <div class="form-group">
                            <select name="properties" class="form-control select2"
                                    data-placeholder="Выберите свойства" id="prop">
                                <option></option>
                                @foreach ($properties as $property => $value)
                                    <option id="opt{{$property}}" value="{{ $property }}"
                                            data-name="{{$value}}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button data-path="{{ route('createPropInCreate')}}" data-toggle="modal"
                                    data-target="#modal-default"  type="button" class="btn btn-primary load-ajax-modal">Добавить свойство</button>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_intermediary">
                            </label>
                            <label>
                                Посредник
                            </label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                      class="form-control">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <input class="files" type="file" accept="image/*" multiple name="files[]">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('constructions.index')}}" class="btn btn-primary pull-left">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
            </div>
            {{Form::close()}}
        </section>
    </div>
@endsection