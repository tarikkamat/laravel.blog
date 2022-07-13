@extends('layouts.admin')
@section('title', 'Category List')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category List</li>
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
                                <h3 class="card-title">Categories Table</h3>
                            </div>
                            <div class="card-body">
                                @if($categories->count() > 0)
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    @if ($category->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                                       class="btn btn-sm btn-warning btn-flat">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.category.destroy', $category->id) }}"
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
                                        <a href="{{ route('admin.category.create') }}" class="btn btn-lg btn-info">
                                            <i class="fas fa-plus-square fa-sm"></i> &nbsp; Create New Category</a>
                                    </h3>
                                @endif
                            </div>
                            @if($categories->count() > 10)
                                <div class="card-footer clearfix">
                                    {{ $categories->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
