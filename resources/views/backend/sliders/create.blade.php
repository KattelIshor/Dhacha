@extends('backend.layouts.layout')

@section('title', 'create slider')

@section('pagename', 'Create-Slider')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Create Slider
            <a href="{{ route('sliders.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Sliders <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>
        <div class="card-body bg-gray-200">
            {{ Form::open(['route' => ['sliders.store'], 'files' => true]) }}
                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', 'Slider Title ',['class' => 'form-control-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Slider Title']) }}
                        </div>
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('summernote', 'Slider Description',['class' => 'form-control-label']) }}
                        <textarea name="description" id="summernote" class="form-control"></textarea>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            {{ Form::label('image', 'Slide Image: ',['class' => 'form-control-label']) }}
                            <label class="custom-file" for="image">
                                <input type="file" name="image" id="image" class="custom-file-input" onchange="readURLOne(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img id="one">
                        </div>
                    </div>

                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Store</button>
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

