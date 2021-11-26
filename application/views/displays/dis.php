<?php $this->load->view('header/header') ?>

<body>

<div class='wrapper'>
	<?php $this->load->view('menu/menu') ?>

	<div class='content isOpen'>
		<header>
			<nav class="nav">
			</nav>
		</header>
		<div class="container">
			<h3> Displays list </h3>
			<div class="alert alert-success" style="display: none;"></div>
			<button id="btnAdd" class="btn btn-success">Add New</button>
			<button type="button" id="btnref" class="btn btn right" style="margin-left:700px;" onclick="location.href='<?php echo base_url();?>displays/refresh'">Refresh </button>

			<table class="table table-bordered table-responsive" id="tab" style="margin-top: 20px; margin-left: -50px">
				<thead>
				<tr>
					<td>ID</td>
					<td>Adress Mac</td>
					<td>IP Adress</td>
					<td>Logged in?</td>
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
				<form id="myForm" action="" method="post" class="form-horizontal">
					<input type="hidden" name="txtId" value="0">
					<div class="form-group">
						<label for="mac" class="label-control col-md-4"> MAC Address </label>
						<div class="col-md-8">
							<input type="text" name="txtMacAddress" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="ip" class="label-control col-md-4"> IP Address </label>
						<div class="col-md-8">
							<input type="text" name="txtIpAddress" class="form-control">
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
<script>
	$(function () {
		showAllDisplay();
		//add new
		$('#btnAdd').click(function () {
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add new display');
			$('#myForm').attr('action', '<?php echo base_url() ?>Displays/addDisplay');
		});

		$('#btnSave').click(function () {
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			//validate form
			var macadd = $('input[name =txtMacAddress]');
			var ipadd = $('input[name =txtIpAddress]');
			var result = '';
			if (macadd.val() == '') {
				macadd.parent().parent().addClass('has-error');
			} else {
				macadd.parent().parent().removeClass('has-error');
				result += '1';
			}
			if (ipadd.val() == '') {
				ipcadd.parent().parent().addClass('has-error');
			} else {
				ipadd.parent().parent().removeClass('has-error');
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
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if (response.type == 'add') {
								var type = 'added'
							} else if (response.type == 'update') {
								var type = "updated"
							}
							$('.alert-success').html('Display ' + type + ' successfuly').fadeIn().delay(4000).fadeOut('slow');
							showAllDisplay();
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
		$('#showdata').on('click', '.item-edit', function () {
			var id = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit Display');
			$('#myForm').attr('action', '<?php echo base_url() ?>displays/updateDisplay');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url() ?>displays/editDisplay',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function (data) {
					$('input[name=txtMacAddress]').val(data.mac);
					$('input[name=txtIpAddress]').val(data.ip);
					$('input[name=txtId]').val(data.id);
				},
				error: function () {
					alert('could not edit data');
				}
			});

		});
//delete
		$('#showdata').on('click', '.item-delete', function () {
			var id = $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function () {
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url() ?>displays/deleteDisplay',
					data: {id: id},
					dataType: 'json',
					success: function (response) {
						if (response.success) {
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Display deleted successfuly').fadeIn().delay(4000).fadeOut('slow');
							showAllDisplay();
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
		function showAllDisplay() {
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>displays/showAllDisplay',
				async: false,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							'<td>' + data[i].id + '</td>' +
							'<td>' + data[i].mac + '</td>' +
							'<td>' + data[i].ip + '</td>' +
							'<td>' + data[i].logged + '</td>' +
							'<td>' +
							'<a href="javascript:;"class="btn btn-info item-edit" data ="' + data[i].id + '">Edit</a>' +
							'<a href="javascript:;"class="btn btn-danger item-delete" data ="' + data[i].id + '">Delete</a>' +
							' </td>' +
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


</body>
</html>
