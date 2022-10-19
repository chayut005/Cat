
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <!-- <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."<i class='bx bxs-book-bookmark'></i>
                  /> -->
                  <a class="nav-link " href="javascript:void(0);">
                  <i style="font-size: 20px;" class="bx bxs-book-bookmark bx-flashing"></i>
                  </a>
                </div>
              </div>
              <!-- /Search -->

              <ul style="    margin-top: auto;" class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render.  href="<?php echo base_url() . 'Manage/Assist_way'; ?> -->
                <li style="padding-right: 20px;" class="nav-item navbar-dropdown dropdown">
                  <a class="nav-link  hide-arrow" href="<?php echo base_url() . 'Manage/Assist_way'; ?>">
                  <i style="font-size: 20px;" class='bx bx-mail-send bx-tada' ></i>
                  </a>
                </li>

                <li style="padding-right: 20px;" class="nav-item navbar-dropdown dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i style="font-size: 20px;" class="bx bx-bell bx-tada"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a  class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Prgnmfgmnofile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>

                  </ul>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <!-- <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> -->
                      <img id="img_hearder" class="w-px-40 h-auto rounded-circle setting_img_hearder" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt>

                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                          <!-- <div class="spinner-grow text-success" role="status"> -->
                          <!-- <span class="visually-hidden">Loading...</span> -->
                        <!-- </div> -->
                            <div class="avatar avatar-online">
                              <!-- <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> -->
                              <img id="img_hearder2" class="w-px-40 h-auto rounded-circle setting_img_hearder" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $this->session->userdata('sessUsr'); ?></span>
		
                            <small class="text-muted"><?php echo $this->session->userdata('sessGname');?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item"  href="<?php echo base_url().'Account/Profile/';?>">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo site_url('manage/logout'); ?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
