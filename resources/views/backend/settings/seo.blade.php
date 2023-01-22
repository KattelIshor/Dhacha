@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'seo')

@section('pagename', 'seo setting')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">SEO Setting</h6>
        <div class="card-body bg-gray-200">
            {{ Form::open(['route' => ['seos.update', $seo->id], 'method' => 'PUT', 'files' => true]) }}
                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', 'Meta Title ',['class' => 'form-control-label']) }}
                            {{ Form::text('meta_title', $seo->meta_title, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', 'Meta Author',['class' => 'form-control-label']) }}
                            {{ Form::text('meta_author', $seo->meta_author, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', 'Meta Tag',['class' => 'form-control-label']) }}
                            {{ Form::text('meta_tag', $seo->meta_tag, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('summernote', 'Meta Description',['class' => 'form-control-label']) }}
                        <textarea name="meta_description" id="summernote" class="form-control">
                            {{ $seo->meta_description }}
                        </textarea>
                    </div>

                    <div class="col-md-12 mt-4">
                        {{ Form::label('summernote-two', 'Meta Analytics',['class' => 'form-control-label']) }}
                        <textarea name="meta_analytics" id="summernote-two" class="form-control">
                            {{ $seo->meta_analytics }}
                        </textarea>
                    </div>

                    <div class="col-md-12 mt-4">
                        {{ Form::label('summernote-three', 'Bing Analytics',['class' => 'form-control-label']) }}
                        <textarea name="bing_analytics" id="summernote-three" class="form-control">
                            {{ $seo->bing_analytics }}
                        </textarea>
                    </div>

                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                </div>
            {{ Form::close() }}
        </div><!-- card -->

    </div><!-- card -->

@endsection
