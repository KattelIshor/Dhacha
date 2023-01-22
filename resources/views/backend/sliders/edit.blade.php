@extends('backend.layouts.layout')

@section('title', 'edit slider')

@section('pagename', 'Edit-Slider')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Slider
            <a href="{{ route('sliders.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Sliders <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>
        <div class="card-body bg-gray-200">
            {{ Form::open(['route' => ['sliders.update', $slider->id], 'method' => 'PUT', 'files' => true]) }}
                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', 'Slider Title ',['class' => 'form-control-label']) }}
                            {{ Form::text('title', $slider->title, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('summernote', 'Slider Description',['class' => 'form-control-label']) }}
                        <textarea name="description" id="summernote" class="form-control">
                            {{ $slider->description }}
                        </textarea>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            {{ Form::label('image', 'Slide Image: ',['class' => 'form-control-label']) }}
                            <label class="custom-file" for="image">
                                <input type="file" name="image" id="image" class="custom-file-input" onchange="readURLOne(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img src="{{ asset($slider->image) }}" id="one" width="120px" height="80">
                        </div>
                    </div>

                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                </div>
            {{ Form::close() }}
        </div><!-- card -->

    </div><!-- card -->

    {{--Ajax Image loader --}}
    <script>
        function readURLOne(input) {
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
@endsection
