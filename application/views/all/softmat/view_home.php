<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row">
    <!-- Order Statistics -->
    <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-12">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between pb-0">
          <div class="card-title mb-0">
            <h5 class="m-0 me-2">Order Statistics</h5>
            <small class="text-muted">42.82k Total Sales</small>
          </div>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
              <a class="dropdown-item" href="javascript:void(0);">Select All</a>
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column align-items-center gap-1">
                  <div id="orderStatisticsChart"></div>
                </div>

              </div>
            </div>
            <div class="col-xl-8">
              <ul class="p-0 m-0">
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Electronic</h6>
                      <small class="text-muted">Mobile, Earbuds, TV</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">82.5k</small>
                    </div>
                  </div>
                </li>
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Fashion</h6>
                      <small class="text-muted">T-shirt, Jeans, Shoes</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">23.8k</small>
                    </div>
                  </div>
                </li>
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Decor</h6>
                      <small class="text-muted">Fine Art, Dining</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">849k</small>
                    </div>
                  </div>
                </li>
                <li class="d-flex">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-football"></i></span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Sports</h6>
                      <small class="text-muted">Football, Cricket Kit</small>
                    </div>
                    <div class="user-progress">
                      <small class="fw-semibold">99</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--/ Order Statistics -->
    <button onclick="test(<?php echo $this->session->userdata('sessUsrId'); ?>)">rfghdhgd</button>



    <!-- Transactions -->

    <!--/ Transactions -->
  </div>
</div>
<!-- / Content -->
<script>
  function test(xxx) {
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: '<?php echo base_url(); ?>Manage/tests',
      data: {
        user_id: xxx
      },
      success:function(data){
        console.log(data)
      }
    })
    // alert(xxx)
  }
</script>