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
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;メニュー&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('passport') }}"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>&nbsp;パスポート管理</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    @auth
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;{{ Auth::user()->name }}&nbsp;としてログインしています。
                            </li>

                            <li role="separator" class="divider"></li>

                            <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;ホーム</a></li>
                            <li><a href="{{ route('phpinfo') }}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;phpinfo</a></li>

                            <li role="separator" class="divider"></li>

                            <li>
                                @if(false)
                                    <a href="{{ route('logout') }}" onclick="return false;" id="logoutBtn">
                                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;ログアウト
                                    </a>
                                @endif

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;ログアウト
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    @else
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>&nbsp;GUEST <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;ログイン</a></li>
                            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;アカウント登録</a></li>
                        </ul>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
