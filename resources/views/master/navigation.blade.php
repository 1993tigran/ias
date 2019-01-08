<!-- #NAVIGATION -->
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel" style="top: 20px">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<span>
							{{Auth::user()->name}}
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            {{--Dashboard--}}
            <li class="{{ \Route::currentRouteNamed('backend_get_dashboard') ? 'active' : '' }}">
                <a href="{{url('home')}}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            {{--Teachers--}}
            <li class="{{ (\Route::currentRouteNamed('backend_get_register_teacher') || \Route::currentRouteNamed('backend_get_teachers_dashboard') ) ? 'active' : '' }}">
                <a href="#" title="Teachers"><i class="fa fa-lg fa-fw fa-graduation-cap"></i> <span class="menu-item-parent">Docenten</span></a>
                <ul>
                    <li>
                        <a href="{{\URL::route('backend_get_register_teacher')}}">Docent toevoegen</a>
                    </li>
                    <li>
                        <a href="{{\URL::route('backend_get_teachers_dashboard')}}">Alle docenten</a>
                    </li>
                </ul>
            </li>
            {{--Students--}}
            <li class="{{ \Route::currentRouteNamed('backend_get_students_dashboard') ? 'active' : '' }}">
                <a href="{{\URL::route('backend_get_students_dashboard')}}" title="Students"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">Scholieren</span></a>
            </li>
            {{--News--}}
            <li class="{{ (\Route::currentRouteNamed('backend_get_class_create') || \Route::currentRouteNamed('backend_get_classes_dashboard') ) ? 'active' : '' }}">
                <a href="#" title="News"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Klassen</span></a>
                <ul>
                    <li>
                        <a href="{{\URL::route('backend_get_class_create')}}">Klas toevoegen</a>
                    </li>
                    <li>
                        <a href="{{\URL::route('backend_get_classes_dashboard')}}">Alle klassen</a>
                    </li>
                </ul>
            </li>
            {{--News--}}
            <li class="{{ (\Route::currentRouteNamed('backend_get_news_create') || \Route::currentRouteNamed('backend_get_news_dashboard') ) ? 'active' : '' }}">
                <a href="#" title="News"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Nieuws</span></a>
                <ul>
                    <li>
                        <a href="{{\URL::route('backend_get_news_create')}}">Nieuws toevoegen</a>
                    </li>
                    <li>
                        <a href="{{\URL::route('backend_get_news_dashboard')}}">Alle nieuwsberichten</a>
                    </li>
                </ul>
            </li>
            {{--Issues--}}
            <li class="{{ (\Route::currentRouteNamed('backend_get_issues_dashboard') || \Route::currentRouteNamed('backend_get_issue_questions') || \Route::currentRouteNamed('backend_get_chat_history_dashboard')) ? 'active' : '' }}">
                <a href="#" title="Issues"><i class="fa fa-lg fa-fw fa-exclamation-triangle"></i> <span class="menu-item-parent">Problemen</span></a>
                <ul>
                    <li>
                        <a href="{{\URL::route('backend_get_issues_dashboard')}}">Gemelde problemen</a>
                    </li>
                </ul>
            </li>
            {{--Tips--}}
            <li class="{{ (\Route::currentRouteNamed('backend_get_create_tips') || \Route::currentRouteNamed('backend_get_tips_dashboard') ) ? 'active' : '' }}">
                <a href="#" title="Tips"><i class="fa fa-lg fa-fw fa-info-circle"></i> <span class="menu-item-parent">Tips</span></a>
                <ul>
                    <li>
                        <a href="{{\URL::route('backend_get_create_tips')}}">Tip toevoegen</a>
                    </li>
                    <li>
                        <a href="{{\URL::route('backend_get_tips_dashboard')}}">Tip lijst</a>
                    </li>
                </ul>
            </li>
            {{--Settings--}}
            <li class="{{ \Route::currentRouteNamed('backend_get_settings')  ? 'active' : '' }}">
                <a href="{{\URL::route('backend_get_settings')}}" title="Settings"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">Instellingen</span></a>
            </li>
        </ul>
    </nav>
</aside>
<!-- END NAVIGATION -->