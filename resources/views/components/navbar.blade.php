
				<!-- Navigation -->
				<nav id="nav">
                <form id='logOut-form'action="{{url('logout')}}" method="post" style="display:none">
                @csrf
                 </form>
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="{{url('home')}}">@lang('web.home')</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('web.categories') <span class="caret"></span></a>
                            <ul class="dropdown-menu">
							  @foreach($cats as $cat)	
                              <li><a href="{{url("categories/show/{$cat->id}")}}">{{$cat->name()}}</a></li>
                             @endforeach
                            </ul>
                        </li>
                        <li><a href="{{url('contact')}}">@lang('web.contact')</a></li>
                        @guest
                        <li><a href="{{url('login')}}">@lang('web.signIn')</a></li>
                        <li><a href="{{url('/register')}}">@lang('web.signUp')</a></li>
                          @endguest
                        @auth
                         @if(Auth::user()->role->name == 'student')
                        <li><a  href="{{URL('Profile')}}">@lang('web.Profile')</a></li>
                        @endif
                        <li><a id='logOut-link' href="#">@lang('web.SignOut')</a></li>
                          @endauth
						<li class="dropdown">
                            @if(App::getLocale()== 'en')
                            <a href="#" class="dropdown-toggle2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> English<span class="caret"></span></a>
                            @else
                            <a href="#" class="dropdown-toggle2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> عربي<span class="caret"></span></a>
                            @endif
                            <ul class="dropdown-menu">
                              <li><a href="{{url('lang/en')}}">English</a></li>
                              <li><a href="{{url('lang/ar')}}">عربي</a></li>
                              
                            </ul>
                        </li>
						
					</ul>
				</nav>
				<!-- /Navigation -->