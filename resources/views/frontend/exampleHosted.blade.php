@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    <section class="checkout spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Checkout
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                @csrf
                                <input type="hidden" name="paymentMethod" value="{{ $data->paymentMethod }}">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $data->phone }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{ $data->address }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="city">City</label>
                                        <select name="city" class="custom-select d-block w-100" id="state" style="text-transform: capitalize;" required>
                                            <option value="Kathmandu">{{ $data->city }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="post_code">Post Code</label>
                                        <input type="text" name="post_code" class="form-control" id="post_code" value="{{ $data->post_code }}" required>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

@endsection
