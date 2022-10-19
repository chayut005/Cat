<style>
    .columns {
        display: block;
        margin: auto;
    }

    .column {

        background: #ffffff;
        border: #000013 0.2rem solid;
        border-radius: 5px;
    }

    .column-header {
        background: #cbe2ff;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li {
        list-style-type: none;
    }

    .task {
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        background-color: #f3f3f3 !important;
        list-style-type: none;
        background: #fff;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        margin: 0.2rem;
        height: 2.5rem;
        border-radius: 5px;
        cursor: move;
        text-align: center;
        vertical-align: middle;
    }

    .task p {
        margin: auto;
    }

    .gu-mirror {
        position: fixed !important;
        margin: 0 !important;
        z-index: 9999 !important;
        opacity: 0.8;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
        filter: alpha(opacity=80);
    }

    .gu-hide {
        display: none !important;
    }

    .gu-transit {
        opacity: 0.2;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
        filter: alpha(opacity=20);
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
<!-- <h1>MANAGE GROUP</h1> -->
<img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/mg.png" alt="user">

    <div class="row">
        <div class="col-lg-9 col-mb-9 col-sm-9 order-0 my-1">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">
                                    <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                        <button onclick="clear_data_group()" type="button" class="btn  btn-sm  btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_data_group">
                                            <i style="    margin-bottom: 3%;" class='bx bx-group'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <table id="datatable_group" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Status Group</th>
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

        <div class="col-sm-3 col-mb-3 col-sm3 my-1">
            <div class="card">
                <div class="card-body">


                    <div class="main-container">
                        <ul class="columns">

                            <li>
                                <div>
                                    <h5 class="column-header">Oder Group</h5>
                                </div>
                                <ul class="task-list" id="to-do">



                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>





</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_add_data_group" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">CREATE GROUP</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_create_froup" class="was-validated">
                    <div class="row">
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">
                            <label>Group Name:</label>
                            <input type="text" class="form-control" name="group_name" placeholder="Enter Group Name ....." required>


                        </div>
                        <div class="col lg-12 col-mb-12 col-sm-12 my-3">
                            <label>
                                <input id="status_enable_group" checked name="status_group" value="1" type="radio">
                                Enable</label>
                            <label>
                                <input name="status_group" value="0" type="radio">
                                Disable</label>
                        </div>
                    </div>
                    <div style="float: right;">
                        <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                        <button onclick="create_data_group()" type="button" class="btn btn-sm  btn-primary">Create</button>
                        <input type="hidden" name="action" value="<?php echo base64_encode('create_group'); ?>">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modal_edit_data_group" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE GROUP</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_edit_group" class="was-validated">
                    <div class="row">
                        <div class="col-lg-12 col-mb-12 col-sm-12 input-group-sm">
                            <label>Group Name:</label>
                            <input type="text" class="form-control" name="E_group_name" placeholder="Enter Group Name ....." required>


                            <input type="hidden" class="form-control" name="E_group_id" readonly>

                        </div>
                        <div class="col-lg-12 col-mb-12 col-sm-12  my-3">
                            <div class="row" id="html_list_permission_group"></div>
                        </div>
                    </div>
                    <div style="float: right;  margin-top: 1rem;">
                        <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                        <button onclick="edit_data_group()" type="button" class="btn btn-sm  btn-primary">Upadte</button>
                        <button onclick="apply_data_group()" type="button" class="btn btn-sm  btn-primary">Apply</button>
                        <input type="hidden" name="action" value="<?php echo base64_encode('edit_group'); ?>">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

<script>

    function testss(data) {
        // alert(data)
        var numberList, taskId;
        var x = document.getElementsByClassName('task');
        var new_x = x.length
        for (var i = 0; i < x.length - 1; i++) {
            taskId = x[i].value;
            numberList = i + 1;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo base_url(); ?>group/set_order_group',
                data: {
                    g_id: taskId,
                    numberList: numberList
                },
                success: function(data) {
                    // console.log(data)

                }
            })
            // console.log(numberList)
        }
    }
    dragula([
        document.getElementById("to-do"),
    ]);

    function addTask() {
        var html_order = '';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>group/data_order_group',
            success: function(data_group) {

                $.each(data_group, function(key_g, val_g) {
                    html_order += "<li ontouchend ='testss(" + val_g.g_id + ")' onmouseup='testss(" + val_g.g_id + ")' value='" + val_g.g_id + "' class='task'><p>" + val_g.g_name + "</p></li>";
                })
                // console.log(html_order)
                $("#to-do").html(html_order)
            }
        })
    }

    function clear_data_group() {
        event.preventDefault()
        $('input[name=E_group_id]').val('')
        $('input[name=E_group_name]').val('')
        $('input[name=group_name]').val('')
        $("#status_enable_group").prop("checked", true);
    }

    function apply_data_group() {
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ Apply Group?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert($('#form_edit_group').serialize())
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>group/apply_group',
                    data: $('#form_edit_group').serialize(),
                    success: function(reply_group) {
                        console.log(reply_group)
                        // alert(reply_group)
                        if (reply_group !== true && reply_group !== false) {
                            Swal.fire({
                                html: "<p>" + reply_group + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_group === true) {
                            Swal.fire({
                                html: "<p>Apply Grouup</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_edit_data_group').modal('hide')
                        } else if (reply_group === false) {
                            Swal.fire({
                                html: "<p>Apply Grouup</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })
    }

    function edit_data_group() {
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ Update Group?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert($('#form_edit_group').serialize())
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>group/edit_group',
                    data: $('#form_edit_group').serialize(),
                    success: function(reply_group) {
                        // console.log(reply_group)
                        // alert(reply_group)
                        if (reply_group !== true && reply_group !== false) {
                            Swal.fire({
                                html: "<p>" + reply_group + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_group === true) {
                            Swal.fire({
                                html: "<p>Update Grouup</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_edit_data_group').modal('hide')
                        } else if (reply_group === false) {
                            Swal.fire({
                                html: "<p>Update Grouup</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })
    }

    function modal_get_data_group(group_id) {
        // alert(group_id)
        clear_data_group()
        var check_list_permissom_geoup = "";
        var html_list_permission_group = "";
        var check
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>group/data_edit_group',
            data: {
                group_id: group_id
            },
            success: function(data_group) {
                $.each(data_group, function(key_per_g, val_group) {
                    $('input[name=E_group_name]').val(val_group.g_name)
                    $('input[name=E_group_id]').val(group_id)

                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>permission_group/list_data_permission_group',
                        success: function(data_list_per_g) {
                            // console.log(data_list_per_g)
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: '<?php echo base_url(); ?>group/list_data_group_permission_group',
                                data: {
                                    group_id: group_id
                                },
                                success: function(data_list_group) {
                                    // console.log(data_list_group)

                                    $.each(data_list_per_g, function(key_list_per_g, val_list_per_g) {
                                        $.each(data_list_group, function(key_list_group, val_list_group) {
                                            if (val_list_group.pg_id === val_list_per_g.pg_id) {
                                                check_list_permissom_geoup = 'checked="checked"'
                                            }
                                        })
                                        html_list_permission_group += "<div class = 'col-lg-6 col-sm-6 col-sm-6'>"
                                        // html_list_permission_group += "<p>"
                                        html_list_permission_group += "<label>"
                                        html_list_permission_group += "<input type='checkbox' name='chkRid[]' value='" + val_list_per_g.pg_id + "' " + check_list_permissom_geoup + " >&nbsp;";
                                        html_list_permission_group += " <span>" + val_list_per_g.pg_name + "</span>";
                                        html_list_permission_group += "</label>"
                                        // html_list_permission_group += "</p>"
                                        html_list_permission_group += "</div>"
                                        check_list_permissom_geoup = ""
                                    })
                                    // console.log(html_list_permission_group)
                                    $("#html_list_permission_group").html(html_list_permission_group)
                                    // console.log(data_list_group)
                                }
                            })
                            // console.log(data_list_per_g)
                        }
                    })
                })
                $('#modal_edit_data_group').modal('show')
            }

        })

    }

    function button_re_group(group_id) {
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
                    url: '<?php echo base_url(); ?>group/re_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        group_id: group_id
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

    function button_delete_group(group_id) {
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
                    url: '<?php echo base_url(); ?>group/delete_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        group_id: group_id
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

    function button_enable_group(group_id) {
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
                    url: '<?php echo base_url(); ?>group/enable_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        group_id: group_id
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

    function button_disable_group(group_id) {
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
                    url: '<?php echo base_url(); ?>group/disable_group',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        group_id: group_id
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

    function create_data_group() {
        // alert($('#form_create_froup').serialize())
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ Create Group?",
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
                    url: '<?php echo base_url(); ?>group/create_group',
                    data: $('#form_create_froup').serialize(),
                    success: function(reply_group) {
                        // console.log(reply_group)
                        if (reply_group !== true && reply_group !== false) {
                            Swal.fire({
                                html: "<p>" + reply_group + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_group === true) {
                            Swal.fire({
                                html: "<p>Create Grouup</p><p>Success</p>",
                                icon: 'success',
                            })
                            addTask()
                            $('#modal_add_data_group').modal('hide')
                        } else if (reply_group === false) {
                            Swal.fire({
                                html: "<p>Create Grouup</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }

                })
            }
        })
    }
    $(document).ready(function() {

        addTask();
        var cnt = 1;
        var table = $('#datatable_group').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],
            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>group/data_group',
                type: 'post',
                dataType: 'json',
                // data: function(data) {}
            },
            columns: [{
                    data: "g_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: 'g_name'
                },
                {
                    data: 'g_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_g === '1') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_disable_group(' + data + ')"  class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault"></div>'
                            } else if (row.status_g === '0') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_enable_group(' + data + ')"  class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"></div>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'g_id',
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
                    data: 'g_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.del_flag === '1') {
                                data_html = '<a onclick="button_re_group(' + data + ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>'
                            } else if (row.del_flag !== '1') {
                                data_html = ''
                                if (row.status_g === '1') {
                                    data_html += '<a onclick="modal_get_data_group(' + data + ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>'
                                } else if (row.status_g === '0') {
                                    data_html += ''
                                }
                                data_html += '<a onclick="button_delete_group(' + data + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
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