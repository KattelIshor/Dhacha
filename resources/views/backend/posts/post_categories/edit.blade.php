@extends('backend.layouts.layout')

@section('title', 'update post category')

@section('pagename', 'Update-Post Category')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Post Category
            <a href="{{ route('post-categories.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Post Categories <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="row mg-b-20">
            <div class="col-md-6">

                <div class="card card-body bg-gray-200">
                    {{ Form::open(['route' => ['post-categories.update', $postCategory->id], 'method' => 'PUT']) }}
                        <div class="form-group">
                            {{ Form::label('name_en', 'Post Category Name',['class' => 'form-control-label']) }}
                            {{ Form::text('name_en', $postCategory->name_en, ['class' => 'form-control mb-2']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('name_bn', 'Post Category Name',['class' => 'form-control-label']) }}
                            {{ Form::text('name_bn', $postCategory->name_bn, ['class' => 'form-control mb-2']) }}
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    {{ Form::close() }}
                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->

    </div><!-- card -->
@endsection

