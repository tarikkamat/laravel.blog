@extends('layouts.admin')
@section('title', 'Category Edit')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category List</a>
                            </li>
                            <li class="breadcrumb-item active">Category Edit</li>
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
                                <h3 class="card-title">Category Edit Form</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.category.update',$category->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" id="name"
                                               value="{{ $category->name }}">
                                        @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Parent Category</label>
                                        <select class="form-control" name="parent_id" id="parent_id">
                                            @if($category->parent_id == null)
                                                <option value="">Select Parent Category</option>
                                                @foreach($categories as $item)
                                                    @if($item->id != $category->id)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option
                                                    value="{{ $category->parent_id }}">{{ $category->child->name }}</option>
                                                @foreach($categories as $item)
                                                    @if($item->id != $category->child->id)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endif
                                                @endforeach
                                                <option value="">None</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            @if($category->status == 1)
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            @else
                                                <option value="0">Inactive</option>
                                                <option value="1">Active</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
