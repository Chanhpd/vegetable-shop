 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
           <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
           </div>
           <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
           <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">LOG</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fa-solid fa-user"></i>
                <span>Users</span>
           </a>
           <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="users.php">Users</a>
                     <a class="collapse-item" href="addUsers.php">Add Users</a>
                </div>
           </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fa-solid fa-carrot"></i>
                <span>Products</span>
           </a>
           <div id="product" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="products.php">Products</a>
                     <a class="collapse-item" href="addProducts.php">Add Products</a>
                </div>
           </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fa-solid fa-calendar-minus"></i>
                <span>Category</span>
           </a>
           <div id="category" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="category.php">Category</a>
                </div>
           </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fa-solid fa-border-all"></i>
                <span>Order</span>
           </a>
           <div id="order" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="order.php">All Order</a>
                </div>
           </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fa-solid fa-border-all"></i>
                <span>Blog</span>
           </a>
           <div id="blog" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="blog.php">All Blog</a>
                     <a class="collapse-item" href="addBlog.php">Add Blog</a>
                </div>
           </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
           <a class="nav-link collapsed" href="setting.php">
                <i class="fa-solid fa-border-all"></i>
                <span>Setting</span>
           </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
 </ul>
 <!-- End of Sidebar -->