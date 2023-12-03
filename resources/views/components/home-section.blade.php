<nav style="justify-content:space-between;" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand font-weight-bold" href="#">PJ</a>
  <ul class="navbar-nav" style="display:content;">
  <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>
  <li class="nav-item dropdown">

  @if (Route::has('login'))
                
                @auth
         <!-- Authentication Links -->
                         @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
        
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest

                        @else
                        <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                           <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                
            @endif

      </div>
    </li>
    
  </ul>
  
</nav>


<div class="row h-50 bg-secondary">
  <div class="col"></div>
  <div class="col" style="align-self:center;"><h1 style="text-align-last:center;">Find<span style="color:aqua;">Job</span></h1><h3 style="text-align:center; border-style:inset; border-radius:30px; cursor:pointer;">
  Sign up</h3></div>
  <div class="col"></div>

</div>

<div class="row h-100">
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
</div>