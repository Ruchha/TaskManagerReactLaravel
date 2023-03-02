<x-layout>
                                    <x-slot:title>Tasks</x-slot:title>

                                    <h1 class="centered__text">Tasks</h1>

    <div class="content__wrapper">
        <a href="/createTask"> <button class="button button__create">Create task</button></a>

    <table class="table " >
        <thead>
        <tr>
            <th class="main__table">Task</th>
            <th class="main__table">Status</th>
            <th class="main__table">Deadline</th>
            <th class="table__buttons">Actions</th>
        </tr>
        </thead>
        <tbody>

    @foreach ($tasks as $task)
        <tr>
            <td class="centered__text">{{ $task->task }}</td>
            <td class="centered__text">{{ $task->status }}</td>
            <td class="centered__text">{{ $task->deadline }}</td>
            <td class="table__buttons">
                <a href="/completeTask"> <button class="button button__table"> Complete</button></a>
                <a href="/updateTask/{{$task->id}}"> <button class="button button__table"> Update</button></a>
                <a href="/deleteTask/{{$task->id}}"> <button class="button button__table"> Delete</button></a>
            </td>
        </tr>
    @endforeach

        </tbody>
    </table>
    </div>
</x-layout>
