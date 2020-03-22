<style>
  aside li p {
    color: white;
  }

  aside p {
    color: white;
  }
  aside .info {
    color: white;
  }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="background-color: #1a211c" >
  <!-- Brand Logo -->
  <a href="../../pages_admin/index.php" class="brand-link " style="background-color: #006636 ;">
    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light" style="font-size: 18px">ระบบยืม-คืนอุปกรณ์</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-color: white">
      <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2 " alt="User Image">
      </div>

      <!--Profile-->
      <div class="info">
        <a class="d-block" >วรวุฒิ พันธุสิทธิ์เสรี (ผู้ดูแล) </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="../../pages_admin/index.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              จัดการอุปกรณ์
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../equipment/name_equipment.php" class="nav-link">
                <i class="far nav-icon"></i>
                <p>รายชื่ออุปกรณ์</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/layout/top-nav-sidebar.html" class="nav-link">
                <i class="far nav-icon"></i>
                <p>หมวดหมู่อุปกรณ์</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="../../pages_admin/index.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              รายชื่ออาจารย์
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../pages_admin/index.php" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              การยืม-คืนอุปกรณ์
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../pages_admin/index.php" class="nav-link">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>
              จัดการผู้ดูแลระบบ
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../pages_admin/index.php" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              ประวัติการยืมคืนอุปกรณ์
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
