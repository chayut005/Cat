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
    <img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/mt.png" alt="user">

    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">

                            <div class="row">
                                <div style="margin-bottom: 10px;" class="col-lg-12 col-sm-12">

                                    <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">

                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_user">
                                            <i style="    margin-bottom: 3%;" class='bx bx-user'></i> <i style="    margin-bottom: 3%;" class='bx bx-plus-medical bx-flashing'></i>
                                        </button>
                                    </div>
                                </div>

                            </div>


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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setInterval(data_request_table, 1000)

    function data_request_table() {

        var html_re = '';

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>set_time/data_type',
            success: function(re_data) {
                // console.log(re_data)

                $.each(re_data, function(key_re, val_re) {
                    // alert(val_re.dep_name) <i class='bx bx-edit'></i> <i class='bx bxs-trash' ></i>
                    // html_re = ''<img src="" alt="profile-picture" title="Someone Famous" />

                    html_re += '<li>'
                    html_re += '<div style="cursor: -webkit-grab; cursor: grab;" class="box-container">'
                    html_re += '<div  class="card card2">'
                    html_re += '<div class="card-body">'
                    html_re += '<div>'
                    html_re += '<img style="    object-fit: cover;display: block;margin: auto;height: 180px;width: 180px;border-radius: 50%;" src="https://jennfortner.files.wordpress.com/2015/11/tgno7v6.gif" alt=""/>'
                    html_re += '</div>'
                    html_re += '<div class="content">'
                    html_re += '<h3 class="title">' + val_re.dep_name + '</h3><span>Time Request</span>'
                    // html_re += '<p>' + val_re.date_e + ' Day ' + val_re.h_e + ' hour ' + val_re.m_e + ' minute ' + '</p>'
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
</script>