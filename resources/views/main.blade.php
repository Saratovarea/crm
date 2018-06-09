@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Список задач</div>

                    <div class="panel-body">
                        @include('task.filter')
                        @include('task.list')
                    </div>
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
