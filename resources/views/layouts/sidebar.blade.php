<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link text">
      <span class="brand-text font-weight-light">CMS</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('courses.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Courses
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('students.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Students
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('assignments.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Assignment
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
