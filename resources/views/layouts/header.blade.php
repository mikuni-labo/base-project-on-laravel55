<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name') }}

                @if( App::isDownForMaintenance() )
                    <small>
                        （<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>メンテナンスモード）
                    </small>
                @endif
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if( Auth::check() )
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            メニュー&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('passport') }}"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>&nbsp;パスポート管理</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            @if($cnt = Auth::user()->unreadNotifications->count())
                                <span class="badge bg-danger">{{ $cnt }}</span>
                            @else
                                <span class="badge bg-info"><i class="fa fa-info" aria-hidden="true"></i></span>
                            @endif
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @forelse (Auth::user()->notifications as $notification)
                                <li><a>{{ $notification->data['title'] }}
                                    @if ($notification->unread()) <span class="badge bg-danger">未</span> @endif
                                </a></li>
                            @empty
                                <li><a>通知がありません</a></li>
                            @endforelse

                            <li role="separator" class="divider"></li>
                            <li><a>通知の管理</a></li>
                        </ul>
                    </li>
                @endauth

                <li class="dropdown">
                    @auth
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">
                                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name }}（{{ config('fixture.user_role')[Auth::user()->role] }}）としてログインしています。
                            </li>

                            <li role="separator" class="divider"></li>

                            <li><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;ホーム</a></li>
                            <li>
                                <auth-modify></auth-modify>
                            </li>
                            <li><a href="{{ route('phpinfo') }}"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;phpinfo</a></li>

                            <li role="separator" class="divider"></li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); if (confirm('ログアウトしますか？')) document.getElementById('logout-form').submit(); return false;">
                                    <i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;ログアウト
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    @else
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            GUEST <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;ログイン</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;アカウント登録</a></li>
                        </ul>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
