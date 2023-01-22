@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

<div class="container mt-5 mb-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                @include('frontend.partials.profile-sidebar')
            </div>
            <div class="col-md-8">
                <div class="card mb-3 customCard">
                    <div class="card-header customCard__header">
                        Order Progress
                    </div>
                    <div class="card-body">
                        <div class="progress mb-4">
                            @if ($track->status_op == 0)
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>

                            @elseif($track->status_op == 1)
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">50%</div>

                            @elseif($track->status_op == 2)
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>

                             @elseif($track->status_op == 3)
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>

                            @else
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                            @endif
                        </div>

                        @if ($track->status_op == 0)
                            <h6>Order are under review</h6>

                        @elseif($track->status_op == 1)
                            <h6>Order are under Process</h6>

                        @elseif($track->status_op == 2)
                            <h6>Order are on the way</h6>

                        @elseif($track->status_op ==3)
                            <h6>Order Complete</h6>

                        @else
                            <h6>Order Cancel</h6>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
