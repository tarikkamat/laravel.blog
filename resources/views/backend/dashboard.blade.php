@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $articleCount }}</h3>
                                <p>TOTAL ARTICLE</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa fa-chart-bar"></i>
                            </div>
                            <a href="{{ route('admin.article.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $categoryCount }}</h3>
                                <p>TOTAL CATEGORY</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa fa-chart-bar"></i>
                            </div>
                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $tagCount }}</h3>
                                <p>TOTAL TAG</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa fa-chart-bar"></i>
                            </div>
                            <a href="{{ route('admin.tag.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Last Comments</h3>
                            </div>
                            <div class="card-body">
                                @if($comments->count() > 0)
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Article Title</th>
                                            <th>Name</th>
                                            <th>Comment</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Date</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $comment->article->title }}</td>
                                                <td>{{ $comment->name }}</td>
                                                <td>{{ $comment->content }}</td>
                                                <td>
                                                    @if ($comment->status == false)
                                                        <span class="badge badge-danger">Unapproved</span>
                                                    @else
                                                        <span class="badge badge-success">Approved</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $comment->created_at->format('d-m-Y H:i') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.comment.update',$comment->id) }}"
                                                       @if($comment->status == false)
                                                           class="btn btn-sm btn-warning btn-flat">
                                                        <i class="fa fa-ban"></i>
                                                        @else
                                                            class="btn btn-sm btn-success btn-flat">
                                                            <i class="fa fa-check"></i>
                                                        @endif
                                                    </a>
                                                    <a href="{{ route('admin.comment.destroy',$comment->id) }}"
                                                       class="btn btn-sm btn-danger btn-flat">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h3 class="text-center">No Data 😢<br/>
                                @endif
                            </div>
                            <div class="card-footer clearfix">
                                {{ $comments->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
