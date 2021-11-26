$(function(){
    showAllDisplay();
    //add new
$('#btnAdd').click(function(){
$('#myModal').modal('show');
$('#myModal').find('.modal-title').text('Add new display');
$('#myForm').attr('action','<?php echo base_url() ?>Displays/addDisplay');
});

$('#btnSave').click(function(){
var url = $('#myForm').attr('action');
var data = $('#myForm').serialize();
//validate form
var macadd = $('input[name =txtMacAddress]');
var ipadd = $('input[name =txtIpAddress]');
var result = '';
if (macadd.val()==''){
   macadd.parent().parent().addClass('has-error');
}else{
    macadd.parent().parent().removeClass('has-error');
    result +='1';
}
if (ipadd.val()==''){
    ipcadd.parent().parent().addClass('has-error');
}else{
    ipadd.parent().parent().removeClass('has-error');
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
                $('.alert-success').html('Display '+type+' successfuly').fadeIn().delay(4000).fadeOut('slow');
            showAllDisplay();
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
$('#myModal').find('.modal-title').text('Edit Display');
$('#myForm').attr('action' , '<?php echo base_url() ?>displays/updateDisplay');
$.ajax({
type: 'ajax',
method: 'get',
url: '<?php echo base_url() ?>displays/editDisplay',
data: {id: id},
async: false,
dataType : 'json',
success: function(data){
$('input[name=txtMacAddress]').val(data.mac);
$('input[name=txtIpAddress]').val(data.ip);
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
        url: '<?php echo base_url() ?>displays/deleteDisplay',
        data:{id:id},
        dataType: 'json',
        success: function(response){
        if (response.success){
            $('#deleteModal').modal('hide');
          $('.alert-success').html('Display deleted successfuly').fadeIn().delay(4000).fadeOut('slow') ;    
           showAllDisplay();
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
function showAllDisplay(){
    $.ajax({
        type: 'ajax',
        url:'<?php echo base_url() ?>displays/showAllDisplay',
        async: false,
        dataType:'json',
        success:function(data){
        var html = '' ;
        var i;
        for (i=0; i<data.length; i++){
           html += '<tr>'+
'<td>'+data[i].id+'</td>'+
'<td>'+data[i].mac+'</td>'+
'<td>'+data[i].ip+'</td>'+
'<td>'+data[i].logged+'</td>'+
'<td>'+
'<a href="javascript:;"class="btn btn-info item-edit" data ="'+data[i].id+'">Edit</a>'+
'<a href="javascript:;"class="btn btn-danger item-delete" data ="'+data[i].id+'">Delete</a>'+
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
