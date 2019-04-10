@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Личный кабинет</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('lk/user/update')}}">
                            {{ csrf_field() }}

                            {{-- E-MAIL --}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" value="{{Auth::user()->email}}" class="form-control"
                                           name="email" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- NAME --}}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{Auth::user()->name}}" class="form-control"
                                           name="name" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @role('manager')

                            {{-- STAGE --}}
                            <div class="form-group{{ $errors->has('floor') ? ' has-error' : '' }}">
                                <label for="floor" class="col-md-4 control-label">Этаж</label>

                                <div class="col-md-6">
                                    <input id="floor" type="number" value="{{Auth::user()->floor}}" class="form-control"
                                           name="floor" required>

                                    @if ($errors->has('floor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('floor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- OFFICE --}}
                            <div class="form-group">
                                <label for="office" class="col-md-4 control-label">Офис</label>

                                <div class="col-md-6">
                                    <input id="office" type="text" value="{{Auth::user()->office}}" class="form-control"
                                           name="office" required>
                                </div>
                            </div>

                            {{-- COMMENT --}}
                            <div class="form-group">
                                <label for="comment" class="col-md-4 control-label">Информация</label>

                                <div class="col-md-6">
                                    <input id="comment" type="text" value="{{Auth::user()->comment}}"
                                           class="form-control" name="comment">
                                </div>
                            </div>

                            @endrole

                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
