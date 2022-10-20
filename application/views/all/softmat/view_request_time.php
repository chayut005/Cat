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
    <!-- <h1>MANAGE QUEST</h1> -->
    <img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/rt.png" alt="user">
    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <div class="card mb-4">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">


                                    <div id="show_department_data" style="float: left; margin-bottom:5px;" class=" input-group-outline  input-group-sm">
                                        <!-- <label>Department:</label> -->

                                        <input id="search_department" type="hidden" value="All">
                                    </div>




                                    <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_time_request">
                                            <i style="    margin-bottom: 3%;" class='bx  bxs-analyse'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                        </button>
                                    </div>
                                </div>

                            </div>



                            <div class="nav-align-top mb-4">
                                <ul class="nav nav-pills mb-3" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-card" aria-controls="navs-pills-justified-card" aria-selected="true">
                                            Card
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-table" aria-controls="navs-pills-justified-table" aria-selected="false">
                                            Table
                                        </button>
                                    </li>

                                </ul>

                                <div class="tab-content">
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
                                    <div class="tab-pane fade" id="navs-pills-justified-table" role="tabpanel">
                                        <table id="data_request_time" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">No</th>
                                                    <th style="text-align:center;">Department</th>
                                                    <th style="text-align:center;">Request Name</th>
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
    </div>
</div>








<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_update_time_request" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE TIME REQUEST</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="update_request_time" class="was-validated">
                    <div class="row">
                        <div class="col-lg-6 col-mb-12 col-sm-12 input-group-sm">
                            <label>Department Name:</label>
                            <input disabled type="text" class="form-control" id="dep_name_t" placeholder="Name.....">
                            <input type="hidden" class="form-control" id="dep_id" name="dep_id" required>
                        </div>
                        <div class="col-lg-6 col-mb-12 col-sm-12  ">
                            <label>Time Requst:</label>
                            <div class="input-group input-group-sm">
                                <input type="number" id="u_re_date" name="u_re_date" class="form-control" value="0" min="0" max="365" required /> <span class="input-group-text">d</span>
                                <input type="number" id="u_re_time_h" name="u_re_time_h" class="form-control" value="0" min="0" max="23" required /> <span class="input-group-text">h</span>
                                <input type="number" id="u_re_time_m" name="u_re_time_m" class="form-control" value="0" min="0" max="60" required /> <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <div style="float: right;">
                            <button type="button" onclick="update_request_time()" class="btn  btn-sm  btn-primary">Update</button>
                        </div>
                        <input type="hidden" name="action" value="<?php echo base64_encode('update_request_time'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_add_time_request" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">SAVE TIME REQUEST</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="add_request_time" class="was-validated">
                    <div class="row">
                        <div class="col-lg-6 col-mb-12 col-sm-12">
                            <div class=" input-group-outline input-group-sm">
                                <label>Department:</label>
                                <select style="pointer-events: none;" id="html_department_time" name="add_re_dep" class="form-control" readonly required>
                                    <option selected value="">--- Department ---</option>
                                </select>

                            </div>
                            <input type="hidden" class="form-control" id="dep_id_add" value="<?php echo $this->session->userdata('sessDep') ?>" name="dep_id_add" required>
                        </div>
                        <div class="col-lg-6 col-mb-12 col-sm-12  ">
                            <label>Time Requst:</label>
                            <div class="input-group input-group-sm">
                                <input type="number" id="add_re_date" name="add_re_date" class="form-control" value="0" min="0" max="365" required /> <span class="input-group-text">d</span>
                                <input type="number" id="add_re_time_h" name="add_re_time_h" class="form-control" value="0" min="0" max="23" required /> <span class="input-group-text">h</span>
                                <input type="number" id="add_re_time_m" name="add_re_time_m" class="form-control" value="0" min="0" max="60" required /> <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <div style="float: right;">
                            <button type="button" onclick="add_request_time()" class="btn  btn-sm  btn-primary">Save</button>
                        </div>
                        <input type="hidden" name="action" value="<?php echo base64_encode('add_request_time'); ?>">
                    </div>
                </form>




            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<script>
    function add_request_time() {
        // alert($('#add_request_time').serialize())
        event.preventDefault()
        // alert($('#form_permission').serialize())
        Swal.fire({
            title: "ต้องการ Save Request Time?",
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
                    url: '<?php echo base_url(); ?>set_time/save_request_time',
                    data: $('#add_request_time').serialize(),
                    success: function(reply_request) {
                        // console.log(reply_request)
                        if (reply_request !== true && reply_request !== false) {
                            Swal.fire({
                                html: "<p>" + reply_request + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_request === true) {
                            // alert('dfhdfh')
                            Swal.fire({
                                html: "<p>Save Request Time</p><p>Success</p>",
                                icon: 'success',
                            })
                            data_request_table()
                            $('#modal_add_time_request').modal('hide')
                        } else if (reply_request === false) {
                            Swal.fire({
                                html: "<p>Save Request Time</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })
    }

    function button_delete_request_time(dep_id) {
        event.preventDefault();

        // alert(  '==>' + dep_id)
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
                    url: '<?php echo base_url(); ?>set_time/delete_request_time',
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
                            data_request_table()
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

    function update_request_time() {
        event.preventDefault()
        // alert($('#form_permission').serialize())
        Swal.fire({
            title: "ต้องการ Update Request?",
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
                    url: '<?php echo base_url(); ?>set_time/update_request_time',
                    data: $('#update_request_time').serialize(),
                    success: function(reply_request) {
                        // console.log(reply_request)
                        if (reply_request !== true && reply_request !== false) {
                            Swal.fire({
                                html: "<p>" + reply_request + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply_request === true) {
                            // alert('dfhdfh')
                            Swal.fire({
                                html: "<p>Update Request Time</p><p>Success</p>",
                                icon: 'success',
                            })
                            data_request_table()
                            $('#modal_update_time_request').modal('hide')
                        } else if (reply_request === false) {
                            Swal.fire({
                                html: "<p>Update Request Time</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function modal_get_time_request(dep_id) {
        // alert(pri_id + '==>' + dep_id)
        event.preventDefault()
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/data_time_request',
            data: {
                dep_id: dep_id
            },
            success: function(data_re_time) {
                // console.log(data_re_time)
                $.each(data_re_time, function(key_r, val_r) {
                    $('#dep_name_t').val(val_r.dep_name)
                    $('#u_re_date').val(val_r.date_e)
                    $('#u_re_time_h').val(val_r.h_e)
                    $('#u_re_time_m').val(val_r.m_e)
                    $('#dep_id').val(dep_id)


                })
                $('#modal_update_time_request').modal('show');
            }
        })

    }

    $(document).ready(function() {
        department()
        var cnt = 1;
        var table = $('#data_request_time').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],form_update_time_pri data_priority_check_add
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],

            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>set_time/data_request_table',
                type: 'post',
                dataType: 'json',
                // data: function(data) {
                //     data.start_date = $('#start_date').val();
                //     data.end_date = $('#end_date').val()
                // }
            },
            columns: [{
                    data: "dep_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "dep_name"
                },
                {
                    data: 'dep_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            // const myArray = row.time_dep.split(" ");
                            data_html = '<div>' + row.date_e + '  (' + row.h_e + ':' + row.m_e + ')' + '</div>'
                        }
                        return data_html;
                    }
                },
                {
                    data: 'dep_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            data_html = ''
                            data_html += '<a onclick="modal_get_time_request(' + data + ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a><a onclick="button_delete_request_time(' + data + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
                        }
                        return data_html;
                    }
                }
            ]
        });
        setInterval(function() {
            table.ajax.reload(null, false);
            cnt = 1;
        }, 1000);
        data_request_table()
    });
    // setInterval(data_request_table, 1000)

    function data_request_table() {

        var html_re = '';

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>set_time/data_request_all',
            success: function(re_data) {
                // console.log(re_data)

                $.each(re_data, function(key_re, val_re) {
                    // alert(val_re.dep_name) <i class='bx bx-edit'></i> <i class='bx bxs-trash' ></i>
                    // html_re = ''<img src="" alt="profile-picture" title="Someone Famous" />

                    html_re += '<li  style="    padding-bottom: 20px;">'
                    html_re += '<div style="cursor: -webkit-grab; cursor: grab;" class="box-container">'
                    html_re += '<div  class="card card2">'
                    html_re += '<div class="card-body">'
                    html_re += '<div>'
                    html_re += '<img style="    object-fit: cover;display: block;margin: auto;height: 180px;width: 180px;border-radius: 50%;" src="https://jennfortner.files.wordpress.com/2015/11/tgno7v6.gif" alt=""/>'
                    html_re += '</div>'
                    html_re += '<div class="content">'
                    html_re += '<h3 class="title">' + val_re.dep_name + '</h3><span>Time Request</span>'
                    html_re += '<p>' + val_re.date_e + ' Day ' + val_re.h_e + ' hour ' + val_re.m_e + ' minute ' + '</p>'
                    html_re += '</div>'
                    html_re += '<div class="button-wrapper">'
                    html_re += '<a   onclick="modal_get_time_request(' + val_re.dep_id + ')" href="" style="float: left;" type="button" class="btn  btn-sm btn-primary ">'
                    html_re += '<span class="d-none d-sm-block">Edit</span>'
                    html_re += '<i class="bx bx-edit d-block d-sm-none"></i>'
                    html_re += '</a>'
                    html_re += '<a onclick="button_delete_request_time(' + val_re.dep_id + ')" href="" style="float: right;" type="button" onclick="" class="btn btn-sm btn-danger ">'
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



    function department() {
        dep_id = <?php echo $this->session->userdata('sessDep') ?>;
        // alert(dep)
        var html_a_dep = '';
        var check = '';

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/department_data',
            success: function(department_data) {
                // console.log(department_data)

                html_a_dep = '';
                html_a_dep += '<option selected value="">--- Department ---</option>';
                $.each(department_data, function(key_dep, val_dep) {
                    if (val_dep.dep_id == dep_id) {
                        check = 'selected';
                    }
                    html_a_dep += '<option  ' + check + '  value="' + val_dep.dep_id + '">' + val_dep.dep_name + '</option>'
                    check = '';
                })
                // console.log(html_a_dep)
                $("#html_department_time").html(html_a_dep)
            }
        })
    }
</script>