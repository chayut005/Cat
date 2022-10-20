<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h1>MANAGE QUEST</h1> -->
    <img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/mpr.png" alt="user">
    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">

            <div class="d-flex align-items-end row">
                <div class="col-sm-12">



                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-time_pri" aria-controls="#navs-top-time_pri" aria-selected="true">
                                    Time
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-manage_pri" aria-controls="navs-top-manage_pri" aria-selected="false">
                                    Priority Main
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-top-time_pri" role="tabpanel">

                                <div class="row">
                                    <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">


                                        <div id="show_department_data" style="float: left; margin-bottom:5px;" class=" input-group-outline  input-group-sm">
                                            <!-- <label>Department:</label> -->

                                            <input id="search_department" type="hidden" value="All">
                                        </div>




                                        <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_check_pri_dep">
                                                <i style="    margin-bottom: 3%;" class='bx  bx-list-check'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <table id="data_priority" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">No</th>
                                            <th style="text-align:center;">Department</th>
                                            <th style="text-align:center;">Priorioty</th>
                                            <th style="text-align:center;">Priorioty Time</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="navs-top-manage_pri" role="tabpanel">
                                <div class="row">
                                    <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">


                                        <div id="show_department_data" style="float: left; margin-bottom:5px;" class=" input-group-outline  input-group-sm">
                                            <!-- <label>Department:</label> -->

                                            <input id="search_department" type="hidden" value="All">
                                        </div>




                                        <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_create_priority">
                                                <i style="    margin-bottom: 3%;" class='bx  bx-purchase-tag'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <table id="data_manage_priority" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">No</th>
                                            <th style="text-align:center;">Priorioty Name</th>
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
<div class="modal fade" id="modal_update_priority_t" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE TIME PRIORITY</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update_time_pri" class="was-validated">
                    <div class="row">
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Priprity Name:</label>
                            <input disabled type="text" class="form-control" id="pri_name_t" placeholder="Name.....">
                            <input type="hidden" class="form-control" id="pri_id_t" name="pri_id_t" required>
                            <input type="hidden" class="form-control" id="dep_id_t" name="dep_id_t" required>
                        </div>
                        <div class="col-lg-6 col-mb-12 col-sm-12  ">
                            <label>Time Priority:</label>
                            <div class="input-group input-group-sm">
                                <input type="number" id="u_pri_date" name="u_pri_date" class="form-control" value="0" min="0" max="365" required /> <span class="input-group-text">d</span>
                                <input type="number" id="u_pri_time_h" name="u_pri_time_h" class="form-control" value="0" min="0" max="23" required /> <span class="input-group-text">h</span>
                                <input type="number" id="u_pri_time_m" name="u_pri_time_m" class="form-control" value="0" min="0" max="60" required /> <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <div style="float: right;">
                            <button type="button" onclick="update_priority_time()" class="btn  btn-sm  btn-primary">Update</button>
                        </div>
                        <input type="hidden" name="action" value="<?php echo base64_encode('update_priority_time'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_check_pri_dep" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">SELECT PRIORITY</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="data_priority_check_add" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                    <thead>
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">Priorioty Name</th>
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
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_edit_pri" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE PRIORITY</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_update_priority" class="was-validated">
                    <div class="row">
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">
                            <label>Priprity Name:</label>
                            <input type="text" class="form-control" id="pri_name_m" name="pri_name_m" placeholder="Name.....">
                            <input type="hidden" class="form-control" id="pri_id_m" name="pri_id_m" required>
                        </div>
                        <div class="my-3">
                            <div style="float: right;">
                                <button type="reset" class="btn  btn-sm  btn-primary">Claer</button>
                                <button type="button" onclick="update_priority()" class="btn  btn-sm  btn-primary">Update</button>
                            </div>
                            <input type="hidden" name="action" value="<?php echo base64_encode('update_priority'); ?>">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_create_priority" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">CREATE PRIORITY</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_create_priority" class="was-validated">
                    <div class="row">
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">
                            <label>Priprity Name:</label>
                            <input type="text" class="form-control" id="pri_name_c" name="pri_name_c" placeholder="Name.....">
                        </div>
                        <div class="col lg-12 col-mb-12 col-sm-12 my-3 input-group-sm">
                            <label>
                                <input id="status_enable_permission" checked name="status_pri" value="1" type="radio">
                                Enable</label>
                            <label>
                                <input name="status_pri" value="0" type="radio">
                                Disable</label>
                        </div>
                        <div class="">
                            <div style="float: right;">
                                <button type="reset" class="btn  btn-sm  btn-primary">Claer</button>
                                <button type="button" onclick="create_priority()" class="btn  btn-sm  btn-primary">Create</button>
                            </div>
                            <input type="hidden" name="action" value="<?php echo base64_encode('create_priority'); ?>">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<script>
    function create_priority() {
        event.preventDefault()
        // alert($('#form_create_priority').serialize())
        Swal.fire({
            title: "ต้องการ  Create Priority?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>set_time/create_priority',
                    data: $('#form_create_priority').serialize(),
                    success: function(reply_per_user) {
                        console.log(reply_per_user)
                        if (reply_per_user !== true && reply_per_user !== false) {
                            Swal.fire({
                                html: "<p>" + reply_per_user + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_per_user === true) {
                            Swal.fire({
                                html: "<p>Update Create Priority</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_create_priority').modal('hide')
                        } else if (reply_per_user === false) {
                            Swal.fire({
                                html: "<p>Update  Create Priority</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function use_priority(pri_id, dep_id) {

        event.preventDefault()
        Swal.fire({
            title: "ต้องการ  Save Priority?",
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
                    url: '<?php echo base_url(); ?>set_time/save_priority',
                    data: {
                        pri_id: pri_id,
                        dep_id: dep_id
                    },
                    success: function(reply_save_pri) {
                        console.log(reply_save_pri)
                        if (reply_save_pri !== true && reply_save_pri !== false) {
                            Swal.fire({
                                html: "<p>" + reply_save_pri + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_save_pri === true) {
                            Swal.fire({
                                html: "<p>Update Priority User</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_check_pri_dep').modal('hide')
                        } else if (reply_save_pri === false) {
                            Swal.fire({
                                html: "<p>Update  Priority User</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })
    }

    function update_priority() {
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ  Update Priority?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>GET_API/update_priority',
                    data: $('#form_update_priority').serialize(),
                    success: function(reply_per_user) {
                        console.log(reply_per_user)
                        if (reply_per_user !== true && reply_per_user !== false) {
                            Swal.fire({
                                html: "<p>" + reply_per_user + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_per_user === true) {
                            Swal.fire({
                                html: "<p>Update Priority User</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_edit_pri').modal('hide')
                        } else if (reply_per_user === false) {
                            Swal.fire({
                                html: "<p>Update  Priority User</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function edit_priority(pri_id) {
        // alert(pri_id + '==>')
        $.ajax({
            url: '<?php echo base_url(); ?>GET_API/data_update_priority',
            type: "POST",
            dataType: 'json',
            data: {
                pri_id: pri_id
            },
            success: function(data) {
                // console.log(data)
                $.each(data, function(key, val) {
                    $('#pri_name_m').val(val.pri_name)
                })
                $('#pri_id_m').val(pri_id)

                $('#modal_edit_pri').modal('show')
            }
        })

    }

    function button_re_pri(pri_id) {
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
                    url: '<?php echo base_url(); ?>GET_API/re_pri',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        pri_id: pri_id
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

    function button_disable_pri(pri_id) {
        // alert(pri_id)
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
                    url: '<?php echo base_url(); ?>GET_API/disable_pri',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        pri_id: pri_id
                    },
                    success: function(reply_disable) {
                        // console.log(reply_disable)
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

    function button_enable_pri(pri_id) {
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
                    url: '<?php echo base_url(); ?>GET_API/enable_pri',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        pri_id: pri_id
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

    function button_delete_pri(pri_id) {
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
                    url: '<?php echo base_url(); ?>GET_API/delete_pri',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        pri_id: pri_id
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

    function button_delete_prioroty_time(pri_id, dep_id) {
        event.preventDefault();

        // alert(pri_id + '==>' + dep_id)
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
                    url: '<?php echo base_url(); ?>set_time/delete_priority_time',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        pri_id: pri_id,
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

    function update_priority_time() {
        event.preventDefault()
        // alert($('#form_permission').serialize())
        Swal.fire({
            title: "ต้องการ Update Priority?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert($('#form_update_time_pri').serialize())
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>set_time/update_time_priority',
                    data: $('#form_update_time_pri').serialize(),
                    success: function(reply_pri) {
                        console.log(reply_pri)
                        if (reply_pri !== true && reply_pri !== false) {
                            Swal.fire({
                                html: "<p>" + reply_pri + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_pri === true) {
                            // alert('dfhdfh')
                            Swal.fire({
                                html: "<p>Update Priority Time</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_update_priority_t').modal('hide')
                        } else if (reply_pri === false) {
                            Swal.fire({
                                html: "<p>Update Priority Time</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function modal_get_data_pri(pri_id, dep_id) {
        // alert(pri_id + '==>' + dep_id)
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/data_time_priority',
            data: {
                pri_id: pri_id,
                dep_id: dep_id
            },
            success: function(data_pri_time) {
                // console.log(data_pri_time)
                $.each(data_pri_time, function(key_p, val_p) {
                    $('#pri_name_t').val(val_p.pri_name)
                    $('#u_pri_date').val(val_p.date_e)
                    $('#u_pri_time_h').val(val_p.h_e)
                    $('#u_pri_time_m').val(val_p.m_e)
                    $('#pri_id_t').val(pri_id)
                    $('#dep_id_t').val(dep_id)


                })
                $('#modal_update_priority_t').modal('show');
            }
        })

    }
    $(document).ready(function() {

        var cnt = 1;
        var table = $('#data_priority_check_add').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],form_update_time_pri data_priority_check_add
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],

            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>GET_API/data_priority_table',
                type: 'post',
                dataType: 'json',
                // data: function(data) {
                //     data.start_date = $('#start_date').val();
                //     data.end_date = $('#end_date').val()
                // }
            },
            columns: [{
                    data: "pri_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "pri_name"
                },
                {
                    data: 'pri_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.del_flag !== '1') {
                                if (row.status_pri === '1') {
                                    data = '<span class="spinner-grow text-success" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                } else if (row.status_pri === '0') {
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
        var table = $('#data_priority').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],form_update_time_pri data_priority_check_add
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],

            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>set_time/data_priority_d',
                type: 'post',
                dataType: 'json',
                // data: function(data) {
                //     data.start_date = $('#start_date').val();
                //     data.end_date = $('#end_date').val()
                // }
            },
            columns: [{
                    data: "pri_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "dep_name"
                },
                {
                    data: "pri_name"
                },
                {
                    data: 'pri_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            // const myArray = row.time_dep.split(" ");
                            data_html = '<div>' + row.date_e + '  (' + row.h_e + ':' + row.m_e + ')' + '</div>'
                        }
                        return data_html;
                    }
                },
                {
                    data: 'pri_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            data_html = ''
                            data_html += '<a onclick="modal_get_data_pri(' + data + ',' + row.dep_id + ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a><a onclick="button_delete_prioroty_time(' + data + ',' + row.dep_id + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
                        }
                        return data_html;
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
        // table.buttons().container()
        //     .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
    $(document).ready(function() {

        var cnt = 1;
        var table = $('#data_manage_priority').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],form_update_time_pri data_priority_check_add
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],

            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>GET_API/data__manage_priority',
                type: 'post',
                dataType: 'json',
                // data: function(data) {
                //     data.start_date = $('#start_date').val();
                //     data.end_date = $('#end_date').val()
                // }
            },
            columns: [{
                    data: "pri_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "pri_name"
                },
                {
                    data: 'pri_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_pri === '1') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_disable_pri(' + data + ')"  class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault"></div>'
                            } else if (row.status_pri === '0') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_enable_pri(' + data + ')"  class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'button_show',
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