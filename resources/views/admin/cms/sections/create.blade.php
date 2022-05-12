@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $page->name }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.pages.sections.store', [$page->id]) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label">Section Name:</label>
                          <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" id="name">
                          </div>
                          <div class="col-sm-2">
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="slug">
                          </div>
                          <div class="col-sm-2">
                            <input type="text" name="order" class="form-control" id="name" placeholder="order">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Section</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
