  <!-- Navigation Bar-->

  <header id="topnav">
      <div class="topbar-main">
          <div class="container-fluid">

              <!-- Logo container-->
              <!-- <div class="logo" >
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="30">
                        </a>

                    </div> -->
              <!-- End Logo container-->

              <div class="menu-extras topbar-custom">


                  @if(session('lang')=='en')
                  <ul class="list-inline float-right mb-0">
                      @else
                      <ul class="list-inline float-left mb-0">
                          @endif


                          <!-- language-->
                          <li class="list-inline-item dropdown notification-list">

                              <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                  @if(session('lang')=='en')
                                  English <img src="{{ URL::asset('assets/images/flags/us_flag.jpg') }}" class="ml-2" height="16" alt="" />
                                  @else
                                  العربيه <img src="{{ URL::asset('assets/images/flags/ksa.jpg') }}" class="ml-2" height="16" alt="" />
                                  @endif

                              </a>
                              <div class="dropdown-menu dropdown-menu-right language-switch">
                                  <a class="dropdown-item" href="{{url('lang/en')}}"><img src="{{ URL::asset('assets/images/flags/us_flag.jpg') }}" class="ml-2" height="16" alt="" /><span> English </span></a>
                                  <a class="dropdown-item" href="{{url('lang/ar')}}"><img src="{{ URL::asset('assets/images/flags/ksa.jpg') }}" alt="" height="16" /><span> العربية </span></a>
                              </div>
                          </li>


                          <!-- notification-->

                          <!-- User-->
                          <li class="list-inline-item dropdown notification-list">
                              <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                  {{Auth::user()->name}}

                                  ({{Auth::user()->job}})
                                  <!-- <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle"> -->
                              </a>
                              <div class="dropdown-menu dropdown-menu-left profile-dropdown ">
                                  <!-- <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> {{trans('admin.Profile')}}</a> -->
                                  <!-- <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted"></i> {{trans('admin.Logout')}}</a> -->

                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="dripicons-exit text-muted"></i>{{trans('admin.Logout')}}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>


                              </div>
                          </li>
                          <li class="menu-item list-inline-item">
                              <!-- Mobile menu toggle-->
                              <a class="navbar-toggle nav-link">
                                  <div class="lines">
                                      <span></span>
                                      <span></span>
                                      <span></span>
                                  </div>
                              </a>
                              <!-- End mobile menu toggle-->
                          </li>

                      </ul>
              </div>
              <!-- end menu-extras -->

              <div class="clearfix"></div>

          </div> <!-- end container -->
      </div>
      <!-- end topbar-main -->

      <!-- MENU Start -->
      <div class="navbar-custom">
          <div class="container-fluid">
              @if(session('lang')=='en')

              <div id="navigation" style="text-align:left">
                  @else
                  <div id="navigation" style="text-align:right">
                      @endif
                      <!-- Navigation Menu-->
                      <ul class="navigation-menu ">


                          <li class="has-submenu ">

                          <li class="has-submenu">
                              <a href="{{url('home')}}"><i class="mdi mdi-view-dashboard"></i> {{trans('admin.dashboard')}}</a>

                          </li>
                          @php
                          $user_id=auth()->user()->id;
                          $permission =App\Permission::where('user_id',$user_id)->first();
                          @endphp



                          @if($permission->addclient =="yes" ||
                          $permission->addinreciept =="yes" ||
                          $permission->addoutreciept =="yes" ||
                          $permission->recieptsarchieve =="yes" ||
                          $permission->clientsArchieve =="yes" ||
                          $permission->operationsonclients =="yes" ||
                          $permission->operationsonclientsarchieve =="yes" ||
                          $permission->clientaccountstatement =="yes")

                          <li class="has-submenu">
                              <a href="#"><i class="fa fa-users"></i> {{trans('admin.ClientsList')}}</a>
                              <ul class="submenu" style="text-align:right">
                                  @if($permission->addclient == 'yes')

                                  <li class="">
                                      <a href="{{url('client/create')}}"> {{trans('admin.addClient')}}</a>

                                  </li>
                                  @endif
                                  @if($permission->addinreciept == 'yes')
                                  <li class="">
                                      <a href="{{url('recipts/create')}}"> {{trans('admin.addinreciept')}}</a>

                                  </li>
                                  @endif
                                  @if($permission->addoutreciept == 'yes')
                                  <li class="">
                                      <a href="{{url('recipt/createout')}}"> {{trans('admin.addoutreciept')}}</a>

                                  </li>
                                  @endif
                                  @if($permission->recieptsarchieve == 'yes')
                                  <li class="">
                                      <a href="{{url('recipts')}}"> {{trans('admin.recieptsArchieve')}}</a>

                                  </li>
                                  @endif
                                  @if($permission->clientsArchieve == 'yes')

                                  <!-- <li class="">
                                      <a href="#"> {{trans('admin.clientsArchieve')}}</a>

                                  </li> -->
                                  @endif
                                  @if($permission->operationsonclients == 'yes')

                                  <!-- <li class="">
                                      <a href="#"> {{trans('admin.operationsOnClients')}}</a>

                                  </li> -->
                                  @endif
                                  @if($permission->operationsonclientsarchieve == 'yes')

                                  <li class="">
                                      <a href="{{url('client')}}"> {{trans('admin.operationsOnClientsArchieve')}}</a>

                                  </li>
                                  @endif
                                  @if($permission->clientaccountstatement == 'yes')

                                  <li class="">
                                      <a href="{{url('account')}}"> {{trans('admin.ClientAccountStatement')}}</a>

                                  </li>
                                  @endif


                              </ul>
                          </li>

                          @endif
                          @if($permission->websitepanel == 'yes')

                          <li class="has-submenu">
                              <a href="#"><i class="fa fa-chrome"></i> {{trans('admin.websiteControll')}}</a>
                              <ul class="submenu" style="text-align:right">
                                  <li class="">
                                      <a href="{{url('maindata')}}"> {{trans('admin.maindata')}}</a>

                                  </li>

                                  <li class="">
                                      <a href="{{url('latestnews')}}">{{trans('admin.latestnews')}}</a>

                                  </li>

                                  <li class="">
                                      <a href="{{url('slider')}}">{{trans('admin.slider')}}</a>

                                  </li>

                                  <li class="">
                                      <a href="{{url('mainservices')}}"> {{trans('admin.mainservices')}}</a>
                                  </li>

                                  <li class="">
                                      <a href="{{url('category')}}"> {{trans('admin.categories')}}</a>

                                  </li>
                                  <li class="">
                                      <a href="{{url('works')}}"> {{trans('admin.featuredworks')}}</a>

                                  </li>
                                  <li class="">
                                      <a href="{{url('services')}}"> {{trans('admin.Services')}}</a>

                                  </li>
                                  <li class="">
                                      <a href="{{url('about')}}"> {{trans('admin.whoweare')}}</a>

                                  </li>
                                  <li class="">
                                      <a href="{{url('managerword')}}"> {{trans('admin.managerhint')}}</a>

                                  </li>
                                  <li class="">
                                      <a href="{{url('parteners')}}"> {{trans('admin.parteners')}}</a>

                                  </li>
                                  <li class="">
                                      <a href="{{url('map')}}"> {{trans('admin.map')}}</a>

                                  </li>

                              </ul>
                          </li>
                          @endif

                          @if($permission->controllpanel == 'yes')
                          <li class="has-submenu">
                              <a href="#"><i class=" mdi mdi-settings"></i> {{trans('admin.Controlpanel')}}</a>
                              <ul class="submenu" style="text-align:right">
                                  <li class="">
                                      <a href="{{url('users')}}"> {{trans('admin.employeesandperSettings')}}</a>

                                  </li>


                                  <li class="">
                                      <a href="{{url('projecttypes')}}"> {{trans('admin.projectTypeSettings')}}</a>

                                  </li>

                                  <li class="">
                                      <a href="{{url('userstatistics')}}"> {{trans('admin.userstatistics')}}</a>

                                  </li>

                                  <li class="">
                                      <a href="{{url('branch')}}"> {{trans('admin.branchs')}}</a>

                                  </li>
                                  @if($permission->inbox == 'yes')

                                  <li class="">
                                      <a href="{{url('inbox')}}">  {{trans('admin.inbox')}}</a>

                                  </li>
                                  @endif
                                  <li>
                                  <a href="{{url('thirdparty')}}"> {{trans('admin.thirdparty')}}</a>
                                  </li>
                                  <li>
                                      <a href="{{url('transactionstypes')}}"> {{trans('admin.transactionstype')}}</a>
                                  </li>
                                  <li class="">
                                      <a href="{{url('sendall')}}"> {{trans('admin.sendall')}}</a>

                                  </li>
                              </ul>
                          </li>
                          @endif

                          <li class="has-submenu">
                              <a href="{{url('transactions')}}"><i class="fa fa-file"></i> {{trans('admin.transactions')}}</a>
                              <ul class="submenu" style="text-align:right">

                                  <li>
                                      <a href="{{url('importcreate')}}">{{trans('admin.createimporttransaction')}} </a>
                                  </li>
                                  <li>
                                      <a href="{{url('transactions/create')}}  ">{{trans('admin.createexporttransaction')}} </a>
                                  </li>

                              </ul>
                          </li>



                      </ul>
                      <!-- End navigation menu -->
                  </div> <!-- end #navigation -->
              </div> <!-- end container -->
          </div> <!-- end navbar-custom -->
  </header>
  <!-- End Navigation Bar-->
