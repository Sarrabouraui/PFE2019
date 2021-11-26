<?php $this->load->view('header/header') ?>
<head>
        <title>Layout</title>
</head>
 
<body>
 
<div class='wrapper'>
        <?php $this->load->view('menu/menu') ?>
        <div class='content isOpen' id="c"style="background-color:white;">
                <header>
                        <nav class="nav">
                        </nav>
                </header>
                <div class="container"><!--style="margin-top: 80px;"-->
                        <h3> Layouts list </h3>
                        <div class="alert alert-success" style="display: none;"></div>
                        <button id="btnAdd" class="btn btn-success">Add New</button>
                        <table class="table table-hover" id="tab"><!--style="width:1000px; margin-top: 50px; margin-left: -50px"-->
                                <thead>
                                <tr>
                                        <!--<td style="width:200px;">ID</td>-->
                                        <td style="width:200px;"> Name</td>
                                        <td style="width:200px;">Description</td>
                                        <td style="width:200px;">Action</td>
                                </tr>
                                </thead>
                                <tbody id="showdata">
                                </tbody>
                        </table>
                </div>
        </div>
</div>
 
 
<div id="EditLayout" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Edit Layout</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                                <form id="myForm" action="" method="post" class="form-horizontal">
                                        <input type="hidden" name="txtId" value="0">
                                        <div class="form-group">
                                                <label for="name" class="label-control col-md-4"> Name </label>
                                                <div class="col-md-8">
                                                        <input type="text" name="txtName" class="form-control">
                                                </div>
                                        </div>
 
                                        <div class="form-group">
                                                <label for="from" class="label-control col-md-4"> Description </label>
                                                <div class="col-md-8">
                                                        <input type="text" name="txtFrom" class="form-control">
                                                </div>
                                        </div>
 
                              
 
                                </form>
                        </div>
                        <div class="modal-footer">
                                <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>
</div>
 
<div id="deleteModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                                Do you want to delete this record?
                        </div>
                        <div class="modal-footer">
                                <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>
</div>
 
 
<div id="ViewLayout" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="margin-left: 300px; margin-right: 300px;">
                <div class="modal-content" style="width:fit-content;">
                        <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <div id="iframe-clock">
                                        <!-- clock widget -->
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
 
                                <div id="mySlidesLayout" class="w3-content w3-display-container" style="pointer-events:none;width:800px">
                                        <!-- weather widget -->
 
                                </div>
 
 
                        </div>
                        <script>
                                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                        </script>
                        <div class="modal-footer">
                                </br></br></br></br></br>
                                <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle"
                                         style="width:100%">
                                        <div class="w3-section" id="w3-section-add">
                                                <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
                                                <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
 
 
<script>
        $(function () {
                showAllLayout();
                //add new
                $('#btnAdd').click(function () {
                        $('#EditLayout').modal('show');
                        $('#EditLayout').find('.modal-title').text('Add new layout');
                        $('#myForm').attr('action', '<?php echo base_url() ?>layout/addLayout');
                });
 
                $('#btnSave').click(function () {
                        var url = $('#myForm').attr('action');
                        var data = $('#myForm').serialize();
                        //validate form
                        var nameadd = $('input[name =txtName]');
                        var fromadd = $('input[name =txtFrom]');
                       
                        var result = '';
                        if (nameadd.val() == '') {
                                nameadd.parent().parent().addClass('has-error');
                        } else {
                                nameadd.parent().parent().removeClass('has-error');
                                result += '1';
                        }
                        if (fromadd.val() == '') {
                                fromadd.parent().parent().addClass('has-error');
                        } else {
                                fromadd.parent().parent().removeClass('has-error');
                                result += '2';
                        }
                      
                        if (result == '12') {
                                $.ajax({
                                        type: 'ajax',
                                        method: 'post',
                                        url: url,
                                        data: data,
                                        async: false,
                                        dataType: 'json',
                                        success: function (response) {
                                                if (response.success) {
                                                	console.log(response);
                                                        $('#EditLayout').modal('hide');
                                                        $('#myForm')[0].reset();
                                                        if (response.type == 'add') {
                                                                var type = 'added'
                                                        } else if (response.type == 'update') {
                                                                var type = "updated"
                                                        }
                                                        $('.alert-success').html('Layout ' + type + ' successfuly').fadeIn().delay(4000).fadeOut('slow');
                                                        //showAllLayout();
                                                        location.href = "<?php echo base_url() ?>create2/index/create2?id="+response.layoutid	;
                                                } else {
                                                        alert('error');
                                                }
                                        },
                                        error: function () {
                                                alert('could not add data');
                                        }
                                });
                        }
 
                });
 
                //edit
                $('#showdata').on('click', '.btn-secondary', function () {
                        var lay_id = $(this).attr('data');
                        $('#EditLayout').modal('show');
                        $('#EditLayout').find('.modal-title').text('Edit Layout');
                        $('#myForm').attr('action', '<?php echo base_url() ?>Layout/updateLayout');
                        $.ajax({
                                type: 'ajax',
                                method: 'get',
                                url: '<?php echo base_url() ?>layout/editLayout',
                                data: {lay_id: lay_id},
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                        $('input[name=txtName]').val(data.lay_title);
                                
                                        $('input[name=txtId]').val(data.lay_id);
                                        $('input[name=txtFrom]').val(data.lay_desc);
                                       
                                },
                                error: function () {
                                        alert('could not edit data');
                                }
                        });
 
                });
 
                $('#showdata').on('click', '.item-view', function () {
                        var lay = $(this).attr('data');
                        var lay_id = lay[0];
                        var lay_time = lay[4];
                        var lay_weather = lay[2];
 
                        $('#ViewLayout').modal('show');
                        $('#myForm').attr('action', '<?php echo base_url() ?>layout/getLayout');
                        $.ajax({
                                type: 'get',
                                url: '<?php echo base_url() ?>layout/getLayout',
                                data: {
                                        lay_id: lay_id,
                                        lay_weather: lay_weather,
                                        lay_time: lay_time
                                },
                                async: false,
                                cache: false,
                                dataType: 'json',
                                success:
                                        function (data) {
                                                $("#mySlidesLayout").empty();
                                                $(".w3-button demo").empty();
                                                $("#iframe-clock").empty();
 
                                                if (lay_weather === '1'){
                                                        $("#mySlidesLayout").append(
                                                                '<a class="weatherwidget-io not-active" href="https://forecast7.com/fr/36d8110d18/tunis/" data-label_1="TUNIS" data-label_2="Temperature" data-icons="Climacons Animated" data-mode="Current" data-days="3" data-theme="sky" >TUNIS Temperature</a>'
                                                        );
                                                }
                                                $.each(data, function (key, value) {
                                                        $("#mySlidesLayout").append(
                                                                '<img id="mySlidesLayout" class="mySlidesLayout" src="<?php echo base_url() ?>uploads/' + value.pic_file + '" alt="test" style="display:none;width:800px;max-width:800px;">'
                                                        );
                                                        $("#w3-section-add").before(
                                                                '<button class="w3-button demo" onclick="currentDiv(' + parseInt(key + 1) + ')">' + parseInt(key + 1) + '</button>'
                                                        );
                                                });
                                                if (lay_time === '1'){
                                                        $("#iframe-clock").append(
                                                                '<iframe scrolling="no" frameborder="no" clocktype="html5" style="pointer-events:none;overflow:hidden;border:0;margin:0;padding:0;width:180px;height:60px;" src="https://www.clocklink.com/html5embed.php?clock=004&timezone=GMT0100&color=blue&size=180&Title=&Message=&Target=&From=2019,1,1,0,0,0&Color=blue"></iframe>'
                                                        );
                                                }
 
                                        },
                                error:
                                        function () {
                                                alert('Error: Could not get data!');
                                        }
                        });
 
                });
 
                //delete
                $('#showdata').on('click', '.item-delete', function () {
                        var lay_id = $(this).attr('data');
                        $('#deleteModal').modal('show');
                        $('#btnDelete').unbind().click(function () {
                                $.ajax({
                                        type: 'ajax',
                                        method: 'get',
                                        async: false,
                                        url: '<?php echo base_url() ?>layout/deleteLayout',
                                        data: {lay_id: lay_id},
                                        dataType: 'json',
                                        success: function (response) {
                                                if (response.success) {
                                                        $('#deleteModal').modal('hide');
                                                        $('.alert-success').html('Layout deleted successfuly').fadeIn().delay(4000).fadeOut('slow');
                                                        showAllLayout();
                                                } else {
                                                        alert('error');
                                                }
                                        },
                                        error: function () {
                                                alert('error deleting');
                                        }
                                });
                        });
                });
 
                //function
                function showAllLayout() {
                        $.ajax({
                                type: 'ajax',
                                url: '<?php echo base_url() ?>layout/showAllLayout',
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                        var html = '';
                                        var i;
                                        for (i = 0; i < data.length; i++) {
                                                html += '<tr>' +
                                                        '<td>' + data[i].lay_title + '</td>' +
                                                        '<td>' + data[i].lay_desc + '</td>' +
                                             
                                                        '<td>' +
                                                        '<a href="javascript:;" onclick="carousel()" id="viewlay" class="btn btn-default item-view" data ="'
                                                        + data[i].lay_id + ","
                                                        + data[i].lay_weather + ","
                                                        + data[i].lay_time +
                                                        '"><i class="fas fa-eye"></i></a>' +
                                                        '<a href="javascript:;"style="margin-right:10px;" class="btn btn-secondary" data ="' + data[i].lay_id + '"><i class="far fa-edit"></i></a>' +
                                                        '<a href="javascript:;" class="btn btn-danger item-delete" data ="' + data[i].lay_id + '"><i style="color:white;" class="fas fa-trash"></i></a>' +
														
                                                        '</td>' +
                                                        '</tr>';
                                        }
                                        $('#showdata').html(html);
                                },
                                error: function () {
                                        alert('could not get data from Database');
                                }
                        })
                }
        });
</script>
 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
        var slideIndex = 0;
        var myIndex = 0;
        // carousel();
 
        function carousel() {
                // console.log('start carousel');
                var i;
                var x = document.getElementsByClassName("mySlidesLayout");
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}
                setTimeout(carousel, 3000); // Change image every 3 seconds
                showDivs(slideIndex);
                slideIndex++;
                // console.log('end carousel');
        }
 
        function plusDivs(n) {
                showDivs(slideIndex += n);
        }
 
        function currentDiv(n) {
                showDivs(slideIndex = n);
        }
 
        function showDivs(n) {
                var i=1;
                var x = document.getElementsByClassName("mySlidesLayout");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {
                        slideIndex = 1
                }
                if (n < 1) {
                        slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" w3-red", "");
                }
                x[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " w3-red";
        }
</script>
</body>

