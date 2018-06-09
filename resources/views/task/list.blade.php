<table id="patient-list" class="table table-hover table-sm">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Тема</th>
        <th scope="col">Категория</th>
        <th scope="col">Заявитель</th>
        <th scope="col">Исполнитель</th>
        <th scope="col">Статус</th>
        <th scope="col">Описание</th>
        <th scope="col">Дата создания</th>
        <th scope="col">Дата изменения</th>
        <th scope="col">Затраченное время</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $index => $task)
        <tr style="cursor: pointer" onclick="window.location='task/{{$task->id}}';">
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $task->title }}</td>
            <td>{{ $task->categoryname }}</td>
            <td>{{ $task->creatorname }}</td>
            <td>{{ $task->executorname }}</td>
            <td>{{ $task->statusname }}</td>
            <td>{{ $task->descr }}</td>
            <td>{{ $task->created_at }}</td>
            <td>{{ $task->updated_at }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
