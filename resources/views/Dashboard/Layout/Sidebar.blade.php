 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
     <div class="position-sticky pt-3">
         <ul class="nav flex-column">
             <h6 class="sidebar-heading d-flex text-muted justify-content-between align-items-center mt-2 mb-3 px-3">Menu
                 Utama</h6>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('Home') ? 'active' : '' }}" aria-current="page" href="/">
                     <span data-feather="home"></span>
                     Home
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link {{ Request::is('Dashboard') ? 'active' : '' }} " href="/Dashboard">
                     <span data-feather="layout"></span>
                     Dashboard
                 </a>
             </li>

              <li class="nav-item">
                 <a class="nav-link {{ Request::is('Dashboard/Posts') ? 'active' : '' }}" href="/Dashboard/Posts">
                     <span data-feather="file-text"></span>
                     Data Mahasiswa
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link {{ Request::is('Dashboard/Home/Posts') ? 'active' : '' }}"
                     href="/Dashboard/Home/Posts">
                     <span data-feather="file-text"></span>
                     Jurusan 
                 </a>
             </li>

            



             <h6 class="sidebar-heading d-flex text-muted justify-content-between align-items-center mt-5 mb-3 px-3">
                 Categories</h6>

             <li class="nav-item">
                 <a class="nav-link {{ Request::is('Dashboard/Categories') ? 'active' : '' }}"
                     href="/Dashboard/Categories">
                     <span data-feather="grid"></span>
                     Post - Categories
                 </a>
             </li>


             <h6 class="sidebar-heading d-flex text-muted justify-content-between align-items-center mt-5 mb-3 px-3">
                 Logout</h6>


             <form action="/SignOut" method="POST">
                 @csrf
                 <button class="nav-link bg-white border-0" type="submit"><span data-feather="log-out"></span>
                     Logout</button>

             </form>

         </ul>

     </div>
 </nav>
