<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" style="width: 50%">

            <div class="mt-3">
                <h4>{{ Auth::user()->name }}</h4>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{ route('profile', Auth::user()->slug) }}" class="d-block text-dark">My Profile</a>
        </li>

        <li class="list-group-item">
            <a href="{{ route('password.change') }}" class="d-block text-dark">Change Password</a>
        </li>

        <li class="list-group-item">
            <a href="{{ route('profile.order', Auth::user()->slug) }}" class="d-block text-dark">Your Order Lists</a>
        </li>

        <li class="list-group-item">
            <a href="{{ route('return.product', Auth::user()->slug) }}" class="d-block text-dark">Return Products</a>
        </li>
    </ul>
</div>
