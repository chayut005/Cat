<div class="container-xxl flex-grow-1 container-p-y">
<!-- <h1>PERMISSION GEOUP</h1> -->
<img style=" min-width: 170px; width: 35%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/pg.png" alt="user">

    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">


                            <div class="row">
                                <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">
                                    <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                        <button onclick="button_clear_data_create_permission_group()" type="button" class="btn  btn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_data_permission_group">
                                            <i style="    margin-bottom: 3%;" class='bx bx-shield-quarter'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                        </button>
                                    </div>
                                </div>

                            </div>


                            <table id="datatable_permission_group" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Status Permission Group</th>
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


<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_add_data_permission_group" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">CREATE PERMISSION GROUP</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_permission_group" action="" class="was-validated">
                    <div class="row">
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">
                            <label>Permission Group Name:</label>
                            <input type="text" class="form-control" name="permission_group_name" placeholder="Enter Permission Group Name....." required>


                        </div>
                        <div class="col lg-12 col-mb-12 col-sm-12 my-3">
                            <label>
                                <input id="status_enable_permission_group" checked name="status_permission_group" value="1" type="radio">
                                Enable</label>
                            <label>
                                <input name="status_permission_group" value="0" type="radio">
                                Disable</label>
                        </div>
                    </div>
                    <div style="float: right;">
                        <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                        <button type="button" onclick="button_create_permission_group()" class="btn  btn-sm btn-primary">Create</button>
                    </div>
                    <input type="hidden" name="action" value="<?php echo base64_encode('create_permission_group'); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modal_edit_data_permission_group" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE PERMISSION GROUP</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit_permission_group" action="" class="was-validated">
                    <div class="row">
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">
                            <label>Permission Group Name:</label>
                            <input type="text" class="form-control" name="E_permission_group_name" placeholder="Enter Permission Group Name....." required>


                            <input type="hidden" class="form-control" name="E_permission_group_id" readonly>
                        </div>
                    </div>
                    <div style="float: right;  margin-top: 1rem;">
                        <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                        <button type="button" onclick="edit_permission_group()" class="btn  btn-sm btn-primary">Update</button>
                    </div>
                    <input type="hidden" name="action" value="<?php echo base64_encode('edit_permission_group'); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->


<script>
    function button_clear_data_create_permission_group() {
        event.preventDefault()

        $('input[name=E_permission_group_id]').val('')
        $('input[name=permission_group_name]').val('')
        $('input[name=E_permission_group_name]').val('')
        $("#status_enable_permission_group").prop("checked", true);

    }

    function button_re_permission_group(permission_group_id) {
        // alert(permission_group_id)
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
                    url: '<?php echo base_url(); ?>permission_group/re_permission_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_group_id: permission_group_id
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

    function button_delete_permission_group(permission_group_id) {
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
                    url: '<?php echo base_url(); ?>permission_group/delete_permission_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_group_id: permission_group_id
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

    function button_enable_permission_group(permission_group_id) {
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
                    url: '<?php echo base_url(); ?>permission_group/enable_permission_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_group_id: permission_group_id
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

    function button_disable_permission_group(permission_group_id) {
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
                    url: '<?php echo base_url(); ?>permission_group/disable_permission_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_group_id: permission_group_id
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

    function edit_permission_group() {
        event.preventDefault()
        // alert($('#form_edit_permission_group').serialize())
        Swal.fire({
            title: "ต้องการ Update Permission Group?",
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
                    url: '<?php echo base_url(); ?>permission_group/edit_permission_group',
                    data: $('#form_edit_permission_group').serialize(),
                    success: function(reply_edit_permission_group) {
                        // console.log(reply_edit_permission_group)
                        if (reply_edit_permission_group !== true && reply_edit_permission_group !== false) {
                            Swal.fire({
                                html: "<p>" + reply_edit_permission_group + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_edit_permission_group === true) {
                            Swal.fire({
                                html: "<p>Update Permission Group</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_edit_data_permission_group').modal('hide')
                        } else if (reply_edit_permission_group === false) {
                            Swal.fire({
                                html: "<p>Update Permission Group</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function modal_get_data_permission_group(permission_group_id) {
        button_clear_data_create_permission_group()

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>permission_group/data_edit_permission_group',
            data: {
                permission_group_id: permission_group_id
            },
            success: function(data_per_g) {
                $.each(data_per_g, function(key_per_g, val_per_g) {
                    $('input[name=E_permission_group_name]').val(val_per_g.pg_name)
                    $('input[name=E_permission_group_id]').val(permission_group_id)
                })
                $('#modal_edit_data_permission_group').modal('show')
            }

        })
    }

    function button_create_permission_group() {
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ Create Permission Group?",
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
                    url: '<?php echo base_url(); ?>permission_group/create_permission_group',
                    data: $('#form_permission_group').serialize(),
                    success: function(reply_permission_group) {
                        // console.log(reply_permission_group)
                        if (reply_permission_group !== true && reply_permission_group !== false) {
                            Swal.fire({
                                html: "<p>" + reply_permission_group + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_permission_group === true) {
                            Swal.fire({
                                html: "<p>Create Permission Grouup</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_add_data_permission_group').modal('hide')
                        } else if (reply_permission_group === false) {
                            Swal.fire({
                                html: "<p>Create Permission Grouup</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }

                })
            }
        })

    }

    $(document).ready(function() {

        $.fn.DataTable.ext.pager.numbers_length = 5;
        var cnt = 1;
        var table = $('#datatable_permission_group').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],
            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>permission_group/data_permission_group',
                type: 'post',
                dataType: 'json',
                // data: function(data) {}
            },
            columns: [{
                    data: "pg_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: 'pg_name'
                },
                {
                    data: 'pg_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_pg === '1') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_disable_permission_group(' + data + ')"  class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault"></div>'
                            } else if (row.status_pg === '0') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_enable_permission_group(' + data + ')"  class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault"></div>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'pg_id',
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
                    data: 'pg_id',
                    "render": function(data, type, row, meta) {

                        if (type === 'display') {
                            if (row.del_flag === '1') {
                                data_html = '<a onclick="button_re_permission_group(' + data + ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>'
                            } else if (row.del_flag !== '1') {
                                data_html = ''
                                if (row.status_pg === '1') {
                                    data_html += '<a onclick="modal_get_data_permission_group(' + data + ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>'
                                } else if (row.status_pg === '0') {
                                    data_html += ''
                                }
                                data_html += '<a onclick="button_delete_permission_group(' + data + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
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