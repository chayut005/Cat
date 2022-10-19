<div class="container-xxl flex-grow-1 container-p-y">
<!-- <h1>PERMISSION</h1> -->
<img style=" min-width: 170px; width: 25%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/p.png" alt="user">
    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">


                            <div class="row">
                                <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">
                                    <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                        <button type="button" onclick="get_data_permission_group()" class="btn  btn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_data_permission">
                                            <i style="    margin-bottom: 3%;" class='bx bx-shield'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <table id="datatable_permission" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">Permission Name</th>
                                        <th style="text-align:center;">Permission Group</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Permission Status</th>
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
<div class="modal fade" id="modal_add_data_permission" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">CREATE PERMISSION</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_permission" class="was-validated">
                    <div class="row">
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Permission Name:</label>
                            <input type="text" class="form-control" name="permission_name" placeholder="Enter Permission Name....." required>


                        </div>
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Controller/Method:</label>
                            <input type="text" class="form-control" name="controller_method" placeholder="Enter Controller/Method....." required>


                        </div>
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">

                            <label>Permission Group:</label>
                            <select id="html_permission_group" name="group_permission" class="form-control" required>
                                <option selected value="">--- Permission Group ---</option>
                            </select>


                        </div>
                        <div class="col lg-12 col-mb-12 col-sm-12 my-3 input-group-sm">
                            <label>
                                <input id="status_enable_permission" checked name="status_permission" value="1" type="radio">
                                Enable</label>
                            <label>
                                <input name="status_permission" value="0" type="radio">
                                Disable</label>
                        </div>
                    </div>
                    <div style="float: right;"> <button type="reset" class="btn  btn-sm  btn-primary">Clear</button> <button type="button" onclick="create_permission()" class="btn  btn-sm  btn-primary">Create</button></div>
                    <input type="hidden" name="action" value="<?php echo base64_encode('create_permission'); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modal_edit_data_permission" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE PERMISSION</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_edit_permission" class="was-validated">
                    <div class="row">
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Permission Name:</label>
                            <input type="text" class="form-control" name="E_permission_name" placeholder="Enter Permission Name....." required>


                            <input type="hidden" class="form-control" id="E_permission_id" name="E_permission_id">

                        </div>
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Controller/Method:</label>
                            <input type="text" class="form-control" name="E_controller_method" placeholder="Enter Controller/Method....." required>


                        </div>
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">

                            <label>Permission Group:</label>
                            <select id="E_html_permission_group" name="E_group_permission" class="form-control" required>
                                <option selected value="">--- Permission Group ---</option>
                            </select>


                        </div>

                    </div>
                    <div style="float: right; margin-top: 1rem;">
                        <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                        <button type="button" onclick="edit_permission()" class="btn  btn-sm  btn-primary">Update</button>
                    </div>
                    <input type="hidden" name="action" value="<?php echo base64_encode('edit_permission'); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

<script>
    function edit_permission() {
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ Update Permission?",
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
                    url: '<?php echo base_url(); ?>permission/edit_permission',
                    data: $('#form_edit_permission').serialize(),
                    success: function(reply_edit_permission) {
                        // console.log(reply_edit_permission)
                        if (reply_edit_permission !== true && reply_edit_permission !== false) {
                            Swal.fire({
                                html: "<p>" + reply_edit_permission + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_edit_permission === true) {
                            Swal.fire({
                                html: "<p>Update Permission</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_edit_data_permission').modal('hide')
                        } else if (reply_edit_permission === false) {
                            Swal.fire({
                                html: "<p>Update Permission</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function clear_data_create_permission() {
        event.preventDefault()
        $('input[name=E_permission_id]').val('')
        $('input[name=permission_name]').val('')
        $('input[name=controller_method]').val('')
        $('select[name=group_permission]').val('')
        $("#status_enable_permission").prop("checked", true);
        $('input[name=E_permission_name]').val('')
        $('input[name=E_controller_method]').val('')
        $('select[name=E_group_permission]').val('')

    }

    function modal_get_edit_data_permission(permission_id) {
        event.preventDefault()
        // alert(permission_id)
        clear_data_create_permission()
        var check_permissom_geoup = "";
        var E_html_permission_group = "";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>permission/data_edit_permission',
            data: {
                permission_id: permission_id
            },
            success: function(data_per) {
                console.log(data_per)

                $.each(data_per, function(key_per, val_per) {
                    $('input[name=E_permission_name]').val(val_per.p_name)
                    $('input[name=E_controller_method]').val(val_per.controller)
                    $('input[name=E_permission_id]').val(permission_id)

                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>permission_group/get_data_permission_group',
                        success: function(data_permission_group) {
                            // console.log(data_permission_group)
                            E_html_permission_group = '';
                            E_html_permission_group = '<option  value="">--- Permission Group ---</option>';
                            $.each(data_permission_group, function(key, val) {
                                if (val.pg_id === val_per.pg_id) {
                                    check_permissom_geoup = 'selected';
                                }
                                E_html_permission_group += '<option  value="' + val.pg_id + '"  ' + check_permissom_geoup + '>' + val.pg_name + '</option>'
                                check_permissom_geoup = "";
                            })
                            $("#E_html_permission_group").html(E_html_permission_group)
                        }
                    })

                })
                $('#modal_edit_data_permission').modal('show')
            }

        })

    }

    function button_re_permission(permission_id) {
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
                    url: '<?php echo base_url(); ?>permission/re_permission',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_id: permission_id
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

    function button_delete_permission(permission_id) {
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
                    url: '<?php echo base_url(); ?>permission/delete_permission',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_id: permission_id
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

    function button_enable_permission(permission_id) {
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
                    url: '<?php echo base_url(); ?>permission/enable_permission',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_id: permission_id
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

    function button_disable_permission(permission_id) {
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
                    url: '<?php echo base_url(); ?>permission/disable_permission',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        permission_id: permission_id
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

    function create_permission() {
        event.preventDefault()
        // alert($('#form_permission').serialize())
        Swal.fire({
            title: "ต้องการ Create Permission?",
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
                    url: '<?php echo base_url(); ?>permission/create_permission',
                    data: $('#form_permission').serialize(),
                    success: function(reply_create_permission) {
                        // console.log(reply_create_permission)
                        if (reply_create_permission !== true && reply_create_permission !== false) {
                            Swal.fire({
                                html: "<p>" + reply_create_permission + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_create_permission === true) {
                            // alert('dfhdfh')
                            Swal.fire({
                                html: "<p>Create Permission</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_add_data_permission').modal('hide')
                        } else if (reply_create_permission === false) {
                            Swal.fire({
                                html: "<p>Create Permission</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function get_data_permission_group() {
        event.preventDefault()
        clear_data_create_permission()
        html_permission_group = ""
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>permission_group/get_data_permission_group',
            success: function(data_permission_group) {
                // console.log(data_permission_group)
                html_permission_group = '';
                html_permission_group = '<option selected value="">--- Permission Group ---</option>';
                $.each(data_permission_group, function(key, val) {
                    html_permission_group += '<option  value="' + val.pg_id + '">' + val.pg_name + '</option>'
                })
                $("#html_permission_group").html(html_permission_group)
            }
        })

    }

    $(document).ready(function() {


        var cnt = 1;
        var table = $('#datatable_permission').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],
            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>permission/data_permission',
                type: 'post',
                dataType: 'json',
                // data: function(data) {}
            },
            columns: [{
                    data: "p_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: 'p_name'
                },
                {
                    data: 'pg_name'
                },
                {
                    data: 'p_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_p === '1') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_disable_permission(' + data + ')"  class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault"></div>'
                            } else if (row.status_p === '0') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_enable_permission(' + data + ')"  class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault"></div>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'p_id',
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
                    data: 'p_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.del_flag === '1') {
                                data_html = '<a onclick="button_re_permission(' + data + ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>'
                            } else if (row.del_flag !== '1') {
                                data_html = ''
                                if (row.status_p === '1') {
                                    data_html += '<a onclick="modal_get_edit_data_permission(' + data + ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>'
                                } else if (row.status_p === '0') {
                                    data_html += ''
                                }
                                data_html += '<a onclick="button_delete_permission(' + data + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
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