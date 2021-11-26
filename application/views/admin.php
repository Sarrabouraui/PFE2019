<?php $this->load->view('header/header') ?>

<body>

<div class="wrapper" >

	<div class="content isOpen" style="background-color:#EEEEEE;">
		<header>
			<nav class="nav">
			</nav>
		</header>
		<div class="container">
        <h3> Users list </h3>
    <div class="alert alert-success" style="display: none;"></div>
    <button id="btnAdd" class="btn btn-success">Add New </button>
    <table class="table table-hover" id="tab" style="margin-top: 20px; margin-left: -50px">
    <thead>
    <tr>
    <td>Username</td>
    <td>Password</td>
    <td>Action</td>
    </tr>
    </thead>
    <tbody id="showdata">
    
   
    </tbody>
    </table>
    </div>

    </div>
</div>

    <div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="myForm"action="" method="post" class="form-horizontal">
      <input type="hidden" name="txtId" value="0" >
      <div class="form-group">
      <label for="name" class="label-control col-md-4" > Username </label>
     <div class="col-md-8">
<input type="text"name="txtName" class="form-control">
     </div>
      </div>
      <div class="form-group">
      <label for="pass"  class="label-control col-md-4" > Password </label>
     <div class="col-md-8">
<input type="text"name="txtPass" class="form-control">
     </div>
      </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <script>
    $(function(){
        showAllUser();
        //add new
$('#btnAdd').click(function(){
    $('#myModal').modal('show');
    $('#myModal').find('.modal-title').text('Add new user');
    $('#myForm').attr('action','<?php echo base_url() ?>admin/addUser');
});

$('#btnSave').click(function(){
    var url = $('#myForm').attr('action');
    var data = $('#myForm').serialize();
    //validate form
    var nameadd = $('input[name =txtName]');
    var passadd = $('input[name =txtPass]');
    var result = '';
    if (nameadd.val()==''){
        nameadd.parent().parent().addClass('has-error');
    }else{
        nameadd.parent().parent().removeClass('has-error');
        result +='1';
    }
    if (passadd.val()==''){
        passadd.parent().parent().addClass('has-error');
    }else{
        passadd.parent().parent().removeClass('has-error');
        result +='2';
    }
    if(result=='12'){
        $.ajax({
            type: 'ajax',
            method: 'post',
            url : url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(response){
                if(response.success){
                    $('#myModal').modal('hide');
                    $('#myForm')[0].reset();
                   if (response.type=='add'){
                    var type='added'
                   }else if (response.type=='update') {
                    var type="updated"
                   }
                    $('.alert-success').html('User '+type+' successfuly').fadeIn().delay(4000).fadeOut('slow');
                showAllUser();
                }else{
                    alert('error');
                }
            },
            error: function(){
                alert('could not add data');
            }
        });
    }

});
//edit
$('#showdata').on('click','.item-edit', function(){
var id= $(this).attr('data');
$('#myModal').modal('show');
$('#myModal').find('.modal-title').text('Edit User');
$('#myForm').attr('action' , '<?php echo base_url() ?>admin/updateUser');
$.ajax({
    type: 'ajax',
    method: 'get',
    url: '<?php echo base_url() ?>admin/editUser',
    data: {id: id},
    async: false,
    dataType : 'json',
    success: function(data){
$('input[name=txtName]').val(data.username);
$('input[name=txtPass]').val(data.password);
$('input[name=txtId]').val(data.id);
    },
    error: function(){
        alert('could not edit data');
    }
});

});
//delete
$('#showdata').on('click','.item-delete', function(){
var id = $(this).attr('data');
$('#deleteModal').modal('show');
$('#btnDelete').unbind().click(function(){
    $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: '<?php echo base_url() ?>admin/deleteUser',
            data:{id:id},
            dataType: 'json',
            success: function(response){
            if (response.success){
                $('#deleteModal').modal('hide');
              $('.alert-success').html('User deleted successfuly').fadeIn().delay(4000).fadeOut('slow') ;    
               showAllUser();
            }else{
                alert('error');
            }
                },
            error: function(){
                alert('error deleting');
            }
        });
});
});
    //function
    function showAllUser(){
        $.ajax({
            type: 'ajax',
            url:'<?php echo base_url() ?>admin/showAllUser',
            async: false,
            dataType:'json',
            success:function(data){
            var html = '' ;
            var i;
            for (i=0; i<data.length; i++){
               html += '<tr>'+
    '<td>'+data[i].username+'</td>'+
    '<td>'+data[i].password+'</td>'+
    '<td>'+
    '<a href="javascript:;"style="margin-right:10px;"class="btn btn-secondary" data ="'+data[i].id+'"><i class="far fa-edit"></i></a>'+
    '<a href="javascript:;"class="btn btn-danger item-delete" data ="'+data[i].id+'"><i style="color:white;" class="fas fa-trash"></i></a>'+
   ' </td>'+
    '</tr>';
            }
            $('#showdata').html(html);
            },
            error: function(){
                alert('could not get data from Database');
            }
        })
    }
    });
    </script>


  




    

</body>
