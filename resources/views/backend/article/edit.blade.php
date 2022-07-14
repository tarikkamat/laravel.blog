@extends('layouts.admin')
@section('title', 'Article Edit')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Article Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Article List</a>
                            </li>
                            <li class="breadcrumb-item active">Article Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Article Edit Form</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.article.update',$article->id) }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title"
                                               class="form-control @error('title') is-invalid @enderror" id="title"
                                               value="{{ $article->title }}">
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug"
                                               class="form-control @error('slug') is-invalid @enderror" id="slug"
                                               value="{{ $article->slug }}">
                                        @error('slug')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea id="content" name="content">{{ $article->content }}</textarea>
                                    </div>
                                    @if ($article->image_path != null)
                                        <div class="form-group">
                                            <label for="image">CurrentImage</label><br/>
                                            <img src="{{ asset('uploads/' . $article->image_path) }}" alt="{{ $article->title }}"
                                                 width="350px" height="200px" class="img-responsive"
                                                 style="border: 2px solid black"/>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label>Categories</label>
                                        <select name="categories[]"
                                                class="select2bs4"
                                                multiple="multiple"
                                                data-placeholder="Select a Category"
                                                style="width: 100%;" required>
                                            @if($article->categories->count() == 0)
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach($article->categories as $articleCategory)
                                                    <option value="{{ $articleCategory->id }}"
                                                            selected>{{ $articleCategory->name }}</option>
                                                @endforeach
                                                @foreach($categories as $category)
                                                    @if(!$article->categories->contains($category->id))
                                                        <option
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <select name="tags[]" class="select2bs4" multiple="multiple"
                                                data-placeholder="Select a Tag"
                                                style="width: 100%;">
                                            @if($article->tags->count() == 0)
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach($article->tags as $articleTag)
                                                    <option value="{{ $articleTag->id }}"
                                                            selected>{{ $articleTag->name }}</option>
                                                @endforeach
                                                @foreach($tags as $tag)
                                                    @if(!$article->tags->contains($tag->id))
                                                        <option
                                                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="select2bs4" style="width: 100%;"
                                                aria-hidden="true">
                                            @if($article->status == 'active')
                                                <option value="active" selected>Active</option>
                                                <option value="draft">Draft</option>
                                                <option value="inactive">Inactive</option>
                                            @elseif($article->status == 'draft')
                                                <option value="draft" selected>Draft</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            @else
                                                <option value="inactive" selected>Inactive</option>
                                                <option value="active">Active</option>
                                                <option value="draft">Draft</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#content').summernote({
                tabsize: 2,
                height: 200
            });
        });
        $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endsection
