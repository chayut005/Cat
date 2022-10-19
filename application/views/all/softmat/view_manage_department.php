<style>
    .border_img {
        border-radius: 50% !important;
    }


    .setting_img_user {
        height: 100px;
        width: 100px;
        object-fit: cover;

        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .margin_top_fig {
        margin-top: 6.5px;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
<!-- <h1>MANAGE DEPARTMENT</h1> -->
<img style=" min-width: 170px; width: 25%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/md.png" alt="user">

    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <div class="card mb-4">
                <!-- <?php

                echo date("Y-m-d H:i:s");
                ?> -->
                <!-- Account -->
                <div class="card-body">
                    <div class="row">
                        <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">
                            <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                <button type="button" class="btn  btn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_department">
                                    <i style="    margin-bottom: 3%;" class='bx bx-buildings'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                </button>
                            </div>
                        </div>
                    </div>


                    <table id="table_department" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                        <thead>
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center;">Name</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Status Department</th>
                                <th style="text-align:center;">Reply Time</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_add_department" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">CREATE DEPARTMENT</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_department" class="was-validated">
                    <div class="row">
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Department Name:</label>
                            <input type="text" class="form-control" name="department_name" placeholder="Enter Department Name....." required>
                        </div>
                        <div class="col-lg-6 col-mb-12 col-sm-12  ">
                            <label>Time Department:</label>
                            <div class="input-group input-group-sm">
                                <input type="number" name="department_date" class="form-control" value="0"   min="0" max="365" required />  <span class="input-group-text">d</span>
                                <input type="number" name="department_time_h" class="form-control" value="0"  min="0" max="23" required />  <span class="input-group-text">h</span>
                                <input type="number" name="department_time_m" class="form-control" value="0"  min="0" max="60" required />  <span class="input-group-text">m</span>

                            </div>





                            <!-- <input type="number" class="form-control" name="department_name" required>
                            <input type="datetime-local" class="form-control" name="department_name" required> -->
                        </div>
                        <div class="col lg-12 col-mb-12 col-sm-12 my-3 input-group-sm">
                            <label>
                                <input id="status_enable_dep" checked name="status_dep" value="1" type="radio">
                                Enable</label>
                            <label>
                                <input name="status_dep" value="0" type="radio">
                                Disable</label>
                        </div>
                    </div>
                    <div style="float: right;"> <button type="reset" class="btn  btn-sm  btn-primary">Clear</button> <button type="button" onclick="create_department()" class="btn  btn-sm  btn-primary">Create</button></div>
                    <input type="hidden" name="action" value="<?php echo base64_encode('create_department'); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_update_department" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE DEPARTMENT</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update_department" class="was-validated">
                    <div class="row">
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Department Name:</label>
                            <input type="text" class="form-control" name="u_department_name" placeholder="Enter Department Name....." required>
                            <input type="hidden" class="form-control" name="u_department_id" required>
                        </div>
                        <div class="col-lg-6 col-mb-12 col-sm-12  ">
                            <label>Time Department:</label>
                            <div class="input-group input-group-sm">
                                <input type="number" name="u_department_date" class="form-control" value="0"   min="0" max="365" required />  <span class="input-group-text">d</span>
                                <input type="number" name="u_department_time_h" class="form-control" value="0"  min="0" max="23" required />  <span class="input-group-text">h</span>
                                <input type="number" name="u_department_time_m" class="form-control" value="0"  min="0" max="60" required />  <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <div style="float: right;"> <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                            <button type="button" onclick="update_department()" class="btn  btn-sm  btn-primary">Update</button>
                        </div>
                        <input type="hidden" name="action" value="<?php echo base64_encode('update_department'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<script>
    function update_department() {
        event.preventDefault()
        // alert($('#form_permission').serialize())
        Swal.fire({
            title: "ต้องการ Update Department?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>department/update_department',
                    data: $('#form_update_department').serialize(),
                    success: function(reply_update_department) {
                        // console.log(reply_update_department)
                        if (reply_update_department !== true && reply_update_department !== false) {
                            Swal.fire({
                                html: "<p>" + reply_update_department + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_update_department === true) {
                            // alert('dfhdfh')
                            Swal.fire({
                                html: "<p>Update Department</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_update_department').modal('hide')
                        } else if (reply_update_department === false) {
                            Swal.fire({
                                html: "<p>Update Department</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function modal_get_data_dep(dep_id) {
        // alert(dep_id)
        var check_list_permissom_geoup = "";
        var html_list_permission_group = "";
        var check
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>department/data_update_department',
            data: {
                dep_id: dep_id
            },
            success: function(data_dep) {
                    // console.log(data_dep);

                $.each(data_dep, function(key_dep, val_dep) {
                    $('input[name=u_department_name]').val(val_dep.dep_name)
                    $('input[name=u_department_date]').val(val_dep.date_e)
                    $('input[name=u_department_time_h]').val(val_dep.h_e)
                    $('input[name=u_department_time_m]').val(val_dep.m_e)
                    $('input[name=u_department_id]').val(dep_id)

                })
                $('#modal_update_department').modal('show')
            }

        })

    }

    function create_department() {
        event.preventDefault()
        // alert($('#form_permission').serialize())
        Swal.fire({
            title: "ต้องการ Create Department?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>department/create_department',
                    data: $('#form_department').serialize(),
                    success: function(reply_create_department) {
                        // console.log(reply_create_department)
                        if (reply_create_department !== true && reply_create_department !== false) {
                            Swal.fire({
                                html: "<p>" + reply_create_department + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_create_department === true) {
                            // alert('dfhdfh')
                            Swal.fire({
                                html: "<p>Create Department</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_add_department').modal('hide')
                        } else if (reply_create_department === false) {
                            Swal.fire({
                                html: "<p>Create Department</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function button_disable_dep(dep_id) {
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
                    url: '<?php echo base_url(); ?>department/disable_dep',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        dep_id: dep_id
                    },
                    success: function(reply_disable) {
                        // console.log(data['reply'])
                        if (reply_disable['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_disable['html'] + "</p><p>" + reply_disable['html_eng'] + "</p>",
                                icon: 'success',

                            })
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

    function button_enable_dep(dep_id) {
        event.preventDefault();
        Swal.fire({
            title: "ต้องการ Enable หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url(); ?>department/enable_dep',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        dep_id: dep_id
                    },
                    success: function(reply_enable) {
                        // console.log(data['reply'])
                        if (reply_enable['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_enable['html'] + "</p><p>" + reply_enable['html_eng'] + "</p>",
                                icon: 'success',

                            })
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

    function button_delete_dep(dep_id) {
        event.preventDefault();
        Swal.fire({
            title: "ต้องการ Delete หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert(user_id)
                $.ajax({
                    url: '<?php echo base_url(); ?>department/delete_dep',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        dep_id: dep_id
                    },
                    success: function(reply_delete) {
                        // console.log(data['reply'])
                        if (reply_delete['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_delete['html'] + "</p><p>" + reply_delete['html_eng'] + "</p>",
                                icon: 'success',
                            })
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

    function button_re_dep(dep_id) {
        // alert(permission_dep_id)
        event.preventDefault();
        Swal.fire({
            title: "ต้องการ Re หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert(user_id)
                $.ajax({
                    url: '<?php echo base_url(); ?>department/re_dep',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        dep_id: dep_id
                    },
                    success: function(reply_re) {
                        // console.log(data['reply'])
                        if (reply_re['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_re['html'] + "</p><p>" + reply_re['html_eng'] + "</p>",
                                icon: 'success',
                            })
                        } else if (reply_re['reply'] === false) {
                            Swal.fire({
                                html: "<p>" + reply_re['html'] + "</p><p>" + reply_re['html_eng'] + "</p>",
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
        var table = $('#table_department').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],
            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>Department/data_department_table',
                type: 'post',
                dataType: 'json',
                // data: function(data) {}
            },
            columns: [{
                    data: "dep_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: 'dep_name'
                },
                {
                    data: 'dep_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_dep === '1') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_disable_dep(' + data + ')"  class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault"></div>'
                            } else if (row.status_dep === '0') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_enable_dep(' + data + ')"  class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'dep_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.del_flag === '1') {
                                data = '<span><div><span style="background-color:#f44747;border-radius:10px; color:#ffffff; padding: 0px 10px 0px 10px; "  >Delete</div></span></span>'
                            } else if (row.del_flag === '0') {
                                data = '<span><div><span style="background-color:#47f484;border-radius:10px; color:#ffffff; padding: 0px 10px 0px 10px; "  >Normal</div></span></span>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'dep_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            // const myArray = row.time_dep.split(" ");
                            data_html = '<div>'+ row.date_e +'  ('+ row.h_e +':'+ row.m_e +')'+'</div>'
                        }
                        return data_html;
                    }
                },
                {
                    data: 'dep_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.del_flag === '1') {
                                data_html = '<a onclick="button_re_dep(' + data + ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>'
                            } else if (row.del_flag !== '1') {
                                data_html = ''
                                if (row.status_dep === '1') {
                                    data_html += '<a onclick="modal_get_data_dep(' + data + ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>'
                                } else if (row.status_dep === '0') {
                                    data_html += ''
                                }
                                data_html += '<a onclick="button_delete_dep(' + data + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
                            }
                        }
                        return data_html;
                    }
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
</script>