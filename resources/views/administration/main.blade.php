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
                                @yield('administration-content')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--MODAL--}}
    <div class="modal fade" id="iud-modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="iud-modal-title"> @yield('modal-title') </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="iud-modal-form-add" method="post">
                        {{ csrf_field() }}

                        <input id="iud-modal-form-name-add" type="text" class="form-control" name="name" required>
                    </form>

                    <form id="iud-modal-form-edit" method="post">
                        {{ csrf_field() }}

                        <input id="iud-modal-form-id" type="text" name="id" style="display: none">

                        <input id="iud-modal-form-name-edit" type="text" class="form-control" name="name" required>
                    </form>

                    <form id="iud-modal-form-delete" method="post">
                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="iud-modal-button-add" type="submit" form="iud-modal-form-add"
                            class="btn btn-success btn-sm">Добавить
                    </button>
                    <button id="iud-modal-button-edit" type="submit" form="iud-modal-form-edit"
                            class="btn btn-success btn-sm">Сохранить
                    </button>
                    <button id="iud-modal-button-delete" type="submit" form="iud-modal-form-delete"
                            class="btn btn-danger btn-sm">Удалить
                    </button>
                    <button type="submit" class="btn btn-secondary btn-sm" data-dismiss="modal">Отменить</button>
                </div>
            </div>
        </div>
    </div>
@endsection
