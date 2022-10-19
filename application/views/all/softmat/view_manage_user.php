<style>
    .setting_img_edit_user {
        height: 145px;
        width: 145px;
        object-fit: cover;

        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .setting_img_list_edit_user {
        height: 79px;
        width: 79px;
        object-fit: cover;

        display: block;
        margin-left: auto;
        margin-right: auto;
    }


    .border_img {
        border-radius: 50% !important;
    }


    .setting_img_add_user {
        height: 140px;
        width: 140px;
        object-fit: cover;
        display: block;
        margin: auto;
    }

    .setting_img_manage_user {
        height: 25px;
        width: 25px;
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
    <!-- <h1>MANAGE USERS</h1> -->
    <img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/mus.png" alt="user">

    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <div class="card">
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

                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_user">
                                            <i style="    margin-bottom: 3%;" class='bx bx-user'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <table id="datatable_user" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">User</th>
                                        <th style="text-align:center;">Username</th>
                                        <th style="text-align:center;">Department</th>
                                        <th style="text-align:center;">Name</th>
                                        <th style="text-align:center;">Group</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Account Status</th>
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
<input type="hidden" id="user_id" value="<?php echo $this->session->userdata('sessUsrId') ?> " readonly>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modal_add_user" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">ADD USER</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_add_user" class="was-validated">
                    <div class="row">
                        <div class="col-lg-3 mb-5 sm-5 order-0">




                            <div style="padding-top: 20px;">
                                <div>
                                    <img id="img_user_name" class="setting_img_add_user border_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
                                </div>

                                <div style="text-align: center; margin-top:25px;">
                                    <h6>
                                        <div><span style="background-color:#554aff; border-radius:4px; color:#ffffff;  padding: 2px 20px 3px 20px;"><a onclick="$('#img_add_user').click()"><i style="font-size: 20px;" class='bx bxs-camera'></i></a></span></div>
                                    </h6>
                                    <input id="img_add_user" type="file" onchange="update_img_user(this)" name="img_add_user" accept="image/png, image/gif, image/jpeg" hidden readonly>
                                </div>

                            </div>



                        </div>

                        <div class="col-lg-9 mb-7 sm-7 order-0">
                            <div class="card">

                                <div class="d-flex align-items-end ">


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label class="margin_top_fig ">Username: <span style="color:red">*</span></label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" id="a_username" name="a_username" placeholder="Username" aria-label="username" aria-describedby="button-addon2" required>
                                                    <button class="btn  btn-sm btn-secondary" onclick="check_api_user($('#a_username').val())" type="button"><i id="load_check" class='bx bx-user-check'></i></button>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig input-group-sm">
                                                    <label>ID Line:</label>
                                                    <input type="text" name="a_line" class="form-control" placeholder="Line........" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig input-group-sm">
                                                    <label>Email:</label>
                                                    <input type="email" name="a_email" class="form-control" placeholder="Email........" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 margin_top_fig">
                                                <div class="form-password-toggle">
                                                    <label for="a_pass">Password:</label>
                                                    <div class="input-group input-group-sm">
                                                        <input type="password" class="form-control" id="a_pass" name="a_pass" placeholder="Password........" required />
                                                        <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig input-group-sm">
                                                    <label>Firstname:</label>
                                                    <input type="text" name="a_f_name" class="form-control" placeholder="Firstname........" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig input-group-sm">
                                                    <label>Lastname:</label>
                                                    <input type="text" name="a_l_name" class="form-control" placeholder="Lastname........" required>
                                                </div>
                                            </div>



                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig input-group-sm">
                                                    <label>Department:</label>
                                                    <select id="html_a_dep" name="a_dep" class="form-control" required>
                                                        <option selected value="0">--- Department ---</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig input-group-sm">
                                                    <label>Group:</label>
                                                    <select id="html_a_group" name="a_group" class="form-control" required>
                                                        <option selected value="0">--- Group ---</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div style=" float:right;" class="margin_top_fig">
                        <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                        <button id="nextcolor" onclick="send_data_add_user()" type="submit" class="btn  btn-sm  btn-success">Save</button>


                        <input type="hidden" name="action" value="<?php echo base64_encode('add_user'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<div class="modal fade" id="modal_data_edit_user" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">UPDATE USER</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit_user" class="was-validated" action="">
                    <div class="row">
                        <div class="col-lg-3 mb-4 sm-4 order-0">
                            <div style="    padding: 0.5px 0px 7.5px 0px;" class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">


                                        <div class="">
                                            <img id="img_edit_user_name" class="setting_img_edit_user border_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
                                            <div style="text-align: center; margin-top:10px;">
                                                <h6>
                                                    <div id="user_edit_name_img">xxxxx</div>
                                                </h6>
                                                <h6>
                                                    <div><span style="background-color:#554aff; border-radius:4px; color:#ffffff;  padding: 2px 20px 3px 20px; "><a onclick="$('#img_edit_user').click()"><i style="font-size: 20px;" class='bx bxs-camera'></i></a></span></div>
                                                </h6>
                                                <input id="img_edit_user" type="file" onchange="edit_img_user(this)" name="img_edit_user" accept="image/png, image/gif, image/jpeg" hidden readonly>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 mb-9 sm-12 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end ">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-6 col-mb-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig  input-group-sm">
                                                    <label>Username:</label>
                                                    <input type="text" name="E_username" class="form-control" placeholder="Enter Username....." readonly required>
                                                    <input type="hidden" name="E_user_id" class="form-control">

                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-mb-6 col-sm-6 margin_top_fig">
                                                <div class="form-password-toggle">
                                                    <label for="E_password">Password:</label>
                                                    <div class="input-group input-group-sm">
                                                        <input type="password" class="form-control" id="E_password" name="E_password" placeholder="Enter Password........" required />
                                                        <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-mb-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig  input-group-sm">
                                                    <label>First name:</label>
                                                    <input type="text" name="E_fname" class="form-control" placeholder="Enter Firstname....." required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-mb-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig  input-group-sm">
                                                    <label>Last name:</label>
                                                    <input type="text" name="E_lname" class="form-control" placeholder="Enter Lastname....." required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-mb-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig  input-group-sm">
                                                    <label>Line ID:</label>
                                                    <input type="text" name="E_line_id" class="form-control" placeholder="Enter Line_ID....." required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-mb-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig  input-group-sm">
                                                    <label>Email:</label>
                                                    <input type="email" name="E_email" class="form-control" placeholder="Enter Email....." required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-mb-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig  input-group-sm">
                                                    <label>Department:</label>
                                                    <select id="html_dep" name="E_department" class="form-control" required>
                                                        <option selected value="0">--- Department ---</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-mb-6 col-sm-6">
                                                <div class=" input-group-outline margin_top_fig  input-group-sm">
                                                    <label>Group:</label>
                                                    <select id="html_group" name="E_group" class="form-control" required>
                                                        <option selected value="0">--- Group ---</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="hidden" name="action" value="<?php echo base64_encode('edit_user'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="float: right;" class="margin_top_fig">
                        <button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
                        <button type="button" onclick="send_data_edit_user()" class="btn  btn-sm  btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="modal fade" id="modal_data_list_user_permission" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalCenterTitle">SET PERMISSION USER</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_per_user" class="was-validated" action="">
                    <div class="row">
                        <div class="col-lg-3 mb-4 sm-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">


                                        <div class="">

                                            <img id="img_per_user_name" class="setting_img_list_edit_user border_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 mb-4 sm-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <div style="padding: 5px;" class=" input-group-outline margin_top_fig">
                                                    <label>Username:</label>
                                                    <!-- <input type="text" name="list_username" class="form-control" placeholder="Enter Username....."> -->
                                                    <span id="list_usernamne"></span>

                                                    <input type="text" name="user_group_id" class="form-control" hidden readonly>

                                                    <input type="text" name="list_user_id_username" class="form-control" hidden readonly>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6">
                                                <div style="padding: 5px;" class=" input-group-outline margin_top_fig">
                                                    <label>Group:</label>
                                                    <span id="list_group"></span>
                                                    <!-- <input type="text" name="list_username" class="form-control" placeholder="Enter Username....."> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div style="padding: 5px;" class=" input-group-outline margin_top_fig">
                                                    <label>First name:</label>
                                                    <!-- <input type="text" name="list_username" class="form-control" placeholder="Enter Username....."> -->
                                                    <span id="list_fname"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-6">
                                                <div style="padding: 5px;" class=" input-group-outline margin_top_fig">
                                                    <label>Last name:</label>
                                                    <!-- <input type="text" name="list_username" class="form-control" placeholder="Enter Username....."> -->
                                                    <span id="list_lname"></span>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-mb-12 col-sm-12">
                            <div class="row" id="list_permission_user">
                                <!-- <div></div> -->
                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="action" value="<?php echo base64_encode('per_user'); ?>">
                    <div style="float: right;  margin-top: 1rem;">
                        <button type="button" onclick="send_data_per_user()" class="btn  btn-sm  btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<script>
    function check_api_user(user) {
        var username = user.toUpperCase()
        // alert(username)
        if (username != '') {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'http://192.168.82.74:88/ExchangeAPI/GetEmpData/' + username,
                beforeSend: function() {
                    $("#load_check").removeClass("bx-user-check").addClass("bx-loader-circle bx-spin");
                },
                complete: function() {
                    $("#load_check").removeClass("bx-loader-circle bx-spin").addClass("bx-user-check");
                },
                success: function(api_user) {
                    console.log(api_user)
                    $.each(api_user, function(key, val) {
                        // console.log(val.image)
                        if (val.EmpCode === username) {
                            Swal.fire({
                                title: "ต้องการ ใช้ข้อมูล นี้หรือไม่?",
                                text: "หรือไม่",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#35D735',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Use!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const myArray = val.EmpNmEng.split(" ");
                                    $('input[name=a_f_name]').val(myArray[0]);
                                    $('input[name=a_l_name]').val(myArray[1]);



                                    if (val.image !== '') {
                                        $("#img_user_name").attr("src", "data:image/png;base64," + val.image)
                                    } else {
                                        $("#img_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
                                    }
                                    Swal.fire({
                                        html: "<p>Use " + username + "!</p><p>Success!</p><p>Success :Use " + username + "!</p>",
                                        icon: 'success',
                                    })


                                }
                            })
                        } else {
                            Swal.fire({
                                html: "<p>ไม่มี " + username + " ในระบบ!</p><p>กรุณากรอกข้อมูลใหม่!</p><p>Error :User " + username + " not found.!</p>",
                                icon: 'warning',
                            })
                        }
                    })
                }
            })
        } else {
            Swal.fire({
                html: "<p>กรุณากรอกข้อมูล Username!</p><p>Error :Username not found.!</p>",
                icon: 'warning',
            })
        }

    }

    function send_data_per_user() {
        event.preventDefault()

        // alert($('#form_per_user').serialize())
        Swal.fire({
            title: "ต้องการ Update Per User?",
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
                    url: '<?php echo base_url(); ?>Account/edit_per_user',
                    data: $('#form_per_user').serialize(),
                    success: function(reply_per_user) {
                        console.log(reply_per_user)
                        if (reply_per_user !== true && reply_per_user !== false) {
                            Swal.fire({
                                html: "<p>" + reply_per_user + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_per_user === true) {
                            Swal.fire({
                                html: "<p>Update Permission User</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_data_list_user_permission').modal('hide')
                            clear_data()
                        } else if (reply_per_user === false) {
                            Swal.fire({
                                html: "<p>Update  Permission User</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function button_list_permission(user_id) {
        var html_list = "";
        var check_list = "";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
            data: {
                user_id: user_id
            },
            beforeSend: function() {
                $("#img_per_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")

            },
            complete: function() {
                $("#img_per_user_name").attr('style', 'display');
            },
            success: function(data_user) {
                // console.log(data_user);
                $.each(data_user, function(key_user, val_user) {
                    $('#list_group').html('<span>' + val_user.g_name + '</span>')
                    $('#list_usernamne').html('<span>' + val_user.employee + '</span>')
                    $('#list_fname').html('<span>' + val_user.f_name + '</span>')
                    $('#list_lname').html('<span>' + val_user.l_name + '</span>')
                    $('input[name=user_group_id]').val(val_user.g_id);
                    if (val_user.path_img_user !== null && val_user.path_img_user !== '') {
                        $('#img_per_user_name').attr('src', '<?php echo base_url(); ?>' + val_user.path_img_user)
                    } else {
                        $('#img_per_user_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
                    }
                    // alert(val_user.g_id)

                    $('input[name=list_user_id_username]').val(val_user.user_id);
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>Manage_user/get_list_data_permission',
                        data: {
                            user_id: user_id
                        },
                        success: function(data_list_permission) {
                            // console.log(data_list_permission);

                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: '<?php echo base_url(); ?>Manage_user/get_list_data_permission_user',
                                data: {
                                    user_id: user_id
                                },
                                success: function(data_list_permission_user) {
                                    // console.log(data_list_permission_user);

                                    $.each(data_list_permission, function(key_list_per, val_list_per) {
                                        $.each(data_list_permission_user, function(key_list_per_user, val_list_per_user) {
                                            if (val_list_per.p_id === val_list_per_user.p_id) {
                                                check_list = "checked='checked'"
                                            }
                                        })
                                        html_list += "<div class = 'col-lg-4 col-sm-6 col-sm-12'>"
                                        html_list += '<label>'
                                        html_list += '<input type="checkbox" name="chkRid[]"  value="' + val_list_per.p_id + '" ' + check_list + ' >&nbsp;'
                                        html_list += '<span>' + val_list_per.p_name + '</span>'
                                        html_list += '</label>'
                                        html_list += '</div>'
                                        check_list = ""
                                    })
                                    $("#list_permission_user").html(html_list)
                                }
                            });
                        }
                    });
                })
            }
        });
        $('#modal_data_list_user_permission').modal('show')
    }

    function send_data_edit_user() {
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ Update User?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('form_edit_user');
                var form_data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>Account/edit_user',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(reply_edit_user) {
                        // console.log(reply_edit_user)
                        if (reply_edit_user !== true && reply_edit_user !== false) {
                            Swal.fire({
                                html: "<p>" + reply_edit_user + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_edit_user === true) {
                            Swal.fire({
                                html: "<p>Update Employee</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_data_edit_user').modal('hide')
                            clear_data()
                        } else if (reply_edit_user === false) {
                            Swal.fire({
                                html: "<p>Update Employee</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }

    function modal_get_data_user(user_id) {
        event.preventDefault();
        var html_dep = '';
        var check_dep = '';
        var html_group = '';
        var check_group = '';
        clear_data()

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
            data: {
                user_id: user_id
            },
            beforeSend: function() {
                $("#img_edit_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")

            },
            complete: function() {
                $("#img_edit_user_name").attr('style', 'display');
            },
            success: function(data_user) {
                // console.log(data_user)
                $.each(data_user, function(key_user, val_user) {
                    $('input[name=E_username]').val(val_user.employee)
                    $('input[name=E_user_id]').val(user_id)
                    $('input[name=E_fname]').val(val_user.f_name)
                    $('input[name=E_lname]').val(val_user.l_name)
                    $('input[name=E_line_id]').val(val_user.id_line_phon)
                    $('input[name=E_email]').val(val_user.email)
                    $('#user_edit_name_img').html('<span>' + val_user.employee + '</span>')
                    if (val_user.path_img_user !== null && val_user.path_img_user !== '') {
                        $('#img_edit_user_name').attr('src', '<?php echo base_url(); ?>' + val_user.path_img_user)
                    } else {
                        $('#img_edit_user_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
                    }

                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>GET_API/department_data',
                        success: function(data_dep) {
                            // console.log(data_dep)
                            html_dep = ' <option value="">--- Department ---</option>'
                            $.each(data_dep, function(key_dep, val_dep) {
                                if (val_user.dep_id === val_dep.dep_id) {
                                    check_dep = "selected";
                                }
                                html_dep += ' <option value="' + val_dep.dep_id + '" ' + check_dep + '>' + val_dep.dep_name + '</option>'
                                check_dep = '';
                            })
                            $("#html_dep").html(html_dep)
                        }
                    })
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>GET_API/group_data',
                        success: function(data_group) {
                            // console.log(data_group)
                            html_group = ' <option value="">--- Group ---</option>'
                            $.each(data_group, function(key_group, val_group) {
                                if (val_user.g_id === val_group.g_id) {
                                    check_group = "selected";
                                }
                                html_group += ' <option value="' + val_group.g_id + '" ' + check_group + '>' + val_group.g_name + '</option>'
                                check_group = '';
                            })
                            $("#html_group").html(html_group)
                        }
                    })






                })
                $('#modal_data_edit_user').modal('show')
            }
        })


    }

    function send_data_add_user() {
        event.preventDefault()
        Swal.fire({
            title: "ต้องการ Create User?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('form_add_user');
                var form_data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>Account/add_user',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(reply_user) {
                        console.log(reply_user)
                        if (reply_user !== true && reply_user !== false) {
                            Swal.fire({
                                html: "<p>" + reply_user + "</p>",
                                icon: 'warning',
                            })

                        } else if (reply_user === true) {
                            Swal.fire({
                                html: "<p>Create Employee</p><p>Success</p>",
                                icon: 'success',
                            })
                            $('#modal_add_user').modal('hide')
                            clear_data()
                        } else if (reply_user === false) {
                            Swal.fire({
                                html: "<p>Create Employee</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

        // alert(form_data)
    }

    function clear_data() {
        event.preventDefault();
        $('input[name=a_username]').val('')
        $('input[name=a_line]').val('')
        $('input[name=a_email]').val('')
        $('input[name=a_pass]').val('')
        $('input[name=a_f_name]').val('')
        $('input[name=a_l_name]').val('')
        $('input[name=img_add_user]').val('')
        $('select[name=a_dep]').val('')
        $('select[name=a_group]').val('')
        $("#img_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")

        $('input[name=E_fname]').val('')
        $('input[name=E_lname]').val('')
        $('input[name=E_line_id]').val('')
        $('input[name=E_email]').val('')
        $('input[name=E_password]').val('')
        $('select[name=E_department]').val('')
        $('select[name=E_group]').val('')


    }

    function edit_img_user(input_img_E) {
        if (input_img_E.files && input_img_E.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // console.log(e)
                $("#img_edit_user_name").attr("src", e.target.result)
            }
            reader.readAsDataURL(input_img_E.files[0]);
        } else {
            $("#img_edit_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
        }
    }

    function update_img_user(input_img) {
        if (input_img.files && input_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // console.log(e)
                $("#img_user_name").attr("src", e.target.result)
            }
            reader.readAsDataURL(input_img.files[0]);
        } else {
            $("#img_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
        }
    }

    function button_re_user(user_id) {
        event.preventDefault();
        Swal.fire({
            title: "ต้องการ Return user หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Return!'
        }).then((result) => {
            if (result.isConfirmed) {
                // alert(user_id)
                $.ajax({
                    url: '<?php echo base_url(); ?>manage_user/re_user',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        user_id: user_id
                    },
                    success: function(reply_disable) {
                        // console.log(data['reply'])
                        if (reply_disable['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_disable['html'] + "</p><p>" + reply_disable['html_eng'] + "</p>",
                                icon: 'success',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                        } else if (reply_disable['reply'] === false) {
                            Swal.fire({
                                html: "<p>" + reply_disable['html'] + "</p><p>" + reply_disable['html_eng'] + "</p>",
                                icon: 'warning',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                        }
                    }
                })
            }
        })
    }

    function button_delete(user_id) {
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
                    url: '<?php echo base_url(); ?>manage_user/delete',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        user_id: user_id
                    },
                    success: function(reply_delete) {
                        // console.log(data['reply'])
                        if (reply_delete['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_delete['html'] + "</p><p>" + reply_delete['html_eng'] + "</p>",
                                icon: 'success',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                        } else if (reply_delete['reply'] === false) {
                            Swal.fire({
                                html: "<p>" + reply_delete['html'] + "</p><p>" + reply_delete['html_eng'] + "</p>",
                                icon: 'warning',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                        }
                    }
                })
            }
        })
    }

    function button_disable(user_id) {
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
                // alert(user_id)
                $.ajax({
                    url: '<?php echo base_url(); ?>manage_user/disable',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        user_id: user_id
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

    function button_enable(user_id) {
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
                    url: '<?php echo base_url(); ?>manage_user/enable',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        user_id: user_id
                    },
                    success: function(reply_enable) {
                        // console.log(reply_enable['reply'])
                        if (reply_enable['reply'] === true) {
                            Swal.fire({
                                html: "<p>" + reply_enable['html'] + "</p><p>" + reply_enable['html_eng'] + "</p>",
                                icon: 'success',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                        } else if (reply_enable['reply'] === false) {
                            Swal.fire({
                                html: "<p>" + reply_enable['html'] + "</p><p>" + reply_enable['html_eng'] + "</p>",
                                icon: 'warning',
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            })
                        }
                    }
                })
            }
        })
    }

    function get_department() {
        var option_department = '';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/get_department',
            success: function(data_department) {
                // console.log(data_department)
                if (data_department !== false) {
                    option_department = '';
                    option_department = '<select id="search_department" name="search_department" class="form-control">'
                    option_department += '<option selected value="All">--- ALL ---</option>';
                    $.each(data_department, function(key, val) {
                        option_department += '<option  value="' + val.dep_id + '">' + val.dep_name + '</option>'
                    })
                    option_department += '</select>'
                    $("#show_department_data").html(option_department)
                }

            }
        })
    }

    function department_data() {
        var html_a_dep = '';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/department_data',
            success: function(department_data) {
                // console.log(department_data)

                html_a_dep = '';
                html_a_dep += '<option selected value="">--- Department ---</option>';
                $.each(department_data, function(key_dep, val_dep) {
                    html_a_dep += '<option  value="' + val_dep.dep_id + '">' + val_dep.dep_name + '</option>'
                })
                // console.log(html_a_dep)
                $("#html_a_dep").html(html_a_dep)
            }
        })
    }

    function group_data() {
        var html_a_group = '';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/group_data',
            success: function(group_data) {
                // console.log(group_data)

                html_a_group = '';
                html_a_group += '<option selected value="">--- Group ---</option>';
                $.each(group_data, function(key_g, val_g) {
                    html_a_group += '<option  value="' + val_g.g_id + '">' + val_g.g_name + '</option>'
                })
                $("#html_a_group").html(html_a_group)
            }
        })
    }

    $(document).ready(function() {
        get_department();
        department_data();
        group_data();

        var cnt = 1;
        var table = $('#datatable_user').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],
            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>manage_user/data_user',
                type: 'post',
                dataType: 'json',
                data: function(data) {
                    data.search_department = $('#search_department').val();
                }
            },
            columns: [{
                    data: "user_id",
                    "render": function(data, type, row) {
                        if (type === 'display') {
                            if (row.path_img_user !== null && row.path_img_user !== '') {
                                data = ' <img id="img_issue_name" class="setting_img_manage_user border_img" src="<?php echo base_url(); ?>' + row.path_img_user + '" alt="user">'
                            } else {
                                data = ' <img id="img_issue_name" class="setting_img_manage_user border_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">'
                            }
                        }
                        return data;
                        // return cnt++;
                    }
                },
                {
                    data: 'employee'
                },
                {
                    data: 'dep_name',
                },
                {
                    data: 'full_name'
                },
                {
                    data: 'g_name'
                },
                {
                    data: 'user_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_user === '1') {
                                data = '<div class="form-check form-switch mb-2"><input onclick="button_disable(' + data + ')"  class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault"></div>'
                            } else if (row.status_user === '0') {
                                data = '<div class="form-check form-switch mb-2"><input  onclick="button_enable(' + data + ')" class="form-check-input" type="checkbox"  id="flexSwitchCheckDefault"></div>'
                            }
                        }
                        return data;
                    }
                },
                {
                    data: 'user_id',
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
                    data: 'user_id',
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.del_flag === '1') {
                                data_html = '<a onclick="button_re_user(' + data + ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>'
                            } else if (row.del_flag !== '1') {
                                data_html = ''
                                if (row.status_user === '1') {
                                    data_html += '<a onclick="modal_get_data_user(' + data + ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a><a onclick="button_list_permission(' + data + ')" style="cursor: pointer;padding-right: 0.8em;"><i class="bx bx-list-ul"></i></a>'
                                } else if (row.status_user === '0') {
                                    data_html += ''
                                }
                                data_html += '<a onclick="button_delete(' + data + ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>'
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