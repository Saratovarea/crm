@extends('administration.main')

@section('title', 'Администрирование - категории')
@section('administration-title', 'категории')

@section('administration-content')
    <div class="col-sm-6">
        <button type="button" class="btn btn-success" data-toggle="modal"
                data-target="#iud-modal"
                data-name=""
                data-id=""
                data-url="categories"> Добавить категорию
        </button>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $index => $category)
                <tr data-toggle="modal"
                    data-target="#iud-modal"
                    data-name="{{ $category->name }}"
                    data-id="{{ $category->id }}"
                    data-url="categories"
                    style="cursor: pointer">
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
