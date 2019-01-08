<!-- HEADER -->
<header id="header" style="
        background-color: #fc4543;
        background-image: none;
        height: 70px;
        ">
    <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo">
            <img src="{{URL::asset('ias-logo.png')}}" alt="" style="left: 20px; position: relative; width: 40px">
        </span>
        <!-- END LOGO PLACEHOLDER -->
    </div>

    <div style="font-family: GothamMedium; color: white; font-size: 20px; position: relative; padding-top: 22px; left: -80px; height: 100%;">
        I AM STRONG
    </div>


    <!-- pulled right: nav area -->
    @if(!Auth::guest())
        <div class="pull-right">

            <!-- collapse menu button -->
            <div id="hide-menu" class="btn-header pull-right" style="position:relative; margin-top: 10px;">
                <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
            </div>
            <!-- end collapse menu -->

            <!-- logout button -->
            <div id="fullscreen" class="btn-header transparent pull-right" style="position:relative; margin-top: 10px;">
                <span> <a href="{{ url('/auth/logout') }}" title="Sign Out" data-action="userLogout" data-logout-msg="Sluit voor de veiligheid na uitloggen uw browser af. "><i class="fa fa-sign-out"></i></a> </span>
            </div>
            <!-- end logout button -->

            <!-- fullscreen button -->
            <div id="fullscreen" class="btn-header transparent pull-right" style="position:relative; margin-top: 10px;">
                <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
            </div>
            <!-- end fullscreen button -->


        </div>
        @endif
                <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->