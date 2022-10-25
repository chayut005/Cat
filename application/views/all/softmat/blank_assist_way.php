<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<style>
  .tab-content2 {
    padding: 0 !important;
    box-shadow: none !important;
  }

  .pie {
    margin: auto;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>demo.css" />
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>family=Prompt.css" />



  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/styles/github.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js"></script>


  <script src="<?php echo base_url() . $js_url; ?>sweetalert.init.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>vendor/js/helpers.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>config.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>jquery-3.6.0.min.js"></script>




</head>


<body class="g-sidenav-show  bg-gray-100">

  <?php echo $page_content; ?>
  <?php echo $page_footer; ?>


  <script src="<?php echo base_url() . $js_url; ?>vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>vendor/js/menu.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>main.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>dashboards-analytics.js"></script>
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->



  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/tomik23/circular-progress-bar@latest/docs/circularProgressBar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.2.0/highlight.min.js"></script>
  <!-- <style>
     :root {
      font-size: calc(0vw + 2vh);
      scroll-behavior: smooth;
    }
</style> -->
  <script>
    $(document).ready(function() {
      show_img_user()
    })

    function show_img_user() {
      // alert($('#id_user_id').val())
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
        data: {
          user_id: <?php echo $this->session->userdata('sessUsrId') ?>
        },
        beforeSend: function() {
          $("#img_user_way").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
        },
        complete: function() {
          $("#img_user_way").attr('style', 'display');
        },
        success: function(data_user) {
          $.each(data_user, function(key_user, val_user) {
            // console.log(val_user.path_img_user)
            if (val_user.path_img_user !== null && val_user.path_img_user !== '') {
              $('#img_user_way').attr('src', '<?php echo base_url(); ?>' + val_user.path_img_user)

            } else {
              $('#img_user_way').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')

            }
          })

        }
      })
    }
  </script>
</body>

</html>