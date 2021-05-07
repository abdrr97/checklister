@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('admin.checklist_groups.store') }}" method="POST">

                        @csrf

                        <div class="card-header">{{ __('New Checklist Group') }}</div>

                        {{-- Card Body --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">

                                    @if ($errors->any())

                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                        @endforeach
                                    </div>

                                    @endif

                                    <div class="form-group" data-children-count="1">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            id="name" type="text" placeholder="{{ __('Checklist group name') }}">
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
        </div>
    </div>
</div>
@endsection