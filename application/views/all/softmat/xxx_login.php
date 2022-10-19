<div class="col-lg-12 col-sm-12">
  <div>
    <div class="column">
      <img id="img_sender_name" class="setting_img_re_quest" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
      <div style="text-align: center;margin-top:5px">
        <h6>
          <span id="support_name">
            xxxxx
          </span>
        </h6>
      </div>
    </div>
    <div style="text-align: center; " class="column">
      <i class='bx bx-right-arrow bx-fade-right'></i>
      <i class='bx bx-right-arrow bx-fade-right'></i><br>


    </div>
    <div class="column">
      <img id="img_recipient_name" class="setting_img_re_quest" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
      <div style="text-align: center; margin-top:5px">
        <h6>
          <span id="issue_name">
            xxxxx
          </span>
        </h6>
      </div>
    </div>
  </div>


</div>


<div class="col-lg-6 col-mb-6 col-sm-12 my-1">
  <div class=" input-group-outline">
    <label>Department Support:</label>
    <select selected onchange="open_recipient(value)" id="html_department" name="re_department" class="form-control" required>
      <option value="">--- Department ---</option>
    </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>

<div class="col-lg-6 col-mb-6 col-sm-12 my-1">
  <div class=" input-group-outline">
    <label>Support By:</label>
    <select onchange="check_support(value)" disabled id="html_recipient" name="re_recipient" class="form-control" required>
      <option selected value="">--- Support ---</option>
    </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>

<div class="col-lg-6 col-mb-12 col-sm-12 ">
  <div class=" input-group-outline">
    <label>Type:</label>
    <select onchange="check_type(value)" id="html_type" name="re_type" class="form-control selectpicker" data-live-search="true" required>
      <option selected value="">--- Type ---</option>
    </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>

<div class="col-lg-6 col-mb-12 col-sm-12 ">
  <div class=" input-group-outline">
    <label>System:</label>
    <select onchange="open_system(value)" id="html_system" name="re_system" class="form-control selectpicker" data-live-search="true" required>
      <option selected value="">--- System ---</option>
    </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>

<div class="col-lg-12 col-mb-12 col-sm-12 ">
  <div class=" input-group-outline">
    <label>Category:</label>
    <select id="html_category" name="re_category" class="form-control" required>
      <option selected value="">--- Category ---</option>
    </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>

<div hidden id="show_priority" class="col-lg-12 col-mb-12 col-sm-12 ">
  <div class=" input-group-outline">
    <label>Priority:</label>
    <select id="html_priority" name="re_priority" class="form-control" required>
      <option selected value="">--- Priority ---</option>
    </select>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
</div>



</div>








<div class="col-xl-6 col-lg-12 col-sm-12">
  <div class="card">
    <div class="card-body">
      <div class="row">

        <div class="col-lg-6 col-mb-6 col-sm-12 my-1">
          <div class=" input-group-outline">
            <label>Department Issue:</label>
            <select selected onchange="open_issue_by(value)" id="html_department_issue" name="re_department" class="form-control" required>
              <option value="">--- Department ---</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div class="col-lg-6 col-mb-6 col-sm-12 my-1">
          <div class=" input-group-outline">
            <label>Issue By:</label>
            <select onchange="check_issue_by(value)" disabled id="html_issue_by" name="re_recipient" class="form-control" required>
              <option selected value="">--- Issue ---</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-12 ">
          <div class=" input-group-outline">
            <label style=" font-size: 15px;">Subject:</label>
            <input type="text" class="form-control" placeholder="Enter Subject" name="re_subject" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-12 ">
          <div class=" input-group-outline">
            <label style=" font-size: 15px;">Phase:</label>
            <input type="text" class="form-control" placeholder="Enter Phase" name="re_phase" <?php if ($this->session->userdata('sess_phase') == 10) { ?> value="P10" <?php } elseif ($this->session->userdata('sess_phase') == 8) { ?> value="P08" <?php }  ?> required readonly>

            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>


        <div id="sys_1" hidden class="col-lg-6 col-mb-12 col-sm-12 ">
          <div class=" input-group-outline">
            <label>PD:</label>
            <select id="html_pd" onchange="open_line_mst(value)" name="re_pd" class="form-control selectpicker" data-live-search="true" required>
              <option selected value="">--- PD ---</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div id="sys_1_1" hidden class="col-lg-6 col-mb-12 col-sm-12 ">
          <div class=" input-group-outline">
            <label>Line:</label>
            <select disabled id="html_line_mst" name="re_line" class="form-control selectpicker" data-live-search="true" required>
              <option selected value="">--- Line ---</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>


        <div class="col-lg-12 col-sm-12 ">
          <div class=" input-group-outline">
            <label style=" font-size: 15px;">Detail:</label>
            <textarea name="re_detail" id="" cols="30" rows="3" class="form-control" placeholder="Detail........" required></textarea>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>

        <div class="col-lg-12 col-sm-12 my-2">

          <div style="  height: 105px;    border-radius: 10px;border-style: dotted; border-color: blue;">
            <!-- <h1 onclick="$('#upload_img_request').click()" style="     display: flex;justify-content: center; align-items: center; height: 127px;">UPLOAD IMG</h1> -->
            <span>
              <img id="show_data_img_request1" onclick="$('#upload_img_request1').click()" class="column setting_img_request" src="<?php echo base_url(); ?>./themes/softmat/img/upload_img.png" alt="user">
              <img id="show_data_img_request2" onclick="$('#upload_img_request2').click()" class="column setting_img_request" src="<?php echo base_url(); ?>./themes/softmat/img/upload_img.png" alt="user">
              <img id="show_data_img_request3" onclick="$('#upload_img_request3').click()" class="column setting_img_request" src="<?php echo base_url(); ?>./themes/softmat/img/upload_img.png" alt="user">
            </span>


            <input id="upload_img_request1" onchange="show_img_request1(this)" name="re_img1" type="file" accept="image/png, image/gif, image/jpeg" hidden readonly>
            <input id="upload_img_request2" onchange="show_img_request2(this)" name="re_img2" type="file" accept="image/png, image/gif, image/jpeg" hidden readonly>
            <input id="upload_img_request3" onchange="show_img_request3(this)" name="re_img3" type="file" accept="image/png, image/gif, image/jpeg" hidden readonly>

          </div>
          <div style="  display: flex; justify-content: center; align-items: center;">
            <button onclick="remove_img_request()" class=" btn btn-warning my-2">Remove</button>
          </div>

        </div>



      </div>
      <div style=" float:right;" class="margin_top_fig ">
        <button class="btn btn-primary">Clear</button>
        <button type="submit" onclick="send_data_request()" class="btn btn-success">Send</button>
      </div>

    </div>
  </div>
</div>uiuiiugblggSQsd 

gvhgvjhvjhvjhvjhvdFG           xXVCcv3333333333333444444444444444444444444444444444444444444444444444444444444444444sssssxxxxxxxxxxxxxxdfffqqwqqaass1qw12



123456789asqqqq12aqrtyuiop}\asdfghjkl;'
zxcvbnm,./L'JJasdfghjkl;'zxcvbnm,./C'  0.
123456789/*






if ($this->session->userdata('sessUsrId') == 1) {
			$sqlGroupMenu = "";
			$sqlGroupMenu = "SELECT
			lmg.name AS g_name,
			lmg.icon_menu,
			lmg.menu_group_id,
			lmg.order_no
			FROM
			list_menu_groups AS lmg
			LEFT JOIN list_menu AS lm ON lmg.menu_group_id = lm.menu_group_id
			GROUP BY lmg.name
							,lmg.icon_menu
							,lm.menu_group_id
							,lmg.order_no
			ORDER BY lmg.order_no ASC ";
		} else if ($this->session->userdata('sessUsrId') != 1) {
			$sqlGroupMenu = "";
			$sqlGroupMenu = "SELECT
		 lmg.name AS g_name,
		 lmg.icon_menu,
		 lmg.menu_group_id,
		 lmg.order_no
		FROM
		 list_menu_groups AS lmg
		LEFT JOIN list_menu lm ON lmg.menu_group_id = lm.menu_group_id
		 WHERE lm.permission_id is NULL OR lm.permission_id IN (select epu.permission_id FROM embodiment_permission_user AS epu WHERE epu.user_id = '$key' AND lm.status_nemu = '1' AND epu.status_embodiment_permission_user = '1' AND  lmg.status_menu_group = '1')
		 GROUP BY lmg.name
					,lmg.icon_menu
						,lm.menu_group_id
						,lmg.order_no
		ORDER BY lmg.order_no ASC ";
		}








    




    function update_img_user(input_img) {
        if (input_img.files && input_img.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                console.log(e)
                $("#img_user_name").attr("src", e.target.result)
            }
            reader.readAsDataURL(input_img.files[0]);
        } else {
            $("#img_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
        }
    }

    function submit_data_add_user() {
        event.preventDefault()
        var data_text = $('#form_add_user').serialize();
        var file_data = $('#img_add_user').prop('files')[0];
        var data_img = new FormData();
        data_img.append('img_add_user', file_data);
        $.ajax({
            url: '<?php echo base_url(); ?>welcome',
            type: "POST",
            data: data_img,
            data_text,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data)
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
            success: function(data_user) {
                // console.log(data_user);
                $.each(data_user, function(key_user, val_user) {
                    // $('input[name=list_username]').val(val_user.username);
                    if (val_user.phase === '10') {
                        $('#list_phase').html('<span>P10</span>')
                    } else if (val_user.phase === '8') {
                        $('#list_phase').html('<span>P08</span>')
                    }
                    $('#list_usernamne').html('<span>' + val_user.username + '</span>')
                    $('#list_fname').html('<span>' + val_user.first_name + '</span>')
                    $('#list_lname').html('<span>' + val_user.last_name + '</span>')

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
                                    $.each(data_list_permission, function(key_list_per, val_list_per) {
                                        // console.log(data_list_permission_user);
                                        $.each(data_list_permission_user, function(key_list_per_user, val_list_per_user) {
                                            if (val_list_per.permission_id === val_list_per_user.permission_id) {
                                                check_list = "checked='checked'"
                                            }
                                        })
                                        html_list += "<div class = 'col-lg-4 col-sm-4 col-sm-4'>"
                                        // html_list += '<p>'
                                        html_list += '<label>'
                                        html_list += '<input type="checkbox" name="chkRid[]"  value="' + val_list_per.permission_id + '" ' + check_list + ' >&nbsp;'
                                        html_list += '<span>' + val_list_per.permission_name + '</span>'
                                        html_list += '</label>'
                                        // html_list += '</p>'
                                        html_list += '</div>'

                                        check_list = ""
                                    })
                                    // console.log(html_list)
                                    $("#list_permission_user").html(html_list)
                                }

                                // list_permission_user
                            });



                        }
                        // list_permission_user
                    });

                })
            }
            // list_permission_user
        });
        $('#modal_data_list_user_permission').modal('show')
    }

    function button_re_user(user_id) {
        event.preventDefault();
        Swal.fire({
            title: "ต้องการ Re user หรือไม่ ?",
            text: "ยืนยัน",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#35D735',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sending!'
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
                                icon: 'warning',
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
                                icon: 'warning',
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
                                icon: 'warning',

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
                                icon: 'warning',
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
        //   alert('fdhfddfh')
        var option_department = '';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/get_department',
            success: function(data_department) {
                //   alert(data_department)
                option_department = '';
                option_department = '<option selected value="All">--- ALL ---</option>';
                $.each(data_department, function(key, val) {
                    option_department += '<option  value="' + val.department_id + '">' + val.department_name + '</option>'
                })
                $("#search_department").html(option_department)
            }
        })
    }

    function user_id_data(user_id) {

        // alert(user_id + '===>1')
        if (user_id == 1) {

            $("#show_department_data").removeAttr("hidden")
        } else {
            $("#show_department_data").attr("hidden", true)
        }

    }

    function clear_data_edit() {
        event.preventDefault();
        $('input[name=E_password]').val('')
        $('input[name=E_fname]').val('')
        $('input[name=E_lname]').val('')
        $('input[name=E_line_id]').val('')
        $('input[name=E_email]').val('')
        $('select[name=E_department]').val(0)
        $('select[name=E_group]').val(0)
    }

    function modal_get_data_user(user_id) {
        event.preventDefault();
        var html_dep = '';
        var check_dep = '';
        var html_group = '';
        var check_group = '';
        clear_data_edit()

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
            data: {
                user_id: user_id
            },
            success: function(data_user) {
                // console.log(data_user)
                $.each(data_user, function(key_user, val_user) {
                    $('input[name=E_username]').val(val_user.username)
                    // alert(val_user.phase)
                    if (val_user.phase === '8') {
                        $('input[name=E_phase]').val('P08')
                    } else if (val_user.phase === '10') {
                        $('input[name=E_phase]').val('P10')
                    }
                    $('input[name=E_fname]').val(val_user.first_name)
                    $('input[name=E_lname]').val(val_user.last_name)
                    $('input[name=E_line_id]').val(val_user.id_line)
                    $('input[name=E_email]').val(val_user.email)
                    $('#user_name_img').html('<span>' + val_user.first_name + ' ' + val_user.last_name + '</span>')
                    $('#img_edit_user_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/b52.jpg')
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>GET_API/get_department',
                        success: function(data_dep) {
                            // console.log(data_dep)
                            html_dep = ' <option value="0">--- Department ---</option>'
                            $.each(data_dep, function(key_dep, val_dep) {
                                if (val_user.department_id === val_dep.department_id) {
                                    check_dep = "selected";
                                }
                                html_dep += ' <option value="' + val_dep.department_id + '" ' + check_dep + '>' + val_dep.department_name + '</option>'
                                check_dep = '';
                            })
                            $("#html_dep").html(html_dep)
                        }
                    })
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '<?php echo base_url(); ?>GET_API/get_group',
                        success: function(data_group) {
                            // console.log(data_group)
                            html_dep = ' <option value="0">--- Group ---</option>'
                            $.each(data_group, function(key_group, val_group) {
                                if (val_user.group_id === val_group.group_id) {
                                    check_group = "selected";
                                }
                                html_group += ' <option value="' + val_group.group_id + '" ' + check_dep + '>' + val_group.group_name + '</option>'
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

</script>