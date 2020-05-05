<header class="mb-4">
   <nav class="navbar navbar-expand-sm navbar-dark btn-success"> 
        <a class="navbar-brand" href="/">comics</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item">ようこそ、{{ Auth::user()->name }}さん</li>
                    
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>

</header>



