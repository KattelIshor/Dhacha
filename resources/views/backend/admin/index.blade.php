@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'admins')

@section('pagename', 'Admins')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Admins Table
            <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">E-mail</th>
                        <th class="wd-15p">Role</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $key => $admin)
                        <tr>
                            <td>{{ $admins->firstitem() + $key }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                @foreach ($admin->roles as $role)
                                    <span class="badge badge-info m-1" style="font-size: 0.75rem">
                                        {{ $role->name }}
                                        <a href="{{ route('remove.role', [$role->id,$admin->id]) }}" class="badge badge-danger" title="Click to remove role">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </span>
                                @endforeach
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/admins/'.$admin->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $admins->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Add a new Admin
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'admins.store']) }}
        </x-slot>

        <x-slot name="body">
            <div class="form-group">
                {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Name']) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'E-mail', ['class' => 'form-control-label']) }}
                {{ Form::email('email', null, ['class' => 'form-control','id' => 'email', 'placeholder' => 'Enter mail']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
                {{ Form::password('password', ['class' => 'form-control','id' => 'password', 'placeholder' => 'Password']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-control-label']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control','id' => 'password_confirmation', 'placeholder' => 'Confirm Password']) }}
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
