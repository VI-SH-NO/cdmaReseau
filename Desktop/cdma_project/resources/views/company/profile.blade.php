@extends('layouts.app')
@section('title', "company")
@section('content')
<div class="wrapper bg-white">




    <section class="cover-sec">
        <img src="{{asset("images/resources/company-cover.jpg")}}" alt="">
    </section>
    <!--cover-sec end-->


    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img src={{"https://randomuser.me/api/portraits/men/".$user->id.".jpg"}} alt="">
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-hr">
                                            @if(!$user->isMe())
                                            <li>
                                                <Follow :user="{{$user}}" :auth="{{auth()->user()}}"
                                                    :is_following="{{auth()->user()->follows($user->id)?'true':'false'}}">
                                                </Follow>
                                            </li>
                                            @endif
                                        </ul>
                                        <ul class="flw-status">
                                            <li>
                                                <span>Following</span>
                                                <b>{{$user->followings->count()}}</b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b>{{$user->followers->count()}}</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--user_pro_status end-->
                                    <ul class="social_links">
                                        <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                        <li><a href="#" title=""><i class="fa fa-facebook-square"></i>
                                                Http://www.facebook.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-twitter"></i>
                                                Http://www.Twitter.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-google-plus-square"></i>
                                                Http://www.googleplus.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-behance-square"></i>
                                                Http://www.behance.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-pinterest"></i>
                                                Http://www.pinterest.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-instagram"></i>
                                                Http://www.instagram.com/john...</a></li>
                                        <li><a href="#" title=""><i class="fa fa-youtube"></i>
                                                Http://www.youtube.com/john...</a></li>
                                    </ul>
                                </div>
                                <!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Suggestions</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <!--sd-title end-->
                                    <div class="suggestions-list">
                                        <div class="suggestion-usd">
                                            <img src="images/resources/s1.png" alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="images/resources/s2.png" alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="images/resources/s3.png" alt="">
                                            <div class="sgt-text">
                                                <h4>Poonam</h4>
                                                <span>Wordpress Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="images/resources/s4.png" alt="">
                                            <div class="sgt-text">
                                                <h4>Bill Gates</h4>
                                                <span>C & C++ Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="images/resources/s5.png" alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="images/resources/s6.png" alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="view-more">
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div>
                                    <!--suggestions-list end-->
                                </div>
                                <!--suggestions end-->
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3>{{$user->company->sigle}}</h3>
                                    <div class="star-descp">
                                        <span>Started Since {{$user->created_at->format('Y')}}</span>
                                        <ul>
                                            <li><i class="fa fa-star text-warning"></i></li>
                                            <li><i class="fa fa-star text-warning"></i></li>
                                            <li><i class="fa fa-star text-warning"></i></li>
                                            <li><i class="fa fa-star text-warning"></i></li>
                                            <li><i class="fa fa-star text-warning"></i></li>


                                        </ul>

                                    </div>
                                    <!--star-descp end-->
                                    <div class="tab-feed">
                                        <ul>
                                            <li data-tab="feed-dd" class="active">
                                                <a href="#" title="">

                                                    <span> <i class="fas fa-home"></i> Home</span>
                                                </a>
                                            </li>
                                            <li data-tab="info-dd">
                                                <a href="#" title="">

                                                    <span><i class="fas fa-info"></i> Info</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd">
                                                <a href="#" title="">

                                                    <span><i class="far fa-folder-open"></i> Client</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div>
                                <!--user-tab-sec end-->
                                <div class="product-feed-tab current" id="feed-dd">
                                    <div class="posts-section">



                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="{{asset('images/resources/company-pic.png')}}" alt="">
                                                    <div class="usy-name">
                                                        <h3>{{$user->company->sigle}}</h3>
                                                        <span><img src="{{asset('images/clock.png')}}" alt="">3 min
                                                            ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i
                                                            class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="#" title="">Edit Post</a></li>
                                                        <li><a href="#" title="">Unsaved</a></li>
                                                        <li><a href="#" title="">Unbid</a></li>
                                                        <li><a href="#" title="">Close</a></li>
                                                        <li><a href="#" title="">Hide</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">


                                            </div>
                                            <div class="job_descp mt-3">
                                                <h3>{{$user->company->type}}</h3>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                                    luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                                    magna sit amet Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit. Ipsa laudantium odio repudiandae veniam.

                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com mt-4 w-100">

                                                    <li><a href="#" class="com"><i class="fas fa-heart"></i> Likes
                                                            54</a></li>
                                                    <li><a href="#" class="com"><i class="fas fa-comment-alt"></i>
                                                            Comments 15</a></li>
                                                    <li class="float-right"><a href="#" class="com "><i
                                                                class="fas fa-eye"></i>Views 50</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="{{asset('images/resources/company-pic.png')}}" alt="">
                                                    <div class="usy-name">
                                                        <h3>{{$user->company->sigle}}</h3>
                                                        <span><img src="{{asset('images/clock.png')}}" alt="">3 min
                                                            ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i
                                                            class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="#" title="">Edit Post</a></li>
                                                        <li><a href="#" title="">Unsaved</a></li>
                                                        <li><a href="#" title="">Unbid</a></li>
                                                        <li><a href="#" title="">Close</a></li>
                                                        <li><a href="#" title="">Hide</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">


                                            </div>
                                            <div class="job_descp mt-3">
                                                <h3>{{$user->company->type}}</h3>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                                    luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                                    magna sit amet Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit. Ipsa laudantium odio repudiandae veniam.

                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com mt-4 w-100">

                                                    <li><a href="#" class="com"><i class="fas fa-heart"></i> Likes
                                                            54</a></li>
                                                    <li><a href="#" class="com"><i class="fas fa-comment-alt"></i>
                                                            Comments 15</a></li>
                                                    <li class="float-right"><a href="#" class="com "><i
                                                                class="fas fa-eye"></i>Views 50</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="{{asset('images/resources/company-pic.png')}}" alt="">
                                                    <div class="usy-name">
                                                        <h3>{{$user->company->sigle}}</h3>
                                                        <span><img src="{{asset('images/clock.png')}}" alt="">3 min
                                                            ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i
                                                            class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
                                                        <li><a href="#" title="">Edit Post</a></li>
                                                        <li><a href="#" title="">Unsaved</a></li>
                                                        <li><a href="#" title="">Unbid</a></li>
                                                        <li><a href="#" title="">Close</a></li>
                                                        <li><a href="#" title="">Hide</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">


                                            </div>
                                            <div class="job_descp mt-3">
                                                <h3>{{$user->company->type}}</h3>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                                    luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                                    magna sit amet Lorem ipsum dolor sit amet, consectetur adipisicing
                                                    elit. Ipsa laudantium odio repudiandae veniam.

                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com mt-4 w-100">

                                                    <li><a href="#" class="com"><i class="fas fa-heart"></i> Likes
                                                            54</a></li>
                                                    <li><a href="#" class="com"><i class="fas fa-comment-alt"></i>
                                                            Comments 15</a></li>
                                                    <li class="float-right"><a href="#" class="com "><i
                                                                class="fas fa-eye"></i>Views 50</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <!--post-bar end-->
                                        <div class="process-comm">
                                            <div class="spinner">
                                                <div class="bounce1"></div>
                                                <div class="bounce2"></div>
                                                <div class="bounce3"></div>
                                            </div>
                                        </div>
                                        <!--process-comm end-->
                                    </div>
                                    <!--posts-section end-->
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title=""
                                                class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor
                                            aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec
                                            urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo
                                            viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac
                                            magna convallis bibendum. Quisque laoreet augue eget augue fermentum
                                            scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor
                                            neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
                                    </div>
                                    <!--user-profile-ov end-->
                                    <div class="user-profile-ov st2">
                                        <h3><a href="#" title="" class="esp-bx-open">Establish Since </a><a href="#"
                                                title="" class="esp-bx-open"><i class="fa fa-pencil"></i></a> <a
                                                href="#" title="" class="esp-bx-open"><i
                                                    class="fa fa-plus-square"></i></a></h3>
                                        <span>February 2004</span>
                                    </div>
                                    <!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="emp-open">Total Employees</a> <a href="#"
                                                title="" class="emp-open"><i class="fa fa-pencil"></i></a> <a href="#"
                                                title="" class="emp-open"><i class="fa fa-plus-square"></i></a></h3>
                                        <span>17,048</span>
                                    </div>
                                    <!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title=""
                                                class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#"
                                                title="" class="lct-box-open"><i class="fa fa-plus-square"></i></a></h3>
                                        <h4>USA</h4>
                                        <p> Menlo Park, California, United States</p>
                                    </div>
                                    <!--user-profile-ov end-->
                                </div>
                                <!--product-feed-tab end-->
                                <div class="product-feed-tab" id="portfolio-dd">
                                    <div class="portfolio-gallery-sec">
                                        <h3>Client</h3>
                                        <div class="gallery_pf">
                                            <div class="row">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum
                                                    iure laudantium nobis quia quis quos, voluptatum! Accusantium ad
                                                    animi architecto doloremque ducimus eveniet hic libero magnam nam
                                                    nemo, neque nihil quasi reiciendis suscipit vel!</p>

                                            </div>
                                        </div>
                                        <!--gallery_pf end-->
                                    </div>
                                    <!--portfolio-gallery-sec end-->
                                </div>
                                <!--product-feed-tab end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="message-btn">
                                    <a href="#" title=""><i class="fa fa-envelope"></i> Message</a>
                                </div>
                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>Website <i class="fas fa-globe"></i></h3>


                                    </div>
                                    <div class="pf-gallery">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius! Lorem ipsum
                                            dolor sit amet, consectetur adipisicing elit. Eligendi maiores perferendis
                                            quam?</p>

                                        <a href="#" class="btn btn-success mt-2">Visit</a>

                                    </div>
                                    <!--pf-gallery end-->
                                </div>
                                <!--widget-portfolio end-->
                            </div>
                            <!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>




    <div class="overview-box" id="overview-box">
        <div class="overview-edit">
            <h3>Overview</h3>
            <span>5000 character left</span>
            <form>
                <textarea></textarea>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->


    <div class="overview-box" id="experience-box">
        <div class="overview-edit">
            <h3>Experience</h3>
            <form>
                <input type="text" name="subject" placeholder="Subject">
                <textarea></textarea>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="save-add">Save & Add More</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="education-box">
        <div class="overview-edit">
            <h3>Education</h3>
            <form>
                <input type="text" name="school" placeholder="School / University">
                <div class="datepicky">
                    <div class="row">
                        <div class="col-lg-6 no-left-pd">
                            <div class="datefm">
                                <input type="text" name="from" placeholder="From" class="datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-6 no-righ-pd">
                            <div class="datefm">
                                <input type="text" name="to" placeholder="To" class="datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" name="degree" placeholder="Degree">
                <textarea placeholder="Description"></textarea>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="save-add">Save & Add More</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="location-box">
        <div class="overview-edit">
            <h3>Location</h3>
            <form>
                <div class="datefm">
                    <select>
                        <option>Country</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="england">England</option>
                        <option value="india">India</option>
                        <option value="usa">United Sates</option>
                    </select>
                    <i class="fa fa-globe"></i>
                </div>
                <div class="datefm">
                    <select>
                        <option>City</option>
                        <option value="london">London</option>
                        <option value="new-york">New York</option>
                        <option value="sydney">Sydney</option>
                        <option value="chicago">Chicago</option>
                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="skills-box">
        <div class="overview-edit">
            <h3>Skills</h3>
            <ul>
                <li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i
                            class="la la-close"></i></a></li>
                <li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i
                            class="la la-close"></i></a></li>
                <li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i
                            class="la la-close"></i></a></li>
            </ul>
            <form>
                <input type="text" name="skills" placeholder="Skills">
                <button type="submit" class="save">Save</button>
                <button type="submit" class="save-add">Save & Add More</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="create-portfolio">
        <div class="overview-edit">
            <h3>Create Portfolio</h3>
            <form>
                <input type="text" name="pf-name" placeholder="Portfolio Name">
                <div class="file-submit nomg">
                    <input type="file" name="file">
                </div>
                <div class="pf-img">
                    <img src="images/resources/np.png" alt="">
                </div>
                <input type="text" name="website-url" placeholder="htp://www.example.com">
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->

    <div class="overview-box" id="establish-box">
        <div class="overview-edit">
            <h3>Establish Since</h3>
            <form>
                <div class="daty">
                    <input type="text" name="establish" placeholder="Select Date" class="datepicker">
                    <i class="fa fa-calendar"></i>
                </div>
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->


    <div class="overview-box" id="total-employes">
        <div class="overview-edit">
            <h3>Total Employees</h3>
            <form>
                <input type="text" name="employes" placeholder="Type in numbers">
                <button type="submit" class="save">Save</button>
                <button type="submit" class="cancel">Cancel</button>
            </form>
            <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
        </div>
        <!--overview-edit end-->
    </div>
    <!--overview-box end-->



</div>
<!--theme-layout end-->
@endsection