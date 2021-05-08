@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('admin.checklist_groups.update',$checklistGroup) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="card-header">{{ __('Edit Checklist Group') }}</div>

                        {{-- Card Body --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">

                                    @if ($errors->store_checklist_groups->any())

                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->store_checklist_groups->all() as $error)
                                        <div>{{ $error }}</div>
                                        @endforeach
                                    </div>

                                    @endif

                                    <div class="form-group" data-children-count="1">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input value="{{ old('name') ?? $checklistGroup->name }}"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            id="name" type="text">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Card Body --}}

                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save') }} </button>
                        </div>

                    </form>


                </div>
            </div>
            <form action="{{ route('admin.checklist_groups.destroy',$checklistGroup) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="card-body">
                    <button onclick="return confirm('{{ __('Are you Sure 😞?') }}')" class="btn btn-sm btn-danger"
                        type="submit">
                        {{ __('Delete This Checklist Group') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection