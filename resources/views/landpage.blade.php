<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    @if(session('lang')=='en')
    <title>{{$maindata->name_en}}</title>
    @else
    <title>{{$maindata->name_ar}}</title>
    @endif
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="construction" />
    <meta name="author" content="uramit" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('uploads/'. $maindata->logo)}}" />
    <!-- Font -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,500,700,400italic,700italic' />
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

    <!-- Font Awesome Icons -->
    <link href="{{ url('front/css/font-awesome.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Bootstrap core CSS -->
    <link href="{{ url('front/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ url('front/css/hover-dropdown-menu.css')}}" rel="stylesheet" />
    <!-- Icomoon Icons -->
    <link href="{{ url('front/css/icons.css')}}" rel="stylesheet" />
    <!-- Revolution Slider -->
    <link href="{{ url('front/css/revolution-slider.css')}}" rel="stylesheet" />
    <link href="{{ url('front/rs-plugin/css/settings.css')}}" rel="stylesheet" />
    <!-- Animations -->
    <link href="{{ url('front/css/animate.min.css')}}" rel="stylesheet" />
    <!-- Owl Carousel Slider -->
    <link href="{{ url('front/css/owl/owl.carousel.css')}}" rel="stylesheet" />
    <link href="{{ url('front/css/owl/owl.theme.css')}}" rel="stylesheet" />
    <link href="{{ url('front/css/owl/owl.transitions.css')}}" rel="stylesheet" />
    <!-- PrettyPhoto Popup -->
    <link href="{{ url('front/css/prettyPhoto.css')}}" rel="stylesheet" />
    <!-- Custom Style -->
    <link href="{{ url('front/css/style.css')}}" rel="stylesheet" />
    <!-- <link href="{{ url('front/css/rtlstyle.css')}}" rel="stylesheet" /> -->
    <link href="{{ url('front/css/responsive.css')}}" rel="stylesheet" />
    <!-- Color Scheme -->
    <link href="{{ url('front/css/color.css')}}" rel="stylesheet" />
</head>

<body style="font-family: 'Cairo';font-size: 18px;">
    <div id="page" class="one-page">
        <!-- Page Loader -->
        <div id="pageloader">
            <div class="loader-item fa fa-spin text-color"></div>
        </div>
        <!-- Top Bar -->
        <div id="top-bar" class="top-bar-section top-bar-bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Top Contact -->
                        <div class="top-contact link-hover-black">
                            <a href="#">
                                <i class="fa fa-phone"></i>{{$maindata->whatsapp}}</a>
                            <a href="#">
                                <i class="fa fa-envelope"></i>{{$maindata->email}}</a></div>
                        <!-- Top Social Icon -->
                        <div class="top-social-icon icons-hover-black">
                            <a href="{{$maindata->facebook}}">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="{{$maindata->twitter}}">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="{{$maindata->instagram}}">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <!--<a href="{{$maindata->whatsapp}}">-->
                            <a href="https://wa.me/{{$maindata->whatsapp}}" target="_blank">

                                <i class="fa fa-whatsapp"></i>
                            </a>
                            @if(session('lang')=='en')

                            <a href="{{url('lang/ar')}}">
                                <i class="fa fa-globe"></i>
                            </a>
                            @else
                            <a href="{{url('lang/en')}}">
                                <i class="fa fa-globe"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar -->
        <!-- Sticky Navbar -->
        <header id="sticker" class="sticky-navigation dark-header">
            <!-- Sticky Menu -->
            <div class="sticky-menu relative">
                <!-- navbar -->
                <div class="navbar navbar-default navbar-bg-light" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="navbar-header">
                                    <!-- Button For Responsive toggle -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span></button>
                                    <!-- Logo -->
                                    <!-- //ظبطلى الارتفاع بتاع الصورة يبقى اصغر شويه لانه بيزيد مع  على حسب الصورة المرفوعه لو طويله بيطولها
                                وهتلاقينى فاتحلك الصفحه اللى برفع منها الصور عشان تجرب صور طويله وهتلاقى صورة كبيرة على الديسكتوب -->
 
                                        <a class="navbar-brand" href="#">
                                            <img class="site_logo" style="height: 60px;width:130px" alt="Site Logo" src="{{url('uploads/'. $maindata->logo)}}" />

                                        </a></div>
                                 <!-- Navbar Collapse -->
                                <div id="topnav" class="navbar-collapse collapse">
                                    <!-- nav -->
                                    <ul class="nav navbar-nav">
                                        <!-- Home  Mega Menu -->
                                        <li>
                                            <a href="#top-bar" class="scroll">{{trans('admin.home')}}</a>

                                        </li>
                                        <!-- Mega Menu Ends -->
                                        <li>
                                            <a href="#services" class="scroll">{{trans('admin.Services')}}</a>
                                        </li>
                                        <li>
                                            <a href="#about-us" class="scroll">{{trans('admin.About')}}</a>
                                        </li>

                                        <li>
                                            <a href="#works" class="scroll">{{trans('admin.featuredwork')}}</a>
                                        </li>
                                        <li>
                                            <a href="#latest-news" class="scroll">{{trans('admin.ourlatestnews')}}</a>
                                        </li>
                                        <li>
                                            <a href="#contact-us" class="scroll">{{trans('admin.Contactus')}}</a>
                                        </li>
                                        <!-- Header Search -->

                                    </ul>
                                    <!-- Right nav -->
                                    <!-- Header Search Content -->

                                    <!-- Header Search Content -->
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- navbar -->
            </div>
            <!-- Sticky Menu -->
        </header>
        <!-- Sticky Navbar -->
        <section id="home" class="slider border-bottom">
            <div class="tp-banner">
                <ul>
                    @foreach($sliders as $slider)
                    <li data-delay="5000" data-transition="fade" data-slotamount="7" data-masterspeed="2000">
                        <div class="elements">

                            @if(session('lang')=='en')

                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="02" data-y="181" data-speed="1000" data-start="1700" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong>{{$slider->title_en}}</strong>
                            </h2>
                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="02" data-y="241" data-speed="1200" data-start="1900" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong>{{$slider->sub_title_en}}</strong>
                            </h2>

                            @else
                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="02" data-y="181" data-speed="1000" data-start="1700" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong>{{$slider->title_ar}}</strong>
                            </h2>
                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="02" data-y="241" data-speed="1200" data-start="1900" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong>{{$slider->sub_title_ar}}</strong>
                            </h2>

                            @endif

                        </div>
                        <img src="{{url('uploads/slider/'.$slider->image) }}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />
                    </li>
                    @endforeach
                    <!-- <li data-delay="5000" data-transition="fade" data-slotamount="7" data-masterspeed="2000">
                        <div class="elements">
                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="02" data-y="181" data-speed="1000" data-start="1700" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong>We are </strong>
                            </h2>
                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="02" data-y="241" data-speed="1200" data-start="1900" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong>Construction </strong>
                            </h2>
                        </div>
                        <img src="{{url('front/img/sections/slider/slide1.jpg')}}" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />
                    </li> -->
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </section>
        <!-- slider -->
        <section id="features" class="page-section bottom-pad-20 transparent slider-block" data-animation="fadeInUp">
            <div class="container">
                <div class="row special-feature">

                    @foreach($mainservices as $mainservice)

                    <div class="col-md-3">
                        <div class="s-feature-box text-center">
                            <div class="mask-top">
                                <!-- Icon -->
                                <i class="{{$mainservice->icon}}"></i>
                                @if(session('lang')=='en')

                                <!-- Title -->
                                <h4>{{$mainservice->name_en}}</h4>
                            </div>
                            <div class="mask-bottom">
                                <!-- Icon -->
                                <i class="{{$mainservice->icon}}"></i>
                                <!-- Title -->
                                <h4>{{$mainservice->name_en}}</h4>
                                <!-- Text -->
                                <p>{{$mainservice->desc_en}}</p>
                                @else
                                <!-- Title -->
                                <h4>{{$mainservice->name_ar}}</h4>
                            </div>
                            <div class="mask-bottom">
                                <!-- Icon -->
                                <i class="{{$mainservice->icon}}"></i>
                                <!-- Title -->
                                <h4>{{$mainservice->name_ar}}</h4>
                                <!-- Text -->
                                <p>{{$mainservice->desc_ar}}</p>

                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Special Feature Box 2 -->

                    <!-- Special Feature Box 3 -->

                    <!-- Special Feature Box 4 -->

                </div>
            </div>
        </section>
        <!-- about-us -->


        <section id="services" class="page-section transparent">
            <div class="container">
                <div class="row white">
                    <div class="owl-carousel navigation-1 opacity text-left" data-pagination="false" data-items="3" data-autoplay="true" data-navigation="true">
                        @foreach($services as $service)
                        <div class="col-sm-6 col-md-4 col-xs-12">
                            <p class="text-center">
                                <img src="{{url('uploads/services/'.$service->image)}}" style="height: 280px;width:420px"  alt="" />
                            </p>
                            @if(session('lang')=='en')

                            <h3>
                                <a href="#">{{$service->title_en}}</a>
                            </h3>
                            <p>{{$service->desc_en}}</p>
                            @else

                            <h3 style="text-align: right;">
                                <a href="#">{{$service->title_ar}}</a>
                            </h3>
                            <p style="text-align: right;">{{$service->desc_ar}}</p>

                            @endif

                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- Services -->
        <section id="about-us" class="page-section light-bg border-tb">
            <div class="container who-we-are">
                @if(session('lang')=='en')
                <div class="section-title text-center">
                    <!-- Title -->
                    <h2 class="title">{{trans('admin.whoweare')}}</h2>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <p class="description upper">{{$about->title_en}}</p>
                        <p>{{$about->desc_en}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="arrow-style">
                                    @foreach($point_one as $point)
                                    <li>{{$point->point_en}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="arrow-style">
                                    @foreach($point_two as $point)
                                    <li>{{$point->point_en}}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <h3>
                            <a href="{{url('uploads/burchase/'.$about->image)}} " target="_blank" class="hover">Download Our Brochure -
                                <i class="icon-file-pdf red"></i></a>
                        </h3>
                    </div>
                    <div class="col-md-4">
                        <div class="item-box bottom-pad-10">

                            @foreach($whyus as $why)
                            <a>
                                <i class="{{$why->icon}}"></i>
                                <h4>{{$why->question_en}}</h4>
                                <p>{{$why->answer_en}}</p>
                            </a></br>


                            @endforeach

                        </div>
                    </div>
                </div>
                @else
                <!-- who we are arabic -->
                <div class="section-title text-right">
                    <!-- Title -->
                    <h2 class="title">{{trans('admin.whoweare')}}</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="item-box bottom-pad-10" dir='rtl'>

                            @foreach($whyus as $why)
                            <a>
                                <i class="{{$why->icon}}"></i>
                                <h4>{{$why->question_ar}}</h4>
                                <p>{{$why->answer_ar}}</p>
                            </a></br>


                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-8 text-right">
                        <p class="description upper">{{$about->title_ar}}</p>
                        <p>{{$about->desc_ar}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="arrow-style">
                                    @foreach($point_one as $point)
                                    <li>{{$point->point_ar}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="arrow-style">
                                    @foreach($point_two as $point)
                                    <li>{{$point->point_ar}}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <h3>
                            <a href="{{url('uploads/burchase/'.$about->image)}} " target="_blank" class="hover">{{trans('admin.downloadbrochure')}}
                                <i class="icon-file-pdf red"></i></a>
                        </h3>
                    </div>

                </div>
                @endif
            </div>
        </section>
        <!-- who-we-are -->
        <section id="works" class="page-section transparent">
            <div class="container-fluid white general-section">
                <div class="section-title white">
                    <!-- Heading -->
                    <h2 class="title">{{trans('admin.featuredworks')}}</h2>
                </div>
                <div id="options" class="filter-menu">
                    <div>
                        <ul class="option-set nav nav-pills">
                            <li class="filter active" data-filter="all">{{trans('admin.showall')}}</li>

                            @foreach($categories as $category)
                            @if(session('lang')=='en')
                            <li class="filter" data-filter=".{{$category->id}}">{{$category->name_en}}</li>
                            @else
                            <li class="filter" data-filter=".{{$category->id}}">{{$category->name_ar}}</li>

                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- filter -->
                <div id="mix-container" class="portfolio-grid">
                    <!-- Item 1 -->
                    @foreach($works as $work)
                    <div class="grids col-xs-12 col-sm-4 col-md-3 mix all {{$work->cat_id}}">
                        <div class="grid">
                            @php
                            $product_image = App\ProductDetail::where('product_id',$work->id)->first();
                            @endphp
                            @if($product_image !=null)
                            <img src="{{url('uploads/products/'.$product_image->image)}}" style="height: 273px;width:400px"   alt="Recent Work" class="img-responsive" />
                            @endif
                            <div class="figcaption">
                                <!-- Image Popup-->
                                @php
                                $product_images = App\ProductDetail::where('product_id',$work->id)->get();
                                @endphp
                                @foreach($product_images as $key =>$image)

                                @php
                                $vid_extns = array('webm', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'ogg', 'mp4', 'm4p', 'm4v', 'avi', 'wmv', 'mov', 'qt', 'flv', 'swf', 'avchd');

                                $img = pathinfo($image->image, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array($img, $vid_extns))
                                <a href="{{url('uploads/products/'.$image->image)}}" target="_blank">
                                    <i class="fa fa-video-camera"></i>
                                </a>
                                @else

                                <a href="{{url('uploads/products/'.$image->image)}}" data-rel="prettyPhoto[portfolio1]">

                                    @if($key==0)
                                    <i class="fa fa-search"></i>
                                    @endif
                                </a>
                                @endif
                                @endforeach
                            </div>
                            @if(session('lang')=='en')
                            <div class="caption-block">
                                <h4>{{$work->title_en}}</h4>
                                <p>{{$work->desc_en}}</p>
                            </div>
                            @else
                            <div class="caption-block text-right">
                                <h4>{{$work->title_ar}}</h4>
                                <p>{{$work->desc_ar}}</p>
                            </div>
                            @endif

                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Mix Container -->
            </div>
        </section>
        <!-- works -->


        <section id="fun-factor" class="page-section transparent">
            <div class="container">
                <div class="row text-right fact-counter white">
                    <div class="col-sm-6 col-md-3 bottom-xs-pad-30 fun-icon">
                        <!-- Icon -->
                        <div class="count-number text-color" data-count="{{$maindata->finishedproject}}">
                            <span class="counter"></span>
                        </div>
                        <!-- Title -->
                        <h3>{{trans('admin.projects')}}
                            <span>{{trans('admin.delivered')}}</span></h3>
                    </div>
                    <div class="col-sm-6 col-md-3 bottom-xs-pad-30">
                        <!-- Icon -->
                        <div class="count-number text-color" data-count="{{$maindata->inprogressproject}}">
                            <span class="counter"></span>
                        </div>
                        <!-- Title -->
                        <h3>{{trans('admin.projects')}}
                            <span>{{trans('admin.inprogress')}}</span></h3>
                    </div>
                    <div class="col-sm-6 col-md-3 bottom-xs-pad-30">
                        <!-- Icon -->
                        <div class="count-number text-color" data-count="{{$maindata->winningaward}}">
                            <span class="counter"></span>
                        </div>
                        <!-- Title -->
                        <h3>{{trans('admin.winning')}}
                            <span>{{trans('admin.award')}}</span></h3>
                    </div>
                    <div class="col-sm-6 col-md-3 bottom-xs-pad-30">
                        <!-- Icon -->
                        <div class="count-number text-color" data-count="{{$maindata->coveredcities}}">
                            <span class="counter"></span>
                        </div>
                        <!-- Title -->
                        <h3>{{trans('admin.cities')}}
                            <span>{{trans('admin.covered')}}</span></h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- fun-factor done -->
        <section id="latest-news" class="page-section">
            <div class="container">
                <div class="section-title">
                    <h2 class="title">{{trans('admin.ourlatestnews')}}</h2>
                </div>
                <div class="row">
                    <div class="owl-carousel navigation-1 opacity text-left" data-pagination="false" data-items="3" data-autoplay="true" data-navigation="true">

                        @foreach($latestnews as $latest)

                        <div class="col-sm-6 col-md-4 col-xs-12">
                            <p class="text-center">
                                <img id="newImg" src="{{url('uploads/latestnews/'.$latest->image)}}" style="height: 280px;width:420px"  alt="latest news" />
                            </p>
                            @if(session('lang')=='en')
                            <h3>
                                {{$latest->title_en}}
                            </h3>
                            <p>{{$latest->desc_en}}</p>
                            @else
                            <h3 style="text-align: right;">
                                {{$latest->title_ar}}
                            </h3>
                            <p style="text-align: right;">{{$latest->desc_ar}}</p>
                            @endif
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- news -->
        <section id="testimonials" class="page-section transparent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 white testimonials">
                        <div class="owl-carousel pagination-2 text-center color-switch" data-pagination="true" data-autoplay="true" data-navigation="false" data-singleitem="true">
                            <div class="item">
                                <div class="quote">
                                    @if(session('lang')=='en')
                                    <p>&quot; {{$managerword->desc_en}} &quot;</p>
                                    @else
                                    <p>&quot; {{$managerword->desc_ar}} &quot;</p>
                                    @endif
                                </div>
                                <div class="client-details text-center left-align">
                                    <div class="client-image">
                                        <!-- Image -->
                                        <img class="img-circle" src="{{url('uploads/manager/'.$managerword->image)}}" width="80" height="80" alt="" />
                                    </div>
                                    <div class="client-details">
                                        <!-- Name -->
                                        @if(session('lang')=='en')
                                        <strong class="text-color">{{$managerword->name_en}} </strong>
                                        <!-- Company -->
                                        <span class="white">{{$managerword->position_en}} </span>
                                        @else
                                        <strong class="text-color">{{$managerword->name_ar}} </strong>
                                        <!-- Company -->
                                        <span class="white">{{$managerword->position_ar}} </span>

                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- كلمه المدير  done -->
        <section id="clients" class="page-section tb-pad-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="owl-carousel" data-pagination="false" data-items="6" data-autoplay="true" data-navigation="false">
                            @foreach($parteners as $partener)
                            <a>
                                <img src="{{url('uploads/parteners/'.$partener->image)}}" width="170" height="90" alt="" />
                                <!-- <img src="{{url('uploads/parteners/'.$partener->image)}}" width="170" height="90" alt="" /> -->
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
        </section>
        <!-- clients -->

        <section id="contact-us" class="page-section">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <p class="form-message"></p>
                        <div class="contact-form">
                            <!-- Form Begins -->
                            {{ Form::open( ['url' => ['inbox'],'method'=>'post'] ) }}
                            <!-- Field 1 -->
                            <div class="input-text  form-group">
                                <input type="text" name="fullname" class="input-name form-control  text-right " placeholder="{{trans('admin.fullname')}}" require />
                            </div>
                            <!-- Field 2 -->
                            <div class="input-email form-group">
                                <input type="email" name="email" class="input-email form-control text-right" placeholder="{{trans('admin.email')}}" require />
                            </div>
                            <!-- Field 3 -->
                            <div class="input-phone form-group">
                                <input type="number" name="phone" class="input-phone form-control text-right" placeholder="{{trans('admin.phone')}}" require />
                            </div>
                            <!-- Field 4 -->
                            <div class="textarea-message form-group">
                                <textarea name="message" class="textarea-message hight-82 form-control text-right" placeholder="{{trans('admin.message')}}" rows="2" require></textarea>
                            </div>
                            <!-- Button
                            <button class="btn btn-default btn-block" type="submit">Send Now
                                <i class="icon-paper-plane"></i></button> -->
                            {{ Form::submit( trans('admin.sendnow'),['class'=>'btn btn-info btn-block']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                    @if(session('lang')=='en')
                    <div class="col-md-6">
                        <div class="map-section">

                            <div class="map-canvas" data-zoom="13" data-lat="{{$map->lat}}" data-lng="{{$map->lng}}" data-type="roadmap" data-title="{{$maindata->name_en}}" data-content="{{$maindata->name_en}}&lt;br&gt; Contact: {{$maindata->contact_number}}&lt;br&gt; &lt;a href=&#39;mailto:{{$maindata->email}}&#39;&gt;{{$maindata->email}}&lt;/a&gt;" style="height: 350px;"></div>

                        </div>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="map-section">
                            <!-- here map lng lat -->
                            <div class="map-canvas" data-zoom="13" data-lat="{{$map->lat}}" data-lng="{{$map->lng}}" data-type="roadmap" data-title="{{$maindata->name_ar}}" data-content="{{$maindata->name_ar}}&lt;br&gt; Contact: {{$maindata->contact_number}}&lt;br&gt; &lt;a href=&#39;mailto:{{$maindata->email}}&#39;&gt;{{$maindata->email}}&lt;/a&gt;" style="height: 350px;"></div>
                        </div>
                    </div>
                    @endif

                    <!-- map -->
                </div>
            </div>
        </section>
        <!-- contact-section -->
        <div id="get-quote" class="bg-color black text-center">
            <div class="container">
                <div class="row get-a-quote">
                    <div class="col-md-12">{{trans('admin.GetAFreeQuoteNeedaHelp')}}
                        <a class="black" href="#">{{trans('admin.contactus')}}</a></div>
                </div>
                <div class="move-top bg-color page-scroll">
                    <a href="#page">
                        <i class="glyphicon glyphicon-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- request -->
        <footer id="footer">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-4 widget bottom-xs-pad-20">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title text-center">{{trans('admin.Address')}}</h3>
                            </div>
                            <!-- Address -->
                            <p class="text-center">
                                <strong>{{trans('admin.Office')}}</strong>
                                @if(session('lang')=='en')
                                <br />{{$maindata->address_en}}</p>
                            @else
                            <br />{{$maindata->address_ar}}</p>
                            @endif
                            <!-- Email -->
                            <!-- Phone -->
                            <p class="text-center">
                                <strong>{{trans('admin.CallUs')}}</strong> {{$maindata->contact_number}}
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-4 widget bottom-xs-pad-20">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title text-center">{{trans('admin.Services')}}</h3>
                            </div>
                            <nav>
                                <ul>
                                    <!-- List Items -->
                                    @foreach($mainservices as $mainservice)

                                    <li>
                                        @if(session('lang')=='en')
                                        <a href="#">
                                            <p class="text-center">{{$mainservice->name_en}}</p>
                                        </a>
                                        @else
                                        <a href="#">
                                            <p class="text-center">{{$mainservice->name_ar}}</p>
                                        </a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 widget">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title text-center">{{trans('admin.BusinessHours')}}</h3>
                            </div>
                            <nav>
                                <ul class="text-center">
                                    <!-- List Items -->
                                    <li>
                                        <a href="#">{{$maindata->dayopenfrom}} - {{$maindata->dayopento}} : {{$maindata->houropenfrom}} - {{$maindata->houropento}} </a>
                                    </li>
                                    <li>
                                        <a href="#">{{$maindata->daysclosed}}: {{trans('admin.Closed')}}</a>
                                    </li>
                                </ul>
                                <!-- Count -->


                                <div class="footer-count text-center">
                                    <p class="count-number" data-count="{{$maindata->finishedproject}}">
                                        <span class="counter"></span> : {{trans('admin.finishedprojects')}} </p>
                                </div>
                                <div class="footer-count text-center">
                                    <p class="count-number" data-count="{{$maindata->inprogressproject}}">
                                        <span class="counter"></span> : {{trans('admin.inprogressprojects')}} </p>
                                </div>


                            </nav>
                        </div>

                        <!-- .newsletter -->
                    </div>
                </div>
            </div>
            <!-- footer-top -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <!-- Copyrights -->
                        <div class="col-xs-12 col-sm-6 col-md-6">Copyright &copy; UramIt, 2020
                            <br />
                            <!-- Terms Link -->
                        </div>
                        <div class="col-xs-12 text-center visible-xs-block page-scroll gray-bg icons-circle i-3x">
                            <!-- Goto Top -->
                            <a href="#page">
                                <i class="glyphicon glyphicon-arrow-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom -->
        </footer>
        <!-- footer done-->
    </div>
    <!-- page -->
    <!-- Scripts -->
    <script type="text/javascript" src="{{ url('front/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('front/js/bootstrap.min.js')}}"></script>
    <!-- Menu jQuery plugin -->
    <script type="text/javascript" src="{{ url('front/js/hover-dropdown-menu.js')}}"></script>
    <!-- Menu jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{ url('front/js/jquery.hover-dropdown-menu-addon.js')}}"></script>
    <!-- Scroll Top Menu -->
    <script type="text/javascript" src="{{ url('front/js/jquery.easing.1.3.js')}}"></script>
    <!-- Sticky Menu -->
    <script type="text/javascript" src="{{ url('front/js/jquery.sticky.js')}}"></script>
    <!-- Bootstrap Validation -->
    <script type="text/javascript" src="{{ url('front/js/bootstrapValidator.min.js')}}"></script>
    <!-- Revolution Slider -->
    <script type="text/javascript" src="{{ url('front/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('front/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('front/js/revolution-custom.js')}}"></script>
    <!-- Portfolio Filter -->
    <script type="text/javascript" src="{{ url('front/js/jquery.mixitup.min.js')}}"></script>
    <!-- Animations -->
    <script type="text/javascript" src="{{ url('front/js/jquery.appear.js')}}"></script>
    <script type="text/javascript" src="{{ url('front/js/effect.js')}}"></script>
    <!-- Owl Carousel Slider -->
    <script type="text/javascript" src="{{ url('front/js/owl.carousel.min.js')}}"></script>
    <!-- Pretty Photo Popup -->
    <script type="text/javascript" src="{{ url('front/js/jquery.prettyPhoto.js')}}"></script>
    <!-- Parallax BG -->
    <script type="text/javascript" src="{{ url('front/js/jquery.parallax-1.1.3.js')}}"></script>
    <!-- Fun Factor / Counter -->
    <script type="text/javascript" src="{{ url('front/js/jquery.countTo.js')}}"></script>
    <!-- Twitter Feed -->
    <script type="text/javascript" src="{{ url('front/js/tweet/carousel.js')}}"></script>
    <script type="text/javascript" src="{{ url('front/js/tweet/scripts.js')}}"></script>
    <script type="text/javascript" src="{{ url('front/js/tweet/tweetie.min.js')}}"></script>
    <!-- Background Video -->
    <script type="text/javascript" src="{{ url('front/js/jquery.mb.YTPlayer.js')}}"></script>
    <!-- Custom Js Code -->
    <script type="text/javascript" src="{{ url('front/js/custom.js')}}"></script>
    <!-- Scripts -->
</body>

</html>