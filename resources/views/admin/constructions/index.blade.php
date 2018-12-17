@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('constructions.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table data-role="{{Auth::user()->role_id}}" data-content="{{\App\User::CONTENT_MANAGER}}" id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Информация</th>
                            <th>Свойства</th>
                            <th>Описание</th>
                            <th>Посредник/Хозяин</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($constructions as $construction)
                            <tr>
                                <td>{{$construction->id}}</td>
                                <td> город: {{$construction->getCityTitle()}}, район: {{$construction->getDistrictTitle()}}, категория: {{$construction->getCategoryTitle()}}, тип постройки: {{$construction->getTypeTitle()}}</td>
                                <td>@foreach($construction->getValuesTitles() as $value)
                                        {{$value->property->title}}: {{$value->value}};
                                @endforeach</td>
                                <td>{{$construction->description}}</td>
                                <td>{{$construction->getOwner()}}</td>
                                <td>
                                    <a href="{{route('constructions.edit', $construction->id)}}" class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-construction" data-path="{{route('constructions.destroy', $construction->id)}}">
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