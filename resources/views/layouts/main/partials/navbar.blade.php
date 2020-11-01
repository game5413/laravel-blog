<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <div class="navigation">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts') }}">
                        <span data-feather="clipboard"></span>
                        Post
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('comments*') ? 'active' : '' }}" href="{{ route('comments') }}">
                        <span data-feather="message-square"></span>
                        Comment
                    </a>
                </li>
            </ul>
        </div>
        <button class="btn d-md-none" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
        >
            {{ __('Logout') }}
        </button>
    </div>
</nav>