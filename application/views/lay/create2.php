<?php $this->load->view('header/header') ?>

<body>

<div class='wrapper'>
	<?php $this->load->view('menu/menu') ?>

	<div class='content isOpen' id="c" style="background-color:white;">
		<header>
			<nav class="nav">
			</nav>
		</header>
		<div class="container" id="c">
			<div class="alert alert-success" style="display: none;"></div>
			<div class="alert alert-fail" style="display: none;"></div>
			<button type="button" id="btnref" class="btn btn right" style="margin-left:700px;" onclick="location.href='<?php echo base_url();?>layout/index/lay'">Finish </button>

			<div class="blog-card">
				<div class="meta">
					<div class="photo"
						 style="background-image: url(https://www.signageadnet.com/wp-content/uploads/2018/02/all-banner-ads-2-1030x433.jpg)"></div>
					<ul class="details">
					</ul>
				</div>
				<div class="description">
					<h1>Add Files</h1>
					<p class="read-more">
						<button id="btnAdd" type="button" class="btn btn-success btn-sm">Add</button>
					</p>
				</div>
			</div>
			<div class="blog-card alt">
				<div class="meta">
					<div class="photo"
						 style="background-image: url(https://33qpzx1dk8tt1qlds735ez93-wpengine.netdna-ssl.com/wp-content/uploads/2015/03/digital-signage-template-weather.jpg)"></div>
					<ul class="details">
					</ul>
				</div>
				<div class="description" id="container">
					<h1>Add Local weather</h1>
				
					<p class="read-more">
						<input type="button" class="btn btn-success btn-sm" id="btnAddWeather" name="btnAddWeather" value="Add"/>
					</p>
				</div>
			</div>

			<div class="blog-card">
				<div class="meta">
					<div class="photo"
						 style="background-image: url(https://i0.wp.com/www.sixteen-nine.net/wp-content/uploads/2019/02/visix-maximize-dwell-time-for-digital-signs.jpg?fit=1200%2C590&ssl=1)"></div>
					<ul class="details">
					</ul>
				</div>
				<div class="description">
					<h1>Add Time</h1>
					
					<p class="read-more">
						<input type="button" class="btn btn-success btn-sm" id="btnAddTime" name="btnAddWeather" value="Add"/>

					</p>
				</div>
			</div>
		</div>


	</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form id="myForm" action="" method="post" class="form-horizontal">
					<?php if (isset($picture_list) && count($picture_list)) { ?>

						<?php foreach ($picture_list as $pic): ?>

							<label>
								<input type="checkbox" name="txtId[]" value="<?php echo $pic->pic_id; ?>"
									   class="img-responsive"
									   href="<?php echo base_url() . 'uploads/' . $pic->pic_file; ?>"
									   target="_blank"><img
									src="<?php echo base_url() . 'uploads/' . $pic->pic_file; ?>" width="100"/>
								<input type="hidden" name="pfile" id="pfile" value="<?php echo $_GET['id'] ?>">

								<br>


							</label>

						<?php
						endforeach;
					}
					?>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {

		//add new
		$('#btnAdd').click(function () {
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add new slider');
			$('#myForm').attr('action', '<?php echo base_url() ?>create2/add');

		});

		$('#btnSave').click(function () {
			var idval = $('#myForm :checkbox:checked').serialize();
			var pf = $('#pfile').val();
			//alert(pf);
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?php echo base_url() ?>create2/add',
				data: idval, pf,
				async: true,
				dataType: 'json',
				success: function (response) {
					if (response.success) {
						$('#myModal').modal('hide');
						$('#myForm')[0].reset();
						var type = '';
						if (response.type === 'add') {
							type = 'added'
						} else if (response.type === 'update') {
							type = 'updated'
						}
						$('.alert-success').html('Image ' + type + ' successfuly').fadeIn().delay(4000).fadeOut('slow');

					} else {
						alert('error');
					}
				},
				error: function () {
					alert('Please select items');
				}

			});

		});


		//$('#btnAddWeather').click(function () {
		//	if($(this).hasClass("btn-success"))
		//	{
		//		$(this).addClass("btn-danger");
		//		$(this).removeClass("btn-success");
		//		$(this).val("Cancel");
		//
		//		$.ajax({
		//			dataType : "json",
		//			method: 'post',
		//			url: '<?php //echo base_url() ?>//create2/addOrDeleteWeather',
		//			data : {"enabled" : 1,
		//				"pfile" : <?php // echo $_GET['id']; ?>//},
		//			async: true,
		//		});
		//
		//	}
		//	else {
		//		$(this).addClass("btn-success");
		//		$(this).removeClass("btn-danger");
		//		$(this).val("Add");
		//		$.ajax({
		//			dataType : "json",
		//			method: 'post',
		//			url: '<?php //echo base_url() ?>//create2/addOrDeleteWeather',
		//			data : {"enabled" : 0, "pfile" : <?php //echo $_GET['id']; ?>//},
		//			async: true,
		//		});
		//	}
		//});

		$('#btnAddTime').click(function () {
			if($(this).hasClass("btn-success"))
			{
				$(this).addClass("btn-danger");
				$(this).removeClass("btn-success");
				$(this).val("Cancel");

				$.ajax({
					dataType : "json",
					method: 'post',
					url: '<?php echo base_url() ?>layout/addOrDeleteTime',
					data : {"enabled" : 1, "pfile" : <?php echo $_GET['id']; ?>},
					async: true,
				});
			}
			else {
				$(this).addClass("btn-success");
				$(this).removeClass("btn-danger");
				$(this).val("Add");

				$.ajax({
					dataType : "json",
					method: 'post',
					url: '<?php echo base_url() ?>layout/addOrDeleteTime',
					data : {"enabled" : 0, "pfile" : <?php echo $_GET['id']; ?>},
					async: true,
				});
			}
		});
	});

	$(document).ready ( function () {
		$(document).on ("click", "#btnAddWeather", function () {
			if($(this).hasClass("btn-success"))
			{
				$(this).addClass("btn-danger");
				$(this).removeClass("btn-success");
				$(this).val("Cancel");

				$.ajax({
					dataType : "json",
					method: 'post',
					url: '<?php echo base_url() ?>layout/addOrDeleteWeather',
					data : {"enabled" : 1, "pfile" : <?php echo $_GET['id']; ?>},
					async: true,
				});

			}
			else {
				$(this).addClass("btn-success");
				$(this).removeClass("btn-danger");
				$(this).val("Add");
				$.ajax({
					dataType : "json",
					method: 'post',
					url: '<?php echo base_url() ?>layout/addOrDeleteWeather',
					data : {"enabled" : 0, "pfile" : <?php echo $_GET['id']; ?>},
					async: true,
				});
			}
		});
	});
</script>
</body>
</html>
