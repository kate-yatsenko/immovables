@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Изменить постройку
            </h1>
        </section>
        <section class="content">
            {{Form::open([
            'route'=>['constructions.update', $construction->id],
            'files'=>'true',
            'method'=>'put'
            ])}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменить постройку</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-6 col-md-12">
                            <div class="form-group">
                                <label>Тип постройки</label>
                                {{Form::select('type_id',
                                $types,
                                $construction->getTypeId(),
                                ['class' => 'form-control select2'])}}
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Категория</label>
                                {{Form::select('category_id',
                                $categories,
                                $construction->getCategoryId(),
                                ['class' => 'form-control select2'])}}
                            </div>
                            <hr>
                            <div class="panel-body">
                                <div class="form-group-sm">
                                    <div class="col-md-5">
                                        {{Form::select('city',
                                        $cities,
                                        $construction->getCityId(),
                                        ['class' => 'form-control select2', 'name'=>'city', 'placeholder' => 'Выберите город'])}}
                                    </div>
                                    <div class="col-md-5">
                                        {{Form::select('district',
                                        $districts,
                                        $construction->getDistrictId(),
                                        ['class' => 'form-control select2', 'name'=>'district', 'placeholder' => 'Выберите район'])}}
                                    </div>
                                    <div class="col-md-2">
                                    <span id="loader">
                                        <i class="fa fa-spinner fa-2x fa-spin"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="inputs"></div>
                            </div>
                            @foreach($properties as $property)
                                <div class="form-group">
                                    <p>{{$property->property->title}}
                                        <button data-value="{{$property->property->title}}"
                                                data-prop_constr_id="{{$property->id}}"
                                                data-prop_id="{{$property->property_id}}" type="button"
                                                class="align-items-end fa fa-remove delete-prop-constr-in-edit"
                                                data-path=""></button>
                                    </p>
                                    <input class="form-control" type="text" name="property[{{$property->property_id}}]"
                                           value="{{ $property->value }}">
                                </div>
                            @endforeach
                            <div class="form-group">
                                <select name="properties" class="form-control select2"
                                        data-placeholder="Выберите свойства" id="prop">
                                    <option></option>
                                    @foreach ($propertiesUseless as $property => $value)
                                        <option id="opt{{$property}}" value="{{ $property }}"
                                                data-name="{{$value}}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary load-ajax-modal"
                                        data-path="{{ route('createPropInEdit', $construction->id)}}"
                                        data-toggle="modal"
                                        data-target="#modal-default">Добавить свойство
                                </button>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label>
                                    {{Form::checkbox('is_intermediary', '1', $construction->is_intermediary)}}
                                </label>
                                <label>
                                    Посредник
                                </label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control">{{$construction->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <input class="files ml-4" accept="image/*" type="file" multiple name="files[]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($construction->getImages() as $image)
                            <div class="img col-md-3">
                                <img src="/uploads/{{$image->image}}" alt="" height="300"
                                     width="200">
                                <i class="fa fa-remove remove-img float-right" data-id="{{$image->id}}"></i>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
            <div class="box-footer">
                <a href="{{route('constructions.index')}}" class="btn btn-primary pull-left">Назад</a>
                <button class="btn btn-success pull-right">Изменить</button>
            </div>
            {{Form::close()}}
        </section>
    </div>
@endsection