@extends('administration.main')

@section('title', 'Администрирование - статусы')
@section('administration-title', 'статусы')

@section('administration-content')
    <div class="col-sm-6">
        <button type="button" class="btn btn-success" data-toggle="modal"
                data-target="#iud-modal"
                data-name=""
                data-id=""
                data-url="statuses"> Добавить статус
        </button>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($statuses as $index => $status)
                <tr data-toggle="modal"
                    data-target="#iud-modal"
                    data-name="{{ $status->name }}"
                    data-id="{{ $status->id }}"
                    data-url="statuses"
                    style="cursor: pointer">
                    <th scope=" row">{{ $index + 1 }}</th>
                    <td>{{ $status->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
