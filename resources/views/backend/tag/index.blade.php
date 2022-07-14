@extends('layouts.admin')
@section('title', 'Tag List')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tag List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tag List</li>
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
                                <h3 class="card-title">Tags Table</h3>
                            </div>
                            <div class="card-body">
                                @if($tags->count() > 0)
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Name</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.tag.edit', $tag->id) }}"
                                                       class="btn btn-sm btn-warning btn-flat">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.tag.destroy', $tag->id) }}"
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
                                        <a href="{{ route('admin.tag.create') }}" class="btn btn-lg btn-info">
                                            <i class="fas fa-plus-square fa-sm"></i> &nbsp; Create New Tag</a>
                                    </h3>
                                @endif
                            </div>
                            <div class="card-footer clearfix">
                                {{ $tags->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
