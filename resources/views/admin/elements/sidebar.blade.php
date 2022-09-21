<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/home"
          aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
          class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>

        @if (Auth::user()->role == 'admin')
          <li class="nav-small-cap"><span class="hide-menu">Pengguna</span></li>
          <li class="sidebar-item"> <a class="sidebar-link" href="/admin/dokter"
            aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
            class="hide-menu">Dokter
            </span></a>
          </li>
          <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/staff"
            aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
            class="hide-menu">Staff</span></a></li>
          <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/user"
            aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
            class="hide-menu">Admin</span></a></li>
          <li class="list-divider"></li>
        @endif

        <li class="nav-small-cap"><span class="hide-menu">Ruangan</span></li>
        <li class="sidebar-item"> <a class="sidebar-link" href="/admin/rawat-inap"
          aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
          class="hide-menu">Rawat Inap
          </span></a>
        </li>
        
        @if (Auth::user()->role == 'admin')
          <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/ruang"
            aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
            class="hide-menu">Ruangan</span></a></li>
          </li>
        @endif
        <li class="list-divider"></li>

        <li class="nav-small-cap"><span class="hide-menu">Pasien</span></li>
        <li class="sidebar-item"> <a class="sidebar-link" href="/admin/pasien"
          aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
          class="hide-menu">Pasien
          </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin/pembayaran"
          aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
          class="hide-menu">Pembayaran</span></a></li>
        </li>
        <li class="list-divider"></li>

      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>