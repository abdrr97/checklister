@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('admin.checklists.tasks.update',[$checklist,$task]) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="card-header"> {{ __(" Edit Task from ") }}
                            <strong>{{ $checklist->name }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">

                                    @if ($errors->store_tasks->any())

                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->store_tasks->all() as $error)
                                        <div>{{ $error }}</div>
                                        @endforeach
                                    </div>

                                    @endif

                                    <div class="form-group" data-children-count="1">
                                        <label for="taskName">{{ __('Name') }}</label>
                                        <input value="{{ $task->name }}" class="form-control" name="name" id="taskName"
                                            type="text">

                                    </div>

                                    <div class="form-group" data-children-count="2">
                                        <label for="task-textarea">{{ __('Description') }}</label>
                                        <textarea rows="5" class="form-control" name="description" id="task-textarea"
                                            type="text">{{ $task->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Task') }} </button>
                        </div>

                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection