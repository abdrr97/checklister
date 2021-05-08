@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('admin.pages.update',$page) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="card-header"> {{ __(" Edit Page") }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">

                                    @if (session('message'))
                                    <div class="alert alert-info">{{ session('message') }}</div>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <div class="form-group" data-children-count="1">
                                        <label for="pageTitle">{{ __('Title') }}</label>
                                        <input value="{{ $page->title }}" class="form-control" name="title"
                                            id="pageTitle" type="text">

                                    </div>

                                    <div class="form-group" data-children-count="2">
                                        <label for="page-content-textarea">{{ __('Content') }}</label>
                                        <textarea rows="5" class="form-control" name="content"
                                            id="page-content-textarea" type="text">{{ $page->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Page') }} </button>
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
        .create( document.querySelector( '#page-content-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection