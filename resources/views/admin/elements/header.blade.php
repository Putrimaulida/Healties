<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md">
    <div class="navbar-header" data-logobg="skin6">
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
        class="ti-menu ti-close"></i></a>

      <div class="navbar-brand">
        <!-- Logo icon -->
        <a href="http://rsjakarta.co.id/">
          <b class="logo-icon">
            <!-- Dark Logo icon -->
            HLS Healties
          </b>
          <!--End Logo icon -->
          </span>
        </a>
      </div>

      <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
        data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
        class="ti-more"></i></a>
    </div>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">

      <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </a>
        </li>
        
      </ul>

      <ul class="navbar-nav float-right">
        <li class="nav-item d-none d-md-block">
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
          @if (Auth::user()->foto == null)
            <img src="{{ asset('assets/images/users/profile-pic.jpg') }}" alt="user" class="rounded-circle" width="40">
          @else
            <img src="{{ asset('storage/'.Auth::user()->foto) }}" alt="user" class="rounded-circle" width="40">
          @endif

          <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
            class="text-dark">{{ Auth::user()->nama }}</span> <i data-feather="chevron-down"
            class="svg-icon"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
            <a class="dropdown-item" href="/admin/ubah_profile"><i data-feather="settings"
              class="svg-icon mr-2 ml-1"></i>
            Account Setting</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/admin/ubah_password"><i data-feather="lock"
              class="svg-icon mr-2 ml-1"></i>
            Ubah Password</a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin akan keluar aplikasi?')">
              @csrf
              <button type="submit" class="dropdown-item">
                <i data-feather="power" class="svg-icon mr-2 ml-1"></i>Logout
              </button>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>