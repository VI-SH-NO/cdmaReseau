@extends('layouts.app')
@section('title', "company")
@section('content')
<div class="wrapper bg-white">





    <section class="cover-sec">
        <img src="{{ $user->getCover() }}" alt="" id="coverPicture" data-toggle="modal" data-target="#imagePicker">
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
                                        <img src="{{$user->getAvatar()}}" id="profilePicture" data-toggle="modal"
                                            data-target="#imagePicker">
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
                                        <li><a href="#" title=""><i class="la la-globe"></i> www.cdma.ma</a></li>
                                    </ul>
                                </div>
                                <!--user_profile end-->

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

                                        <pfeed :user="{{$user}}"></pfeed>
                                        <!--post-bar end-->



                                        <!--post-bar end-->

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
                                        <client></client>
                                    </div>
                                    <!--portfolio-gallery-sec end-->
                                </div>
                                <!--product-feed-tab end-->
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                @if(!$user->isMe())
                                <Message></Message>
                                @endif
                                <div class="widget widget-portfolio mt-3">
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
@if($user->isMe())
<!-- Modal upload profile pictures -->
<div class="modal fade" id="imagePicker" tabindex="-1" role="dialog" aria-labelledby="imagePickerCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pick image</h5>
            </div>
            <div class="modal-body">
                <div id="imgToCropContainer" style="width: 800px;height: 250px;">
                    <img id="croppedImg" src="">
                </div>
                <input type="file" id="pickImg" class="form-control" />
            </div>
            <div class="modal-footer">
                <button type="button" class="float-right" id="uploadProfile">Upload</button>
                <button type="button" class="float-right" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@if($user->isMe())
@section('css')
<link rel="stylesheet" type="text/css" href={{asset("css/cropperjs.css")}}>
@endsection
@section('js')
<script>
    $(()=>{

            // Global vars
            var cropper;
            var type;
            var ratio;

            // Register clicks
            $('#uploadProfile').click(upload);
            $('#coverPicture').click(()=>{
                type = 'cover';
                ratio = 4.2;
                setUpReaderCropper();
            });
            $('#profilePicture').click(()=>{
                type = 'avatar';
                ratio = 1.1;
                setUpReaderCropper();
            });

            // Set up image input file
            $('#pickImg').on('change', function(e){
                setUpReaderCropper();
            });

            function setUpReaderCropper() {
                const reader = new FileReader();
                reader.onload = function(){
                    const img = new Image();
                    img.src = reader.result;
                    img.id = 'croppedImg';                  // Remember we're give it the same ID, so we can reference it later
                    img.width = 1270;
                    img.height = 720;
                    img.display = 'block';
                    img.maxWidth = 100;
                    $('#imgToCropContainer').empty();       // Clear the container
                    $('#imgToCropContainer').append(img);   // Then append it

                    // init Cropper
                    image = document.querySelector('#croppedImg');
                    if(cropper)
                        cropper.reset();

                    cropper = new Cropper(image, {
                        aspectRatio: ratio,
                        scalable: false,
                        background: false,
                        cropBoxResizable: false,
                        movable: false,
                        dragMode: 'move',
                        crop(event) {},
                    });
                };

                reader.readAsDataURL($('#pickImg').prop('files')[0]);
            }

            // Handle upload click
            function upload() {
                const width = type == 'avatar' ? 160 : 1200;
                const height = type == 'avatar' ? 160 : 170;
                const base64 = cropper.getCroppedCanvas({imageSmoothingQuality:'medium', width: width, height: height})
                                      .toDataURL('image/jpeg');
                const block = base64.split(';');
                const contentType = block[0].split(':')[1];
                const realData = block[1].split(',')[1];
                const img = BlobUtil.base64StringToBlob(realData, contentType);
                const config = {
                    header : {
                        'Content-Type' : 'multipart/form-data'
                    }
                };
                const data = new FormData();
                data.append('img', img);
                data.append('type', type);
                console.log('type is: '+type);

                axios.post('{{ route('uploadprofile') }}', data, config)
                     .then(res=>{window.location.reload()})
                     .catch(err=>console.error(err));
            }

        });
</script>
@endsection
@endif