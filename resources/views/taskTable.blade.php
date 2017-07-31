<div class="taskList table-responsive">
    @if(count($tasks) > 0)
        <table class="table table-hover table-bordered table-condensed">
            <thead>
                <th><p>#</p></th>
                <th><p>Заголовок</p></th>
                <th><p>Дата выполнения</p></th>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr data-toggle="modal" data-target="#taskModal">
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($tasks instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="pagination_wrap">{{ $tasks->links() }}</div>
        @endif
    @else
        <h2>По вашему запросу ничего не найдено</h2>
    @endif
</div>