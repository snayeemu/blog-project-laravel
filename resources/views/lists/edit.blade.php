<x-backend.layouts.home>
<form action="{{ route('lists_update') }}" method="POST">
        @csrf
        <input type="hidden" name="task_id" value="{{ $task['id'] }}"> 
        <div class="form-group">
            <label for="exampleInputTask">Task</label>
            <input type="text" class="form-control" id="exampleInputTask" aria-describedby="taskHelp" name="tasks" value="{{ $task['tasks'] }}">
            <small id="taskHelp" class="form-text text-muted">Enter what you need to keep track of.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputStatus">Status</label>
            <select id="exampleInputStatus" class="custom-select" name="status">
                <option value="pending" selected>Pending</option>
                <option value="running">Running</option>
                <option value="Done">Done</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPriority">Priority</label>
            <select id="exampleInputStatus" class="custom-select" name="priority" required>
                <option selected>Choose one...</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-backend.layouts.home>