@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $page->name }}</div>

                <div class="card-body">
                    @foreach ($page->sections as $section)
                        <div class="section  border border-secondary m-4 p-2">
                            <div class="row">
                                <div class="col-md-9">
                                        <h1>{{ $section->name }}</h1>
                                </div>
                                @if (auth()->user()->role_id == 1)
                                    <div class="col-md-1">
                                        <a href="{{ route('admin.pages.sections.edit', [$page->id, $section->id]) }}" type="button" class="btn btn-warning">Edit</a>
                                    </div>
                                    <div class="col-md-1">
                                        <form action="{{ route('admin.pages.sections.destroy', [$page->id, $section->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>  
                                @endif
                                
                            </div>
                            @if ($section->contents->count() >= 1)
                                <form action="{{ route('admin.pages.sections.contents.update', [$page->id, $section->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    @foreach ($section->contents as $content)
                                        <div class="form-row mb-2">
                                            <label for="{{ $content->label }}" class="col-sm-2 col-form-label text-capitalize">{{ $content->label }}</label>
                                            <div class="col-sm-10">
                                                @if ($content->input_id == 1 )
                                                    <input type="text" name="contents[{{ $content->id }}]" class="form-control" id="name" value="{{ $content->content }}">

                                                    @elseif ($content->input_id == 2)
                                                    <textarea class="form-control" name="contents[{{ $content->id }}]" id="exampleFormControlTextarea1" rows="3">{{ $content->content }}</textarea>
                                                @endif
                                            </div>
                                            <!--<div class="col-sm-1">
                                                <form action="/pages/{{ $page->id }}/sections/{{ $section->id }}/contents/{{ $content->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <svg width="25" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.5 0.25C13.2861 0.25 10.1443 1.20305 7.47199 2.98862C4.79969 4.77419 2.71689 7.31209 1.48697 10.2814C0.257041 13.2507 -0.0647633 16.518 0.562247 19.6702C1.18926 22.8224 2.73692 25.7179 5.00952 27.9905C7.28213 30.2631 10.1776 31.8108 13.3298 32.4378C16.482 33.0648 19.7493 32.743 22.7186 31.513C25.6879 30.2831 28.2258 28.2003 30.0114 25.528C31.797 22.8557 32.75 19.7139 32.75 16.5C32.75 14.366 32.3297 12.2529 31.5131 10.2814C30.6964 8.30985 29.4994 6.51847 27.9905 5.00952C26.4815 3.50056 24.6902 2.3036 22.7186 1.48696C20.7471 0.670319 18.634 0.25 16.5 0.25ZM20.9038 18.5963C21.0561 18.7473 21.177 18.927 21.2595 19.1251C21.342 19.3231 21.3844 19.5355 21.3844 19.75C21.3844 19.9645 21.342 20.1769 21.2595 20.3749C21.177 20.573 21.0561 20.7527 20.9038 20.9038C20.7527 21.0561 20.573 21.177 20.3749 21.2594C20.1769 21.3419 19.9645 21.3844 19.75 21.3844C19.5355 21.3844 19.3231 21.3419 19.1251 21.2594C18.927 21.177 18.7473 21.0561 18.5963 20.9038L16.5 18.7913L14.4038 20.9038C14.2527 21.0561 14.073 21.177 13.8749 21.2594C13.6769 21.3419 13.4645 21.3844 13.25 21.3844C13.0355 21.3844 12.8231 21.3419 12.6251 21.2594C12.427 21.177 12.2473 21.0561 12.0963 20.9038C11.9439 20.7527 11.8231 20.573 11.7406 20.3749C11.6581 20.1769 11.6156 19.9645 11.6156 19.75C11.6156 19.5355 11.6581 19.3231 11.7406 19.1251C11.8231 18.927 11.9439 18.7473 12.0963 18.5963L14.2088 16.5L12.0963 14.4038C11.7903 14.0978 11.6184 13.6827 11.6184 13.25C11.6184 12.8173 11.7903 12.4022 12.0963 12.0963C12.4023 11.7903 12.8173 11.6184 13.25 11.6184C13.6827 11.6184 14.0978 11.7903 14.4038 12.0963L16.5 14.2088L18.5963 12.0963C18.9023 11.7903 19.3173 11.6184 19.75 11.6184C20.1827 11.6184 20.5978 11.7903 20.9038 12.0963C21.2098 12.4022 21.3817 12.8173 21.3817 13.25C21.3817 13.6827 21.2098 14.0978 20.9038 14.4038L18.7913 16.5L20.9038 18.5963Z" fill="red"/>
                                                    </svg>
                                                </button>
                                                </form>
                                                
                                                    
                                            </div>-->
                                            
                                        </div>
                                            
                                    @endforeach

                                    @if ($section->uploads->count() >=1 )
                                        @foreach ($section->uploads as $upload)
                                            <div class="form-row mb-2">
                                                <label for="{{ $upload->label }}" class="col-sm-2 col-form-label text-capitalize">{{ $upload->label }}</label>
                                                <div class="custom-file col-sm-6">
                                                    <input type="file" class="custom-file-input" name="img[{{ $upload->id }}]" id="inputGroupFile02">
                                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <img src="/storage/cms/{{ $upload->file_name }}" alt="" class="img-thumbnail">
                                                </div>
                                            
                                            </div>
                                        @endforeach
                                        

                                    @endif

                                    <div class="d-flex flex-row-reverse">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                    
                                </form>  
                            @endif
                            @if (auth()->user()->role_id == 1)
                                <div class="add-content border mt-4 p-2">
                                    <h5>Add Content</h5>
                                    <form action="{{ route('admin.pages.sections.contents.store', [$page->id, $section->id]) }}" method="POST">
                                        @csrf
                                        <div class="form-row mb-2">
                                            <div class="col-2">
                                            <input type="text" name="label" class="form-control" placeholder="Label">
                                            </div>
                                            <div class="col-5">
                                            <input type="text" name="content" class="form-control" placeholder="Content">
                                            </div>
                                            <div class="col-3">
                                                <select id="input" name="input_id" class="form-control">
                                                    @foreach ($inputs as $input)
                                                        <option value="{{ $input->id }}">{{ $input->input_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <input type="text" name="slug" class="form-control" placeholder="Slug">
                                            </div>
                                            <input type="hidden" name="order" value="{{ $section->contents->count() + 1  }}">
                                            
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    
                                    </form>
                                </div>
                                <div class="add-image border mt-4 p-2">
                                    <h5>Add Image</h5>
                                    <form action="{{ route('admin.pages.sections.upload', [$page->id, $section->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-2">
                                            <input type="text" name="label" class="form-control" placeholder="Label">
                                        </div>
                                        <div class="col-2">
                                            <input type="text" name="slug" class="form-control" placeholder="Slug">
                                        </div>
                                        <div class="col-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="img" id="inputGroupFile02">
                                                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row-reverse mt-2">
                                        <button type="submit" class="btn btn-primary">Add image</button>
                                    </div>
                                    </form>   
                                </div>
                            @endif
                            
                            
                        </div>
                        
                    @endforeach
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('admin.pages.sections.create', [$page->id]) }}" type="button" class="btn btn-primary">Add Section</a>    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
