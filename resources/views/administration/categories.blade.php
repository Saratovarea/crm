@extends('administration.main')

@section('title', 'Администрирование - категории')
@section('administration-title', 'категории')

@section('administration-content')
    <div class="col-sm-6">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a class="btn btn-default btn-sm"
                           href="{{route('administration/categories/delete', ['id' => $category->id])}}">
                            Удалить </a>
                        <button class="btn btn-default btn-sm">Редактировать</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <form method="post" action="{{route('administration/categories/add')}}">
            {{ csrf_field() }}

            <div class="form-group-sm">
                <label for="email" class="col-md-3 control-label col-md-offset-1">Новая категория</label>

                <div class="col-md-3 col-md-offset-1">
                    <input id="categoryname" type="text" class="form-control" name="categoryname" required>
                </div>
            </div>

            <div class="row form-group-sm">
                <button class="btn btn-sm btn-primary">Добавить</button>
                {{--<button class="btn btn-sm btn-primary">Редактировать</button>--}}
            </div>
        </form>
    </div>
@endsection