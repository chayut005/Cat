<style>
    .box-container .card2 {
        position: relative;
        min-width: 230px;
        /* height: 400px; */
        border-radius: 10px;
        overflow: hidden;
        background: #f5f6fa;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
    }



    .box-container .card2 .content {
        margin-top: 10px;
        text-align: center;
        padding: 0 30px;
        color: #2d3436;
        transition: margin-top 0.5s ease;
    }



    /*%% End container %%*/
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h1>MANAGE USERS</h1> -->
    <img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/st.png" alt="user">

    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">

            <div class="d-flex align-items-end row">
                <div class="col-sm-12">





                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-System_use" aria-controls="#navs-top-System_use" aria-selected="true">
                                    System Use
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-System" aria-controls="navs-top-System" aria-selected="false">
                                    System
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-top-System_use" role="tabpanel">

                                <div class="row">
                                    <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">

                                        <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_use_system">
                                                <i style="    margin-bottom: 3%;" class='bx  bxs-receipt'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-pills mb-3" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-card" aria-controls="navs-pills-card" aria-selected="true">
                                                Card
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-table" aria-controls="navs-pills-table" aria-selected="false">
                                                Table
                                            </button>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-pills-card" role="tabpanel">
                                            <div class="tab-pane fade show active" id="navs-pills-justified-card" role="tabpanel">
                                                <div uk-slider="center: true">
                                                    <div class="uk-position-relative " tabindex="-1">
                                                        <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-2@m   uk-child-width-1-4@l   uk-grid" id="html_re">



                                                        </ul>
                                                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                                                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                                                    </div>
                                                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="navs-pills-table" role="tabpanel">
                                            <table id="table_category_use" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center;">No</th>
                                                        <th style="text-align:center;">Department</th>
                                                        <th style="text-align:center;">Category</th>
                                                        <th style="text-align:center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane fade" id="navs-top-System" role="tabpanel">

                                <table id="main_system" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">No</th>
                                            <th style="text-align:center;">Category</th>
                                            <th style="text-align:center;">Ststus</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_use_system" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">SELECT STSTEM</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="data_insert_category" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">System</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Use</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<script>
     function button_disable_system(system_id) {
        event.preventDefault();
        Swal.fire({
            title: "ต้องการ Disable หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url(); ?>set_time/disable_system',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        system_id: system_id
                    },
                    success: function(reply_disable) {
                        // console.log(data['reply'])
                        if (reply_disable['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_disable['html'] + "</p><p>" + reply_disable['html_eng'] + "</p>",
                                icon: 'success',

                            })
                            data_system_use()
                        } else if (reply_disable['reply'] === false) {
                            Swal.fire({
                                html: "<p>" + reply_disable['html'] + "</p><p>" + reply_disable['html_eng'] + "</p>",
                                icon: 'warning',

                            })
                        }
                    }
                })
            }
        })
    }
       function button_enable_system(system_id) {
        event.preventDefault();
        Swal.fire({
            title: "ต้องการ Enable หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url(); ?>set_time/enable_system',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        system_id: system_id
                    },
                    success: function(reply_enable) {
                        // console.log(data['reply'])
                        if (reply_enable['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_enable['html'] + "</p><p>" + reply_enable['html_eng'] + "</p>",
                                icon: 'success',

                            })
                            data_system_use()
                        } else if (reply_enable['reply'] === false) {
                            Swal.fire({
                                html: "<p>" + reply_enable['html'] + "</p><p>" + reply_enable['html_eng'] + "</p>",
                                icon: 'warning',

                            })
                        }
                    }
                })
            }
        })
    }
    function use_system(system_id, dep_id) {
        // alert(type_id + '==' + dep_id)
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ  Save System?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert(pri_id + '==>' + dep_id)
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>set_time/save_system',
                    data: {
                        system_id: system_id,
                        dep_id: dep_id
                    },
                    success: function(reply_save_system) {
                        console.log(reply_save_system)
                        if (reply_save_system !== true && reply_save_system !== false) {
                            Swal.fire({
                                html: "<p>" + reply_save_system + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_save_system === true) {
                            Swal.fire({
                                html: "<p>Save Type</p><p>Success</p>",
                                icon: 'success',
                            })
                            data_system_use()
                            $('#modal_use_system').modal('hide')
                        } else if (reply_save_system === false) {
                            Swal.fire({
                                html: "<p>Save  Type</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function button_delete_system_dep(dep_id, system_id) {
        event.preventDefault();

        // alert(system_id + '==>' + dep_id)
        Swal.fire({
            title: "ต้องการ Delete หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert(user_id)
                $.ajax({
                    url: '<?php echo base_url(); ?>set_time/delete_system_use',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        system_id: system_id,
                        dep_id: dep_id

                    },
                    success: function(reply_delete) {
                        // console.log(data['reply'])
                        if (reply_delete['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_delete['html'] + "</p><p>" + reply_delete['html_eng'] + "</p>",
                                icon: 'success',
                            })
                            data_system_use()
                        } else if (reply_delete['reply'] === false) {
                            Swal.fire({
                                html: "<p>" + reply_delete['html'] + "</p><p>" + reply_delete['html_eng'] + "</p>",
                                icon: 'warning',
                            })
                        }
                    }
                })
            }
        })
    }
    $(document).ready(function() {

        var cnt = 1;
        var table = $('#data_insert_category').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],form_update_time_pri data_priority_check_add
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],

            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>GET_API/data_system_table',
                type: 'post',
                dataType: 'json',
                // data: function(data) {
                //     data.start_date = $('#start_date').val();
                //     data.end_date = $('#end_date').val()
                // }
            },
            columns: [{
                    data: "system_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "system_name"
                },
                {
                    data: 'system_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.del_flag !== '1') {
                                if (row.status_system === '1') {
                                    data = '<span class="spinner-grow text-success" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                } else if (row.status_system === '0') {
                                    data = '<span class="spinner-grow text-warning" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                }
                            } else {
                                data = '<span class="spinner-grow text-dark" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                            }

                        }
                        return data;
                    }
                },
                {
                    data: 'check_show'
                }
                // {
                //     data: 'button_show',
                // }
            ]
        });
        setInterval(function() {
            table.ajax.reload(null, false);
            cnt = 1;
            // table.clear().draw();
        }, 1000);
        // table.buttons().container()
        //     .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
    $(document).ready(function() {

        var cnt = 1;
        var table = $('#main_system').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],form_update_time_pri data_priority_check_add
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],

            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>GET_API/data_main_system',
                type: 'post',
                dataType: 'json',
                // data: function(data) {
                //     data.start_date = $('#start_date').val();
                //     data.end_date = $('#end_date').val()
                // }
            },
            columns: [{
                    data: "system_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "system_name"
                },
                {
                    data: 'system_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_system === '1') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_disable_system(' + data + ')"  class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault"></div>'
                            } else if (row.status_system === '0') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_enable_system(' + data + ')"  class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'button_show'

                }
            ]
        });
        setInterval(function() {
            table.ajax.reload(null, false);
            cnt = 1;
            // table.clear().draw();
        }, 1000);
        // table.buttons().container()
        //     .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
    $(document).ready(function() {
        var cnt = 1;
        var table = $('#table_category_use').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],form_update_time_pri data_priority_check_add
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],

            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>set_time/data_system_use_table',
                type: 'post',
                dataType: 'json',
                // data: function(data) {
                //     data.start_date = $('#start_date').val();
                //     data.end_date = $('#end_date').val()
                // }
            },
            columns: [{
                    data: "system_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "dep_name"
                },
                {
                    data: "system_name"
                },
                {
                    data: 'system_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            data = '<a onclick="button_delete_system_dep(' + row.dep_id + ',' + data + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
                        }
                        return data;
                    }
                }
                // {
                //     data: 'button_show',
                // }
            ]
        });
        setInterval(function() {
            table.ajax.reload(null, false);
            cnt = 1;
            // table.clear().draw();
        }, 1000);
        data_system_use()
        //     .appendTo('#example_wrapper .col-md-6:eq(0)');
    });

    function data_system_use() {

        var html_re = '';

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>set_time/data_system',
            success: function(re_data) {
                // console.log(re_data)

                $.each(re_data, function(key_re, val_re) {
                    // alert(val_re.dep_name) <i class='bx bx-edit'></i> <i class='bx bxs-trash' ></i>
                    // html_re = ''<img src="" alt="profile-picture" title="Someone Famous" />

                    html_re += '<li style="    padding-bottom: 20px;">'
                    html_re += '<div style="cursor: -webkit-grab; cursor: grab;" class="box-container">'
                    html_re += '<div  class="card card2">'
                    html_re += '<div class="card-body">'
                    html_re += '<div>'
                    html_re += '<img style="    object-fit: cover;display: block;margin: auto;height: 180px;width: 180px;border-radius: 50%;" src="https://s40424.pcdn.co/in/wp-content/uploads/2022/07/info-systems.jpg" alt=""/>'
                    html_re += '</div>'
                    html_re += '<div class="content">'
                    html_re += '<h3 class="title">' + val_re.system_name + '</h3><span><span class="spinner-grow text-success" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span></span>'
                    html_re += '<p>' + val_re.dep_name + '</p>'
                    html_re += '</div>'
                    html_re += '<div class="button-wrapper">'
                    html_re += '<a onclick="button_delete_system_dep(' + val_re.dep_id + ',' + val_re.system_id + ')" href="" style="    display: flex;justify-content: center; align-items: center;" type="button" onclick="" class="btn btn-sm btn-danger ">'
                    html_re += '<i class="bx  bxs-trash d-block d-sm-none"></i>'
                    html_re += '<span class="d-none d-sm-block">Delete</span>'
                    html_re += '</a>'
                    html_re += '</div>'
                    html_re += '</div>'
                    html_re += '</div>'
                    html_re += '</div>'
                    html_re += '</li>'

                })

                $("#html_re").html(html_re)
            }
        })
    }
</script>