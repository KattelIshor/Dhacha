@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'permission')

@section('pagename', 'Permission')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <div class="row">
            <div class="col-md-8">
                <h6 class="card-body-title">Admins Permission Table
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                        Add Permission <i class="fa fa-plus mg-r-10"></i>
                    </a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">Id</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Guard</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                                <tr>
                                    <td>{{ $permissions->firstitem() + $key }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td>
                                        <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/permission/'.$permission->id) }}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $permissions->links() }}
                    </div>

                </div><!-- table-wrapper -->
            </div>
            <div class="col-md-6"></div>
        </div>
    </div><!-- card -->

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Add a new permission
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'permission.store']) }}
        </x-slot>

        <x-slot name="body">
            <div class="form-group">
                {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Name']) }}
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

