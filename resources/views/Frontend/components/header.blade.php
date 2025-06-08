<header class="header_wrap">
    <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header_topbar_info">
                        <div class="header_offer">
                            <span>Free Shipping Western Province</span>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list">
                            <li><a href="{{route('frontend.compare.index')}}"><i
                                        class="ti-control-shuffle"></i><span>Compare</span></a></li>
                            <li><a href="{{route('frontend.show_wishlist')}}"><i
                                        class="ti-heart"></i><span>Wishlist</span></a></li>

                            @guest
                            <li><a href="{{route('login')}}"><i class="ti-user"></i><span>Login</span></a></li>
                            @endguest
                            @guest
                            <li><a href="{{route('register')}}"><i class="ti-user"></i><span>Register</span></a></li>
                            @endguest


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img class="logo_light" src="{{asset('Frontend/shopwise/assets/images/logo_light.png')}}"
                        alt="logo">
                    <img class="logo_dark" src="{{asset('Frontend/shopwise/assets/images/logo_dark.png')}}" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">

                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." name="search" required=""
                                type="search">

                            {{--   <input class="form-control" type="text" name="search" required /> --}}
                            <button class="search_btn3" type="submit">Search</button>

                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">


                    @auth
                    <li><a href="{{route('frontend.user.index')}}" class="nav-link"><i class="linearicons-user"></i></a>
                        @endauth
                    </li>
                    <li><a href="{{route('frontend.show_wishlist')}}" class="nav-link"><i
                                class="linearicons-heart"></i><span class="wishlist_count"></span></a></li>

                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger"
                            href="{{route('frontend.cart')}}" data-toggle="dropdown"><i
                                class="linearicons-bag2"></i><span class="cart_count">
                                @if (Session::has('cart'))
                                {{ count(session('cart')) }}
                                @endif


                            </span>
                            @if (Session::has('cart'))
                            <?php $total = 0 ?>

                            @foreach(session('cart') as $id => $product)


                            <?php $total += $product['price'] * $product['quantity'] ?>
                            @endforeach
                            <span class="amount"><span class="currency_symbol">Rs.{{$total}}
                                </span></span>
                            @endif

                        </a>

                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                @if (Session::has('cart'))
                                <?php $total = 0 ?>
                                <?php $itemscount = 0 ?>
                                @foreach(session('cart') as $id => $product)
                                <?php $itemscount =+ $product['quantity']?>
                                <?php $total += $product['price'] * $product['quantity'] ?>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{url('upload/product/',$product['photo'])}}"
                                            alt="cart_thumb1">{{$product['name']}}</a>
                                    <span class="cart_quantity"> {{$itemscount}} x <span class="cart_amount"> <span
                                                class="price_symbole">$</span></span>{{$product['price']}}</span>
                                </li>

                                @endforeach

                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span
                                            class="price_symbole">Rs.</span></span>{{$total}}</p>
                                <p class="cart_buttons"><a href="{{route('frontend.cart')}}"
                                        class="btn btn-fill-line view-cart">View
                                        Cart</a><a href="{{route('frontend.checkout')}}"
                                        class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                            @endif
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">


                        <button type="button" class="categories_btn categories_menu">
                            <span> <i class="lnr lnr-location"></i> <a style="color: white;"
                                    href="{{route('frontend.tracking.index')}}">Oder
                                    Tracking</a> </span><i class=""></i>
                        </button>

                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i
                                    class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            @php
                            {{$productcategories = App\Models\ProductCategory::where('parent_id',0)->get(); }}
                            //dd($productcategories);
                            @endphp

                            @foreach ($productcategories as $category)
                            <ul class="navbar-nav">
                                <li class="dropdown">
                                    <a class="nav-link active"
                                        href="{{route('frontend.category.show',$category->slug)}}">
                                        {{$category->name}}
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            @foreach ($category->subcategory as $sub)
                                            <li><a class=" nav-link nav_item"
                                                    href="{{route('frontend.category.show',$sub->slug)}}">{{$sub->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>0382241673</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>