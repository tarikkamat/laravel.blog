@extends('layouts.admin')
@section('title', 'Article List')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Article List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Article List</li>
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
                                <h3 class="card-title">Articles Table</h3>
                            </div>
                            <div class="card-body">
                                @if($articles->count() > 0)
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Categories</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $article->title }}</td>
                                                <td>{{ $article->slug }}</td>
                                                <td>
                                                    @foreach ($article->categories as $category)
                                                        <span class="badge badge-info">{{ $category->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($article->status == 'active')
                                                        <span class="badge badge-success">Active</span>
                                                    @elseif($article->status == 'inactive')
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @else
                                                        <span class="badge badge-warning">Draft</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.article.edit', $article->id) }}"
                                                       class="btn btn-sm btn-warning btn-flat">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.article.destroy', $article->id) }}"
                                                       class="btn btn-sm btn-danger btn-flat">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h3 class="text-center">No Data<br/><br/>
                                        <a href="{{ route('admin.article.create') }}" class="btn btn-lg btn-info">
                                            <i class="fas fa-plus-square fa-sm"></i> &nbsp; Create New Article</a>
                                    </h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
