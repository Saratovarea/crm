@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">@if ($task->id > 0) Заявка № {{$task->id}} @else Новая заявка @endif</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('task/iud')}}">

                            {{-- ID --}}
                            <input id="id" name="id" value="{{$task->id}}" style="display: none">

                            {{-- TITLE --}}
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Тема</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required
                                           value="{{$task->title}}">
                                </div>
                            </div>

                            {{-- CATEGORY --}}
                            <div class="form-group">
                                <label for="category" class="col-md-4 control-label">Категория</label>

                                <div id="category" class="col-md-6">
                                    <select name="category" class="form-control" name="category">
                                        @foreach ($categories as $category)
                                            <option @if ($task->category_id == $category->id) selected @endif
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- STATUS --}}
                            @if ($task->id > 0)
                                <div class="form-group">
                                    <label for="status" class="col-md-4 control-label">Статус</label>

                                    <div id="status" class="col-md-6">
                                        <select id="status" class="form-control" name="status">
                                            @foreach ($statuses as $status)
                                                <option @if ($task->status_id == $status->id) selected @endif
                                                value="{{ $status->id }}"> {{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            @role('admin')
                            {{-- EXECUTOR --}}
                            <div class="form-group">
                                <label for="executor" class="col-md-4 control-label">Исполнитель</label>

                                <div id="executor" class="col-md-6">
                                    <select id="executor" class="form-control" name="executor">
                                        <option disabled selected value> -- ИСПОЛНИТЕЛЬ --</option>
                                        @foreach ($executors as $executor)
                                            <option @if ($task->executor_id == $executor->id) selected @endif
                                            value="{{ $executor->id }}">{{ $executor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endrole

                            {{-- DESCRIPTION --}}
                            <div class="form-group">
                                <label for="descr" class="col-md-4 control-label">Описание</label>

                                <div class="col-md-6">
                                    <input id="descr" type="text" class="form-control" name="descr" required
                                           value="{{$task->descr}}">
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">ОК</button>
                            </div>

                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
