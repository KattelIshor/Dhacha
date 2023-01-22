@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'post')

@section('pagename', 'Post')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Table
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary mg-b-10 float-right">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Title Eng</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-15p">Category Eng</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{ $posts->firstitem() + $key }}</td>
                            <td>{{ $post->title_en }}</td>
                            <td><img src="{{ asset($post->image) }}" alt="Category Name" width="80px" height="50px"></td>
                            <td>{{ $post->postcategory->name_en  }}</td>
                            <td>
                                @if ($post->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if ($post->status == 1)
                                    {{ Form::open(['route' => ['posts.inactive.store', $post->id], 'class' => 'd-inline-block']) }}
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></button>
                                    {{ Form::close() }}
                                @else
                                    {{ Form::open(['route' => ['posts.active.store', $post->id], 'class' => 'd-inline-block']) }}
                                        <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-thumbs-up"></i></button>
                                    {{ Form::close() }}
                                @endif

                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/posts/'.$post->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    <!-- Delete Modal -->
    <x-delete>
        <x-slot name="form">
            {{ Form::open(['method' => 'DELETE', 'id' => 'deleteForm']) }}
        </x-slot>
    </x-delete>
    <!--End Delete Modal -->

    {{-- For Dashboard operations --}}
    <script src="{{ mix('js/dashboard.js') }}"></script>
@endsection
