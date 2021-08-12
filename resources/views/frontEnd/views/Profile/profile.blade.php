@extends('frontEnd.layout.default')
@section('content')

    <!-- Page Content -->
    <div class="page-content">
        <!-- Banner Section -->
        <div id="page-banner-section" class="page-banner-section container-fluid p_z">
            <img src="{{ asset('frontEnd') }}/banner/propertyDetailBanner.jpg" alt="banner">
            <!-- Banner Inner -->
            <div class="page-title">
                <div class="container ">
                    <div class="banner-inner">
                        <h2>AGENT PROFILE</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Agent Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- Banner Inner /- -->
        </div><!-- Banner Section /- -->

        <!--edit-profile-section-->
        <div class="property-profile">
            <!-- container -->
            <div class="container">
                <div class="property-profile-block">
                    <div class="profile-photo">
                        <div class="col-md-2 p_l_z">
                            <img src="{{ agentProfileImage($user->profile, "large") }}" alt="profile1" />
                        </div>
                        <div class="col-md-10">
                            @auth()
                                @if(auth()->id() == $user->id)
                                    @php $dis = "" @endphp
                                    <form id="uploadform" method="post" action="{{ route('profileImage') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="myProfile" id="actual-btn" onchange="yourFunction()" style="display: none"/>
                                        <label class="label-profile" for="actual-btn">Choose File</label>
                                    </form>
                                @else
                                    @php $dis = "disabled" @endphp
                                @endif
                            @else
                                @php $dis = "disabled" @endphp
                            @endauth
                            <h4>{{ $user->name }}</h4>
                            <p>{{ $user->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    <script>
                        function yourFunction(){
                        document.getElementById("uploadform").submit();// Form submission
                        }
                    </script>
                    <div class="property-profile-form">
                        <form method="post" action="{{ route('profileUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 p_r_z">
                                <div class="col-md-1 p_z"></div>
                                <div class="col-md-4 p_z">
                                    <input type="text" name="name" placeholder="Display Name*(John Deo)" value="{{ $user->name }}" {{ $dis }}>
                                </div>
                                <div class="col-md-2 p_z"></div>
                                <div class="col-md-4 p_z">
                                    <input type="text" name="email" placeholder="Email*" value="{{ $user->email }}" readonly {{ $dis }}>
                                </div>
                                <div class="col-md-1 p_z"></div>
                            </div>
                            @auth()
                                @if(auth()->id() == $user->id)
                                    <div class="col-md-12 p_r_z">
                                        <div class="col-md-1 p_z"></div>
                                        <div class="col-md-4 p_z">
                                            <input type="text" name="password" placeholder="Password ( Fill it only if you want to change your password )">
                                        </div>
                                        <div class="col-md-2 p_z"></div>
                                        <div class="col-md-4 p_z">
                                            <input type="text" placeholder="Confirm Password">
                                        </div>
                                        <div class="col-md-1 p_z"></div>
                                    </div>
                                @endif
                            @endauth
                            <div class="col-md-12 p_r_z">
                                <div class="col-md-1 p_z"></div>
                                <div class="col-md-4 p_l_z">
                                    <input type="text" name="mobile" placeholder="Mobile Number" value="{{ $user->mobile }}" {{ $dis }}>
                                </div>
                                <div class="col-md-2 p_z"></div>
                                <div class="col-md-6 p_r_z">
                                    <input type="text" placeholder="Office Number" name="officeNo" value="{{ $user->telephone }}" {{ $dis }}>
                                </div>
                                <div class="col-md-1 p_z"></div>
                            </div>
                            <div class="col-md-12 p_r_z">
                                <div class="col-md-1 p_z"></div>
                                <div class="col-md-10 p_z">
                                    <textarea rows="4" name="bio" placeholder="Biographical Information" {{ $dis }}>{{ $user->bio }}</textarea>
                                </div>
                                <div class="col-md-1 p_z"></div>
                            </div>
                            @auth()
                                @if(auth()->id() == $user->id)
                                    <div class="col-md-12 p_r_z">
                                        <div class="col-md-5 p_z"></div>
                                        <div class="col-md-2 p_l_z">
                                            <input type="submit" value="Save Change" >
                                        </div>
                                        <div class="col-md-5 p_z"></div>
                                    </div>
                                @endif
                            @endauth
                        </form>
                    </div>
                </div>
            </div>
        </div><!--edit-profile-section/- -->
    </div><!-- Page Content -->


@stop
