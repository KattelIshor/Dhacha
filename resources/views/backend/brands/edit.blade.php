@extends('backend.layouts.layout')

@section('title', 'update brand')

@section('pagename', 'Update-Brand')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Brand
            <a href="{{ route('brands.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Brand <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="row mg-b-20">
            <div class="col-md-6">

                <div class="card card-body bg-gray-200">
                    {{ Form::open(['route' => ['brands.update', $brand->id], 'method' => 'PUT', 'files' => true]) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Brand Name',['class' => 'form-control-label']) }}
                            {{ Form::text('name', $brand->name, ['class' => 'form-control mb-2']) }}
                        </div>

                        <div class="form-group">
                            <label class="custom-file" for="logo">
                                <input type="file" name="logo" id="logo" class="form-control custom-file-input" onchange="readURL(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img src="{{ asset($brand->logo) }}" alt="Brand logo" id="one" width="120px" height="80px">
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    {{ Form::close() }}
                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->

    </div><!-- card -->

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
@endsection

