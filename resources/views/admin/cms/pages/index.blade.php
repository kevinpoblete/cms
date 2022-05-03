@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pages</div>

                <div class="card-body">
                    @foreach ($pages as $page)
                        <div class="row mb-2">
                            <div class="col-md-9">
                                    <a href="/pages/{{ $page->id }}">{{ $page->name }}</a>
                            </div>
                            <div class="col-md-1">
                                <a href="/pages/{{ $page->id }}/edit" type="button" class="btn btn-warning">Edit</a>
                            </div>
                            <div class="col-md-1">
                                <form action="/pages/{{ $page->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <a href="/pages/create" type="button" class="btn btn-primary">Add Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
