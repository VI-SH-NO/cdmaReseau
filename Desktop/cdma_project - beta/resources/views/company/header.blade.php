<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="index.html" title=""><img src="{{asset('images/logo.png')}}" alt=""></a>
            </div>
            <!--logo end-->
            <div class="search-bar">
                <Search></Search>
            </div>
            <!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('home') }}" title="">
                            <span><i class="fas fa-home"></i></span>
                            Home
                        </a>
                    </li>




                    <li>
                        <mNotification :auth="{{auth()->user()}}"></mNotification>
                    </li>
                    <li>
                        <Notification :auth="{{auth()->user()}}"></Notification>
                    </li>
                </ul>
            </nav>
            <!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account">
                <div class="user-info w-75">
                    <img src="{{auth()->user()->getAvatar()}}" alt="" style="height:30px ; width:30px">
                    <a href="#" title=""></a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss" id="users">
                    <h3><a href="{{route('profile' , ['user'=>Auth::user()->id])}}" class="text-dark"><i
                                class="fas fa-building"></i> {{ auth()->user()->company->sigle }}</a></h3>


                    <h3>Setting</h3>
                    <ul class="us-links">
                        <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                        <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Logout</button>
                    </form>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>