<div class="header__sidebar">
    <div class="header__sidebar__top">
        {{--Navbar Brand --}}
        <a class="navbar-brand" href="#"><span style="color: #43424c">Dhacha</span></a>
        <button class="close-btn"><i class="fa fa-times"></i></button>
    </div>

    @php
        $categories = App\Models\Category::with('child_category')->where('category_id', NULL)->get();
    @endphp

    <ul class="header__sidebar__menu">
        @foreach ($categories as $category)
            @if ($category->child_category->count() > 0)
                <li class="header__sidebar__menu__item dropdown">
                    <a href="#" class="header__sidebar__menu__item__link dropdown-toggle d-flex justify-content-between align-items-center" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>{{ $category->name }}</span>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($category->child_category as $subcategory)
                        <a class="dropdown-item" href="{{ route('products.subcategories', $subcategory->slug) }}">
                            {{ $subcategory->name }}
                        </a>
                        @endforeach
                    </div>
                </li>
            @else
                <li class="header__sidebar__menu__item">
                    <a href="{{ route('products.categories', $category->slug) }}" class="header__sidebar__menu__item__link">
                        {{ $category->name }}
                    </a>
                </li>
            @endif

        @endforeach
    </ul>
    <!--<div class="header__sidebar__media">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
    </div> -->
</div>
