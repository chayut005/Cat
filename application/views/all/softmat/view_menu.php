<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<!-- Menu -->

		<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
			<div class="app-brand demo">
				<a href="<?php echo base_url().'Manage/Home/';?>" class="app-brand-link">
					<!-- <span class="app-brand-logo demo"> -->
					<img style="    width: 80%;"  src="<?php echo base_url(); ?>./themes/softmat/img/cat.png" alt="user">
					<!-- </span> -->
					<!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">CAT</span> -->
				</a>

				<!-- <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
					<i class="bx bx-chevron-left bx-sm align-middle"></i>
				</a> -->
			</div>

			<div class="menu-inner-shadow"></div>




			<ul class="menu-inner py-1">
				<!-- <ul class="metismenu " id="menu"> -->
				<?php

				$resMenu = $this->assist_backend->ShowMenu($this->session->userdata('sessUsrId'));

				if ($this->router->fetch_method() == 'edit' || $this->router->fetch_method() == 'rule') {

					$set_method = 'manage';
				} else {

					$set_method = $this->router->fetch_method();
				}

				$submenu_active = $this->router->fetch_class() . '/' . $set_method;

				//  echo($submenu_active);
				//exit();




				foreach ($resMenu as $m) {
					// var_dump($m);
					//exit();
					// $str_sactive = '';

					// $resMenu = $this->connect_db->ShowMenu($this->session->userdata('sessUsrId'));
					$str_sactive = '';
					$animetion_active = '';

					foreach ($m['sub_menu'] as $sme) {
						//   var_dump($sme);
						//exit();
						//    echo $sme['method']."<br>";

						// echo $sme['method']. ' | ';
						// echo   ' | ' . $sme['method'];
						// echo $submenu_active;
						if ($sme['method'] == $submenu_active) {
							$str_sactive = ' active open ';
							$animetion_active = 'bx-flashing';
						}
					}

					echo '<li class="menu-item ' . $str_sactive . '"><a href="javascript:void(0);" class="menu-link menu-toggle">
			 <i class="menu-icon tf-icons ' . $m['icon_menu'] . ' ' . $animetion_active . ' "></i>
			<div data-i18n="Layouts">' . $m['g_name'] . '</div>
		  </a>';
				?>
					<?php

					echo '
				<ul class="menu-sub">';

					foreach ($m['sub_menu'] as $sm) {
						// echo base_url().$sm['link'];

						// echo $sm['method']."</br>";
						// echo $submenu_active;
						// exit;

						if ($sm['method'] == $submenu_active) {
							$str_active = ' active ';
						} else {

							$str_active = '';
						}
						//  var_dump($sme['method']);
						//  echo "<br>";
						//  var_dump($submenu_active);
						//  echo "<br>";


						echo '<li class="menu-item ' . $str_active . '"><a class="menu-link ' . $str_active . '" href="' . base_url() . $sm['link'] . '"> 
    <div>' . $sm['name'] . '</div></a></li>';
					}

					?>
				<?php
					echo '</ul>';
					echo '</li>';
					//echo '</ul>';
					// $x=0;
				}
				?>
			</ul>
		</aside>
		<!-- / Menu -->