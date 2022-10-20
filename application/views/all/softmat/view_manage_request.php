<style>
    .setting_img {
        max-width: 40%;
        min-width: 70px;

        /* height: 8%; */
        object-fit: scale-down;
        display: block;
        border-radius: 10%;
        margin-left: auto;
        margin-right: auto;
    }

    .column {
        float: left;
        width: 50%;
        padding: 5px;
    }

    .colstra {
        float: left;
        width: 25%;
        padding: 5px;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h1>MANAGE QUEST</h1> -->
    <img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/m_q.png" alt="user">
    <div class="row">
        <div class="col-lg-12 mb-12 sm-12 order-0 my-1">
            <!-- <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body"> -->


            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-manage" aria-controls="#navs-top-manage" aria-selected="true">
                            Manage
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-report" aria-controls="navs-top-report" aria-selected="false">
                            Report
                        </button>
                    </li>


                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-top-manage" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <div class=" input-group-outline  input-group-sm">
                                    <label style=" font-size: 15px;">Start Date:</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo date('Y-m-01') ?>">
                                </div>
                            </div>
                            <!-- <?php $date = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
                                    $time = $date->format('Y-m-d H:i:s');
                                    $set_expected_pickup_time_department = 50;
                                    $set_time_priority_department = 20;
                                    echo date('Y-m-d H:i:s', strtotime($time . '' . $set_expected_pickup_time_department . ' min'));
                                    echo "jhkjhk";
                                    echo date('Y-m-d H:i:s', strtotime($time . '' . $set_time_priority_department . ' min'));
                                    ?> -->
                            <div class="col-lg-3 col-sm-3">
                                <div class=" input-group-outline  input-group-sm">
                                    <label style=" font-size: 15px;">End Date:</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo date('Y-m-t') ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div style=" float: right;  text-align: center;">
                                    <div class="colstra"> <span class="spinner-grow text-success" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
                                        <div>Normal</div>
                                    </div>
                                    <div class="colstra"> <span class="spinner-grow text-warning" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
                                        <div>Over A</div>
                                    </div>
                                    <div class="colstra"> <span class="spinner-grow text-danger" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
                                        <div>Over S</div>
                                    </div>
                                    <div class="colstra"> <span class="spinner-grow text-dark" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
                                        <div>discount</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table id="datatable_request" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Dep Issue</th>
                                    <th style="text-align:center;">System</th>
                                    <th style="text-align:center;">Type</th>
                                    <th style="text-align:center;">Cat</th>
                                    <th style="text-align:center;">Priority</th>
                                    <th style="text-align:center;">Sup By</th>
                                    <th style="text-align:center;">Receive</th>
                                    <th style="text-align:center;">s</th>
                                    <th style="text-align:center;">Status</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="navs-top-report" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <div class=" input-group-outline  input-group-sm">
                                    <label>Start Date:</label>
                                    <input onchange="report_tabCatSta()" type="date" name="start_date_report" id="start_date_report" class="form-control" value="<?php echo date('Y-m-01') ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <div class=" input-group-outline  input-group-sm">
                                    <label>End Date:</label>
                                    <input onchange="report_tabCatSta()" type="date" name="end_date_report" id="end_date_report" class="form-control" value="<?php echo date('Y-m-t') ?>">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <div class=" input-group-sm">
                                    <label>Department:</label>
                                    <select onchange="report_tabCatSta()" id="show_department_report" name="show_department_report" class="form-control" required>
                                        <option selected value="<?php echo $this->session->userdata('sessDep') ?>">--- System ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <div style="float: right;" class=" input-group-outline" style="margin-bottom:1rem">
                                    <a href="" onclick="export_excel_report()" id="ex_excel" style="float: left;" type="button" class="btn  btn-sm btn-primary ">
                                        <span class="d-none d-sm-block">Export Excel</span>
                                        <i class="bx  bxs-file-export d-block d-sm-none"></i>
                                    </a>

                                </div>
                            </div>

                        </div>
                        <!-- table-striped display nowrap -->
                        <div id="report_excel" class="my-1" style="     border: 1px solid lightgray; overflow: auto;">
                            <table class="table " style="width:100%; text-align:center; font-size:12px; ">
                                <thead>
                                    <tr>
                                        <th style="background-color: #002060; color:#ffffff;    border: 1px solid lightgray; font-size: 38px;" rowspan="2" colspan="4">TBKK</th>
                                        <th colspan="11">Report</th>
                                    </tr>
                                    <tr>
                                        <th colspan="11">Category Status</th>
                                    </tr>
                                    <tr id="dayStartToEnd">

                                    </tr>
                                </thead>
                                <tbody id="report_catSta"></tbody>
                                <!-- </table>



                            <table class="table " style="width:100%; text-align:center; font-size:12px; border: 1px solid lightgray;"> -->
                                <thead>
                                    <tr>
                                        <th style="background-color: #002060; color:#ffffff; " colspan="15">Quest Status</th>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #defbff; " colspan="3">Quest</th>
                                        <th style="background-color: #defbff; " colspan="2">Status</th>
                                        <th style="background-color: #defbff; " colspan="2">Receive Time</th>
                                        <th style="background-color: #defbff; " colspan="2">Over Time</th>
                                        <th style="background-color: #defbff; " colspan="2">Specified Time</th>
                                        <th style="background-color: #defbff; " colspan="2">Over Time</th>
                                        <th style="background-color: #defbff; " colspan="2">Support By</th>

                                    </tr>
                                </thead>
                                <tbody id="report_qSta"></tbody>
                                <thead>
                                    <tr>
                                        <th style="background-color: #defbff; " colspan="4">Finish</th>
                                        <th style="background-color: #defbff; " colspan="4">Over Accept</th>
                                        <th style="background-color: #defbff; " colspan="4">Over Success</th>
                                        <th style="background-color: #defbff; " colspan="3">Total Quest</th>

                                    </tr>
                                </thead>
                                <tbody id="total"></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>




            <!-- </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>





<script>
    function export_excel_report() {
        alert('fgjhfthj')
        var html = document.getElementById("report_excel").outerHTML;
        var blob = new Blob([html], {
            type: "application/vnd.ms-excel"
        });
        var a = document.getElementById("ex_excel");
        a.href = URL.createObjectURL(blob);
        var st = $('#start_date_report').val()
        var lt = $('#end_date_report').val()
        a.download = st + "_" + lt + ".xls";
    }

    function report_tabCatSta() {
        var st = $('#start_date_report').val()
        var lt = $('#end_date_report').val()
        var dep = $('#show_department_report').val()
        $('#dayStartToEnd').html(' <th colspan="7" >' + st + '</th> <th>To</th><th colspan="7" >' + lt + '</th>')
        // alert(st + '==' + lt + '==' + dep)

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/category_report',
            data: {
                st: st,
                lt: lt,
                dep: dep
            },
            success: function(data_report) {
                console.log(data_report)
                var html = '';
                var max = data_report['max'];
                $.each(data_report['data'], function(key, val) {
                    html += '<tr><td style="background-color: #defbff; ">' + val.name + '</td><td style="text-align:center;">' + val.allQ + '</td>';
                    var curnum = 1;
                    var colorBox = Math.floor((val.allQ / max) * 12);
                    for (var i = 0; i < 12; i++) {
                        var color = '';
                        if (curnum <= colorBox) {
                            color = 'style="background-color: #FFC000;"';
                        }
                        html += '<td ' + color + '></td>';
                        curnum++;
                    }
                    var num = (val.allQ / data_report['alldata']) * 100
                    if (num % 10 != 0) {
                        num = num.toFixed(2)
                    }
                    html += '<td>' + num + '%</td>';
                    html += '</tr>';
                })
                $("#report_catSta").html(html)

                var quest_html = '';
                var totalFin = 0;
                var totalOverAcc = 0;
                var totalOverSuc = 0;
                $.each(data_report['q_data'], function(key, val) {
                    var status = '';
                    switch (val.status_qu) {
                        case '0':
                            status = 'cancel';
                            break;
                        case '1':
                            status = 'pending';
                            break;
                        case '2':
                            status = 'accept';
                            break;
                        case '3':
                            status = 'finish';
                            totalFin++;
                            break;
                        case '4':
                            status = 'reply';
                            break;
                        default:
                            status = 'ERROR';
                    }
                    var over1 = '';
                    if (val.over_accept_flag == 0) {
                        over1 = 'Normal';
                    } else {
                        over1 = 'Delay';
                        totalOverAcc++;
                    }
                    var over2 = '';
                    if (val.over_success_flag == 0) {
                        over2 = 'Normal';
                    } else {
                        over2 = 'Delay';
                        totalOverSuc++;
                    }
                    quest_html += '<tr>' +
                        '<td style="text-align:center;" colspan="3">' + val.subject + '</td>' +
                        '<td style="text-align:center;" colspan="2">' + status + '</td>' +
                        '<td style="text-align:center;" colspan="2">' + val.receive_time + '</td>' +
                        '<td style="text-align:center;" colspan="2">' + over1 + '</td>' +
                        '<td style="text-align:center;" colspan="2">' + val.specified_time + '</td>' +
                        '<td style="text-align:center;" colspan="2">' + over2 + '</td>' +
                        '<td style="text-align:center;" colspan="2">' + val.employee + '</td>' +
                        '</tr>';
                })
                var quest_html2 = '<tr>' +
                    '<td style="text-align:center;" colspan="4">' + totalFin + '</td>' +
                    '<td style="text-align:center;" colspan="4">' + totalOverAcc + '</td>' +
                    '<td style="text-align:center;" colspan="4">' + totalOverSuc + '</td>' +
                    '<td style="text-align:center;" colspan="3">' + data_report['alldata'] + '</td>' +

                    '</tr>';
                $("#report_qSta").html(quest_html)
                $("#total").html(quest_html2)
            }
        })
    }

    function get_department_report() {
        var dep_id = <?php echo $this->session->userdata('sessDep') ?>;
        //    alert(dep_id)
        var option_department = '';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?php echo base_url(); ?>GET_API/get_department',
            success: function(data_department) {
                // console.log(data_department)
                if (data_department !== false) {
                    option_department = '';
                    // option_department += '<option selected value="All">--- ALL ---</option>';
                    $.each(data_department, function(key, val) {
                        if (val.dep_id === dep_id) {

                        }
                        option_department += '<option  value="' + val.dep_id + '">' + val.dep_name + '</option>'
                    })
                    $("#show_department_report").html(option_department)
                }

            }
        })
    }
    $(document).ready(function() {

        get_department_report()
        report_tabCatSta()
        var cnt = 1;
        var table = $('#datatable_request').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 'All'],
            ],
            scrollX: true,
            ajax: {
                url: '<?php echo base_url(); ?>Request/get_datatable_request',
                type: 'post',
                dataType: 'json',
                data: function(data) {
                    data.start_date = $('#start_date').val();
                    data.end_date = $('#end_date').val()
                }
            },
            columns: [{
                    data: "qu_id",
                    "render": function(data, type, row) {
                        return cnt++;
                    }
                },
                {
                    data: "dep_issue"
                },
                {
                    data: "system_name"
                },
                {
                    data: "type_name"
                },
                {
                    data: "qu_id",
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.cat_name === null || row.cat_name === '') {
                                html_cat = '-'
                            } else {
                                html_cat = '' + row.cat_name + ''
                            }

                        }
                        return html_cat;
                    }
                },
                {
                    data: "qu_id",
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.pri_name === null || row.pri_name === '') {
                                html_cat = '-'
                            } else {
                                html_cat = '' + row.pri_name + ''
                            }

                        }
                        return html_cat;
                    }
                },
                {
                    data: "support_by"
                },
                {
                    data: "receive_time"
                },
                {
                    data: "qu_id",
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_qu !== '0') {
                                if (row.status_qu !== '4') {
                                    // if (row.status_qu !== '3') {
                                    if (row.over_success_flag == '0') {
                                        if (row.over_accept_flag == '0') {
                                            html = ' <span class="spinner-grow text-success" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                        } else if (row.over_accept_flag == '1') {
                                            html = ' <span class="spinner-grow text-warning" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                        }
                                    } else if (row.over_success_flag == '1') {
                                        html = ' <span class="spinner-grow text-danger" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                    }
                                    // } else {
                                    //     html = ' <span class="spinner-grow text-info" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                    // }

                                } else {
                                    html = ' <span class="spinner-grow text-dark" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                                }

                            } else {
                                html = ' <span class="spinner-grow text-dark" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
                            }

                        }
                        return html;
                    }
                },
                {
                    data: "qu_id",
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            if (row.status_qu === '1') {
                                data = '<div style="background-color:#ff6b6b;border-radius:10px; color:#ffffff;  ">Pending</div>'
                            } else if (row.status_qu === '2') {
                                data = '<div style="background-color:#ff8847;border-radius:10px; color:#ffffff;  ">Accepted</div>'
                            } else if (row.status_qu === '3') {
                                data = '<div style="background-color:#78ff73;border-radius:10px; color:#ffffff;  ">Success</div>'
                            } else if (row.status_qu === '4') {
                                data = '<div style="background-color:#7d7c7c;border-radius:10px; color:#ffffff;  ">Deny</div>'
                            } else if (row.status_qu === '0') {
                                data = '<div style="background-color:#4595e0;border-radius:10px; color:#ffffff;  ">Cancel</div>'
                            } else {
                                data = '<div style="color:#FF0000;"<i class="bx bx-error" ></i> Error chack in database table status <i class="bx bx-error" ></i></div>'
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