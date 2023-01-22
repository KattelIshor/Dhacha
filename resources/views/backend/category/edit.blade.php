@extends('backend.layouts.layout')

@section('title', 'update category')

@section('pagename', 'Update-Cateory')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Category
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Categories <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="row mg-b-20">
            <div class="col-md-6">

                <div class="card card-body bg-gray-200">
                    {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'PUT', 'files' => true]) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Category Name',['class' => 'form-control-label']) }}
                            {{ Form::text('name', $category->name, ['class' => 'form-control mb-2']) }}
                        </div>

                        @if ($category->category_id != NUll)
                            <div class="form-group">
                                {{ Form::label('category_id', 'Sub Category name', ['class' => 'form-control-label']) }}
                                <select name="category_id" id="category_id" class="form-control select2">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == $category->category_id)
                                                {{ 'selected' }}
                                            @endif
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    {{ Form::close() }}
                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->

    </div><!-- card -->
@endsection

