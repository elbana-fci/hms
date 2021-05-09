<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fab fa-angular"></i>
            {{ __('nav.app-name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav nav-dir">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.index') }}"><i class="fas fa-users"></i>{{ __('nav.employees') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penalties.index') }}"><i class="fas fa-times-circle"></i>{{ __('nav.penalties') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('getAllRecords') }}"><i class="fas fa-clipboard"></i>{{ __('nav.penaltyRecords') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('decisions.index') }}"><i class="fas fa-gavel"></i>{{ __('nav.decisions') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('decisions.index') }}"></a>
                </li>
            </ul>

            <div class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="بحث" aria-label="Search" v-model="search" @keyup.enter="searchit">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" @click="searchit">{{ __('nav.search-btn') }}</button>
            </div>

            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav item-dir">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item"><a class="nav-link"><i class="far fa-bell"></i></a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('nav.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>