@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class="card mb-3">
                <div class="card-header">New task</div>

                <div class="card-body">
                    <form method="post" action="{{ route('task.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Task</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp">
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

        <div class="row">
            <div class="card">
                <div class="card-body"></div>
                    @if($tasks)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $task->id }}</th>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->created_at->diffForHumans() }}</td>
                                        <td>{{ $task->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <form method="post" action="{{ route('task.destroy', ['task' => $task->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            @include('partials.task.update-modal')
                                        </td>
                                    </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    @else
                        <h1 class="text-center">No tasks added</h1>
                    @endif
                </div>
            </div>

        </div>
    </div>


@endsection