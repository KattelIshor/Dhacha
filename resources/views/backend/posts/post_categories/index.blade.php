@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'post-categories')

@section('pagename', 'Post Category')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Categories Table
            <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Name in Eng</th>
                        <th class="wd-15p">Name in Nep</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postCategory as $key => $post_category)
                        <tr>
                            <td>{{ $postCategory->firstitem() + $key }}</td>
                            <td>{{ $post_category->name_en }}</td>
                            <td>{{ $post_category->name_bn }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('post-categories.edit', $post_category->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/post-categories/'.$post_category->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $postCategory->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Add a new Post category
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'post-categories.store']) }}
        </x-slot>

        <x-slot name="body">
            <div class="form-group">
                {{ Form::label('name_en', 'Post Category name eng.', ['class' => 'form-control-label']) }}
                {{ Form::text('name_en', null, ['class' => 'form-control','id' => 'name_en', 'placeholder' => 'Post Category name english']) }}
            </div>

            <div class="form-group">
                {{ Form::label('name_bn', 'Post Category name nep.', ['class' => 'form-control-label']) }}
                {{ Form::text('name_bn', null, ['class' => 'form-control','id' => 'name_bn', 'placeholder' => 'Post Category name bangla']) }}
            </div>

        </x-slot>
    </x-insert>
    {{-- End Category Insert Modal --}}

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
