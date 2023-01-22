@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'categories')

@section('pagename', 'Category')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Categories Table
            <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Category name</th>
                        <th class="wd-15p">Subcategory</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $categories->firstitem() + $key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @foreach ($category->child_category as $child)
                                    {{ $child->name }},
                                @endforeach
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/categories/'.$category->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    <div class="card pd-20 pd-sm-40 mt-4">
        <h6 class="card-body-title">Sub Categories Table </h6>

        <div class="table-wrapper mt-5">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Sub Category name</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $key => $subcategory)
                        <tr>
                            <td>{{ $categories->firstitem() + $key }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('categories.edit', $subcategory->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/categories/'.$subcategory->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $subcategories->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Add a new category
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'categories.store', 'files' => true]) }}
        </x-slot>

        <x-slot name="body">
            <div class="form-group">
                {{ Form::label('name', 'Category name', ['class' => 'form-control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Category name']) }}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Sub Category name', ['class' => 'form-control-label']) }}
                <select name="category_id" id="category_id" class="form-control select2">
                    <option value="">Chose One</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
