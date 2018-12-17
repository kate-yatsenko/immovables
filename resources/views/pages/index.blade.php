@extends('pages.layout')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($constructions as $construction)
                <div class="col-md-6 my-4">
                    <div class="card" style="width: 100%;">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($construction->getImages() as $key => $image)
                                    @if($key == 0 )
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" height="300px"
                                                 src="/uploads/{{$image->image}}"/>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img class="d-block w-100" height="300px"
                                                 src="/uploads/{{$image->image}}"/>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text">город: {{$construction->getCityTitle()}},
                                район: {{$construction->getDistrictTitle()}},
                                категория: {{$construction->getCategoryTitle()}}, тип
                                постройки: {{$construction->getTypeTitle()}}</p>
                            <p class="card-text">@foreach($construction->getValuesTitles() as $value)
                                    {{$value->property->title}}: {{$value->value}};
                                @endforeach</p>
                            <p class="card-text">{{$construction->description}}</p>
                            <p class="card-text">Юридическое лицо: {{$construction->getOwner()}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$constructions->links()}}
    </div>




@endsection