<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="{{route('constructions.index')}}"><i class="fa fa-building"></i><span class="building">Постройки</span></a></li>
    <li><a href="{{route('cities.index')}}">Города</a></li>
    <li><a href="{{route('districts.index')}}">Районы</a></li>
    <li><a href="{{route('types.index')}}">Типы построек</a></li>
    <li><a href="{{route('categories.index')}}">Категории</a></li>
    <li><a href="{{route('properties.index')}}">Свойства Построек</a></li>
    @if(Auth::check() && Auth::user()->role_id == \App\User::ADMIN)
        <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i><span class="building">Пользователи</span></a></li>
        <li><a href="{{route('roles.index')}}">Роли</a></li>
    @endif
</ul>
{{--@if (\Illuminate\Support\Facades\Session::get('menu_active',0) == 1) style="display: block" @endif--}}

