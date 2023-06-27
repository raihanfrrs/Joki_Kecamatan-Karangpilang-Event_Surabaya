<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->root() !== url()->current() ? 'collapsed' : '' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('photo', 'video', 'photo/*', 'video/*') ? '' : 'collapsed'}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Document</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content {{ request()->is('photo', 'video', 'photo/*', 'video/*') ? '' : 'collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/photo" class="{{ request()->is('photo', 'photo/*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Photo</span>
            </a>
          </li>
          <li>
            <a href="/video" class="{{ request()->is('vudeo', 'video/*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Video</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Pengajuan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Event</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Musbangkel</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </aside>