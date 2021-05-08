@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('admin.checklist_groups.checklists.update',[$checklistGroup,$checklist]) }}"
                        method="POST">

                        @csrf
                        @method('PUT')
                        <div class="card-header"> {{ __(" Edit Checklist in ") }}
                            <strong>{{ $checklistGroup->name }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">

                                    @if ($errors->store_checklists->any())

                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->store_checklists->all() as $error)
                                        <div>{{ $error }}</div>
                                        @endforeach
                                    </div>

                                    @endif

                                    <div class="form-group" data-children-count="1">
                                        <label for="checklistName">{{ __('Name') }}</label>
                                        <input value="{{ $checklist->name }}" class="form-control" name="name"
                                            id="checklistName" type="text">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Checklist') }} </button>
                        </div>

                    </form>


                </div>
                <form action="{{ route('admin.checklist_groups.checklists.destroy',[$checklistGroup,$checklist]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <button onclick="return confirm('{{ __('Are you Sure 😞?') }}')" class="btn btn-sm btn-danger"
                            type="submit">
                            {{ __('Delete This Checklist') }}
                        </button>
                    </div>
                </form>

                <hr>

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>
                        <h2>{{ __('List of Tasks') }}</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Task Name') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checklist->tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('admin.checklists.tasks.edit',[$checklist,$task]) }}">
                                            {{ __('Edit') }}
                                        </a>

                                        <form class="d-inline"
                                            action="{{ route('admin.checklists.tasks.destroy',[$checklist,$task]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('{{ __('Are you Sure 😞?') }}')"
                                                class="btn btn-sm btn-danger" type="submit">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <form action="{{ route('admin.checklists.tasks.store',$checklist) }}" method="POST">
                        @csrf

                        <div class="card-header">
                            {{ __("Add New Task To ") }}
                            <strong>{{ $checklist->name }} </strong>
                            {{ __(" Checklist") }}
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">

                                    @if ($errors->store_task->any())

                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->store_task->all() as $error)
                                        <div>{{ $error }}</div>
                                        @endforeach
                                    </div>

                                    @endif

                                    <div class="form-group" data-children-count="1">
                                        <label for="taskName">{{ __('Name') }}</label>
                                        <input class="form-control" value="{{ old('name') }}" name="name" id="taskName"
                                            type="text">
                                    </div>
                                    <div class="form-group" data-children-count="2">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea rows="5" class="form-control" name="description" id="description"
                                            type="text">{{ old('description') }}</textarea>
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