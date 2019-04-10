@extends('administration.main')

@section('title', 'Администрирование - права')
@section('administration-title', 'права')

@section('administration-content')
    <div>
        <form class="form-inline" method="POST" action="{{route('createUserRole')}}">
            {{ csrf_field() }}

            <select id="user" class="form-control" name="user">
                @foreach ($users as $i)
                    <option value="{{$i->id}}"> {{$i->name}} </option>
                @endforeach
            </select>


            <select id="role" class="form-control" name="role">
                @foreach ($roles as $i)
                    <option value="{{$i->id}}"> {{$i->display_name}} </option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary">
                Назначить роль
            </button>

    </div>

    </form>
    </div>


@endsection
