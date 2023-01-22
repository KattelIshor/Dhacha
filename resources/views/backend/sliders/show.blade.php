@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'product')

@section('pagename', $post->title_en)

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning mg-b-10 float-right mx-3">
                 Edit <i class="fa fa-pencil-square-o mg-r-10"></i>
            </a>

            <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right">
                 All Posts <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <img class="card-img-top img-thumbnail" src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" style="object-fit: cover; height: 420px;">
        <div class="card-body">
            <p class="card-text">
                Writen By {{ $post->admin->name }} |
                <a href="#">{{ $post->postcategory->name_en }}</a> |
                @if ($post->status == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
            </p>

        </div>

        <div class="card-body">
            <h5 class="card-title">{{ $post->title_en }}</h5>
            <p class="card-text">{!! $post->description_en !!}</p>
            <p class="card-text">
                <small class="text-muted">{{ $post->created_at->format('F d, Y h:s A') }}</small>
            </p>
        </div>
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

