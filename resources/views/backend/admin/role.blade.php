@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'roles')

@section('pagename', 'Roles')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <div class="row">
            <div class="col-md-12">
                <h6 class="card-body-title">Admins Roles Table
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                        Add Role <i class="fa fa-plus mg-r-10"></i>
                    </a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-5p">Id</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Permissions</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $roles->firstitem() + $key }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge badge-info m-1" style="font-size: 0.75rem">
                                                {{ $permission->name }}
                                                <a href="{{ route('role.revoke.permission', [$role->id, $permission->id]) }}" class="badge badge-danger" title="Click to remove permission">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('role.permission', $role->id) }}" title="Permission" class="btn btn-sm btn-info">
                                            Permission
                                        </a>

                                        <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/roles/'.$role->id) }}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $roles->links() }}
                    </div>

                </div><!-- table-wrapper -->
            </div>
            <div class="col-md-6"></div>
        </div>
    </div><!-- card -->

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Add a new Role
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'role.store']) }}
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

