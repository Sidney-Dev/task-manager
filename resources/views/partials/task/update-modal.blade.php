<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#taskUpdateModal">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="taskUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="taskUpdateModalLabel">{{ $task->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('task.update', $task->id) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Task</label>
                    <input value="{{ $task->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp">
                    @error('name')
                        <div class="invalid-feedback">
                            Name is a required field
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
</div>