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
    <!-- <h1>PROFILE USER</h1> -->
    <img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/p_u.png" alt="user">
    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <div class="card mb-4">

                <!-- Account -->
                <div class="card-body">
                    <form id="form_profile" method="POST" class="was-validated">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <div class="">
                                <img id="img_edit_user_name" class="setting_img_user border_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
                                <div style="text-align: center; margin-top:10px;">
                                    <h6>
                                        <div>
                                            <h5><?php echo $this->session->userdata('sessUsr'); ?></h5>
                                        </div>
                                    </h6>
                                </div>

                            </div>
                            <div class="button-wrapper">
                                <label for="upload_imgprofile" class="btn  btn-sm btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input onchange="update_img_user(this)" type="file" id="upload_imgprofile" name="upload_imgprofile" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" onclick="show_img_user()" class="btn btn-sm btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 400K</p>
                            </div>
                        </div>

                        <hr class="my-0" />


                        <div class="row my-3">
                            <div class="mb-3 col-md-6  input-group-sm">
                                <label for="firstName">First Name:</label>
                                <input class="form-control" type="text" id="firstName" name="firstName" placeholder="First name" required />
                                <input type="hidden" name="profile_id_user" value="<?php echo $this->session->userdata('sessUsrId'); ?>">
                                <input type="hidden" name="profile_user_acc" value="<?php echo $this->session->userdata('sessUsr'); ?>">
                            </div>
                            <div class="mb-3 col-md-6  input-group-sm">
                                <label for="lastName">Last Name:</label>
                                <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Last name" required />
                            </div>
                            <div class="mb-3 col-md-6  input-group-sm">
                                <label for="email">E-mail:</label>
                                <input class="form-control" type="text" id="email" name="email" placeholder="Email" required />
                            </div>
                            <div class="mb-3 col-md-6  input-group-sm">
                                <label for="id_line">ID Lind:</label>
                                <input type="text" class="form-control" id="id_line" name="id_line" placeholder="ID_Line" required />
                            </div>

                            <div class="mb-3 col-md-4 ">
                                <div class="form-password-toggle">
                                    <label for="old_pass">Old Password</label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" id="old_pass" name="old_pass" placeholder="Old Password" autofocus required />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4 ">
                                <div class="form-password-toggle">
                                    <label for="new_pass">New Password:</label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="New Password"  required />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4 ">
                                <div class="form-password-toggle">
                                    <label for="con_pass">Confirm Password:</label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" id="con_pass" name="con_pass" placeholder="Confirm Password"  required />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="action" value="<?php echo base64_encode('update_profile'); ?>">
                        </div>
                        <div style="float: right;" class="mt-2">
                            <button type="reset" class="btn btn-sm  btn-primary">Clear</button>
                            <button type="submit" onclick="update_profile()" class="btn btn-sm  btn-primary me-2">Save changes</button>

                        </div>

                </div>
                <!-- /Account -->
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        show_data_profile_user()
    })

    function update_img_user(input_img) {
        if (input_img.files && input_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // console.log(e)
                $("#img_edit_user_name").attr("src", e.target.result)
            }
            reader.readAsDataURL(input_img.files[0]);
        } else {
            $("#img_edit_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
        }
    }

    function show_data_profile_user() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
            data: {
                user_id: $('#id_user_id').val()
            },
            success: function(data_user) {
                $.each(data_user, function(key_user, val_user) {
                    $('#firstName').val(val_user.f_name)
                    $('#lastName').val(val_user.l_name)
                    $('#email').val(val_user.email)
                    $('#id_line').val(val_user.id_line_phon)

                })

            }
        })
    }

    function update_profile() {
        event.preventDefault()
        // alert($('#form_profile').serialize())
        Swal.fire({
            title: "ต้องการ Update Profile?",
            text: "หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Send!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('form_profile');
                var form_data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url(); ?>account/update_profile',
                    data: form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(reply) {
                        // console.log(reply)
                        if (reply !== true && reply !== false) {
                            Swal.fire({
                                html: "<p>" + reply + "</p>",
                                icon: 'warning',
                            })
                        } else if (reply === true) {
                            // alert('dfhdfh')
                            Swal.fire({
                                html: "<p>Update Profile</p><p>Success</p>",
                                icon: 'success',
                            })
                            show_img_user()
                            $('#modal_add_data_permission').modal('hide')
                        } else if (reply === false) {
                            Swal.fire({
                                html: "<p>Update Profile</p><p>Error</p>",
                                icon: 'Error',
                            })
                        }
                    }
                })
            }
        })

    }
</script>