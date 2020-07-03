@section('sidebar')
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="/">Gister</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <form method="GET" action="{{ route('main') }}" class="header-search">
                    <input type="text" name="q" placeholder="Поиск">
                    <button type="submit" class="header-search__btn">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="20"
                             height="20"
                             fill="none"
                             stroke="currentColor"
                             stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2"
                             role="img"
                             viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                    </button>
                </form>
                @guest
                    @if (Route::has('register'))
                        <a class="btn btn-sm btn-outline-secondary header-btn__register" href="{{ route('register') }}">Регистрация</a>
                    @endif
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Войти</a>
                @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                @endguest
            </div>
        </div>
    </header>
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach($menuitems as $item)
                <a class="p-2 text-muted" href="/tag/{{$item->slug}}">{{$item->title}}</a>
            @endforeach
        </nav>
    </div>
@show
