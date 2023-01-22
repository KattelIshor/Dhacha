@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'brands')

@section('pagename', 'Brand')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand Table
            <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Brand name</th>
                        <th class="wd-15p">Logo</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $key => $brand)
                        <tr>
                            <td>{{ $brands->firstitem() + $key }}</td>
                            <td>{{ $brand->name }}</td>
                            <td><img src="{{ asset($brand->logo) }}" alt="Brand Name" width="80px" height="50px"></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/brands/'.$brand->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $brands->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Add a new Brand
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'brands.store', 'files' => true]) }}
        </x-slot>

        <x-slot name="body">
            <div class="form-group">
                {{ Form::label('name', 'Brand name', ['class' => 'form-control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Brand name']) }}
            </div>

            <div class="form-group">
                <label class="custom-file" for="logo">
                    <input type="file" name="logo" id="logo" class="custom-file-input" onchange="readURL(this)">
                    <span class="custom-file-control custom-file-control-primary"></span>
                </label>
                <br><br>
                <img id="one">
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

    {{--Ajax Image loader --}}
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    {{-- For Dashboard operations --}}
    <script src="{{ mix('js/dashboard.js') }}"></script>
@endsection
