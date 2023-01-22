@extends('backend.layouts.layout')

@section('title', 'create product')

@section('pagename', 'Create-Product')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Create Product
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right" >
                 All Product <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>
        <div class="card-body bg-gray-200">
            {{ Form::open(['route' => ['products.store'], 'files' => true]) }}
                <div class="row mg-b-25">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('product_title', 'Product Title',['class' => 'form-control-label']) }}
                            {{ Form::text('product_title', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Title']) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('product_code', 'Product Code',['class' => 'form-control-label']) }}
                            {{ Form::number('product_code', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Code']) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('product_quantity', 'Product Quantity',['class' => 'form-control-label']) }}
                            {{ Form::number('product_quantity', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Quantity']) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('discount_price', 'Discount Price',['class' => 'form-control-label']) }}
                            {{ Form::number('discount_price', null, ['class' => 'form-control mb-2', 'placeholder' => 'Discount Price']) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('category_id', 'Categories',['class' => 'form-control-label']) }}
                            <select id="category_id" name="category_id" class="form-control select2" data-placeholder="Choose Category">
                                <option label="Choose category"></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('subcategory_id', 'Sub Categories',['class' => 'form-control-label']) }}
                            <select id="subcategory_id" name="subcategory_id" class="form-control select2" data-placeholder="Choose sub category">

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('brand_id', 'Brands',['class' => 'form-control-label']) }}
                            <select id="brand_id" name="brand_id" class="form-control select2" data-placeholder="Choose Brand">
                                <option label="Choose Brand"></option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('product_size', 'Product Size',['class' => 'form-control-label']) }}
                            {{ Form::text('product_size', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Size', 'data-role' => 'tagsinput']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('product_color', 'Product Color',['class' => 'form-control-label']) }}
                            {{ Form::text('product_color', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Color', 'data-role' => 'tagsinput']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('selling_price', 'Selling Price',['class' => 'form-control-label']) }}
                            {{ Form::number('selling_price', null, ['class' => 'form-control mb-2', 'placeholder' => 'Selling Price',]) }}
                        </div>
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('summernote', 'Product Details',['class' => 'form-control-label']) }}
                        <textarea name="product_details" id="summernote" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            {{ Form::label('video_link', 'Video Link',['class' => 'form-control-label']) }}
                            {{ Form::text('video_link', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter Product Video Link',]) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('image_one', 'Image (One): ',['class' => 'form-control-label']) }}
                            <label class="custom-file" for="image_one">
                                <input type="file" name="image_one" id="image_one" class="custom-file-input" onchange="readURLOne(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img id="one">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('image_two', 'Image (Two): ',['class' => 'form-control-label']) }}
                            <label class="custom-file" for="image_two">
                                <input type="file" name="image_two" id="image_two" class="custom-file-input" onchange="readURLTwo(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img id="two">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('image_three', 'Image (Three): ',['class' => 'form-control-label']) }}
                            <label class="custom-file" for="image_three">
                                <input type="file" name="image_three" id="image_three" class="custom-file-input" onchange="readURLThree(this)">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            <br><br>
                            <img id="three">
                        </div>
                    </div>
                </div>
                <hr>
                <br><br>

                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="new_arrival">
                            <span>New Arrival</span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deal">
                            <span>Hot Deal</span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="best_seller">
                            <span>Best Seller</span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="special_offer">
                            <span>Special Offer</span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="trand">
                            <span>Trand</span>
                        </label>
                    </div>

                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Store</button>
                </div>
            {{ Form::close() }}
        </div><!-- card -->

    </div><!-- card -->

    <script src="{{ asset('backend/js/tagsinput.min.js') }}"></script>

    <!-- Ajax code for Subcategory -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('admin/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {

                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');

                            });
                        },
                    });

                } else {
                    alert('danger');
                }

            });
        });

    </script>

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

        function readURLTwo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLThree(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

