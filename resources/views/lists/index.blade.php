<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>    
    <div class="container">
        <h1>Lists</h1>
        <a href="{{ route('list_create') }}" class="btn btn-primary mb-2">Create New Task</a>
        @if(session()->has('message'))
        <div class = "alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tasks</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Priority</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listsForView as $index => $task)
                <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $task->tasks }}</td>
                <td><img src="{{ asset('images/uploads/'.$task->image) }}" alt="" class="image-fluid w-25 h-25"></td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->priority }}</td>
                <td>
                    <a href="{{ route('lists_edit', ['list_id' => $task->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('lists_delete', ['task_id' => $task['id']]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                </tr>  
                @endforeach              
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>