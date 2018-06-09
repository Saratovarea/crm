<div>
    <form class="form-horizontal" method="GET" action="{{route('home')}}">

        {{-- CATEGORY --}}
        <select id="category" class="form-control" name="category">
            <option selected value> -- КАТЕГОРИЯ --</option>
            @foreach ($categories as $category)
                <option @if ($category->id == $category_checked) selected @endif
                value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        {{-- STATUS --}}
        <select id="status" class="form-control" name="status">
            <option selected value> -- СТАТУС --</option>
            @foreach ($statuses as $status)
                <option @if ($status->id == $status_checked) selected @endif
                value="{{ $status->id }}"> {{ $status->name }}</option>
            @endforeach
        </select>

        {{-- CREATOR --}}
        <select id="creator" class="form-control" name="creator">
            <option selected value> -- ЗАЯВИТЕЛЬ --</option>
            @foreach ($creators as $creator)
                <option @if ($creator->id == $creator_checked) selected @endif
                value="{{ $creator->id }}">{{ $creator->name }}</option>
            @endforeach
        </select>

        {{-- EXECUTOR --}}
        <select id="executor" class="form-control" name="executor">
            <option selected value> -- ИСПОЛНИТЕЛЬ --</option>
            @foreach ($executors as $executor)
                <option @if ($executor->id == $executor_checked) selected @endif
                value="{{ $executor->id }}">{{ $executor->name }}</option>
            @endforeach
        </select>

        {{-- DATE CREATE --}}
        {{--<input id="date_create" type="text" class="form-control">--}}

        {{-- BUTTON --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Применить</button>
        </div>

        {{ csrf_field() }}
    </form>
</div>