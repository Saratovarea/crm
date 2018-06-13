@extends('layouts.app')

@section('title', 'Администрирование')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="panel panel-default">
                    <div class="panel-heading">Администрирование - @yield('administration-title')</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-1">
                                <ul>
                                    <li>
                                        <a href="{{route('administration/statuses')}}"> Статусы </a>
                                    </li>
                                    <li>
                                        <a href="{{route('administration/categories')}}"> Категории </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-1 col-xs-offset-2">
                                <div>
                                    @yield('administration-content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
