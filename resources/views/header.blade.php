<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="{{url('/')}}" class="logo"><b>Wisma</b>GAYA</a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="{{ url('/logout') }}" class="dropdown-toggle"> Log out,{{ Auth::user()->name }}</a>
          
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ asset("img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
              <p>
                {{ Auth::user()->name }}
                <small></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>