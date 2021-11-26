<?php $this->load->view('header/header') ?>

<body>

<div class="wrapper" >
	<?php $this->load->view('menu/menu') ?>

	<div class="content isOpen" style="background-color:white;">
		<header>
			<nav class="nav">
			</nav>
		</header>
		<div class="container">
			<h2>List of Pictures</h2>
			<?php if (isset($picture_list) && count($picture_list)) { ?>

				<table class="table table-bordered" id="tab">
					<thead>
					<tr>
						<th>Name</th>
						<th>Type</th>
						<th>Thumbnail</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<a style="margin-bottom:20px; margin-top:10px; color:white;" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" id="up">Upload More</a>
<br />
					<?php foreach ($picture_list as $pic): ?>
						<tr>

							<td><?= $pic->pic_title; ?></td>
							<td><?= $pic->pic_dur; ?></td>
							<td><a href="<?php echo base_url() . '/uploads/' . $pic->pic_file; ?>"
								   target="_blank"><img
										src="<?php echo base_url() . '/uploads/' . $pic->pic_file; ?>"
										width="100"></a>
							</td>
							<td><a href="javascript:;"style="margin-right:10px;" class="btn btn-secondary" data="'+data[i].id+'"><i class="far fa-edit"></i></a>
								<a href="<?php echo base_url() . '/upload/delete/' . $pic->pic_id; ?>"
								class="btn btn-danger item-delete" ><i style="color:white;" class="fas fa-trash"></a></td>
						</tr>
					<?php endforeach; ?>

					</tbody>
				</table>
				<br/>
			<?php } else { ?>
				<h4>No pictures have been uploaded,  Click this button to
					<a data-toggle="modal" data-target="#exampleModal" style="color:white;" class="btn btn-success">upload</a></h4>

			<?php } ?>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload a picture!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="color:red">
					<?php echo validation_errors(); if (isset($error)) { print $error; } ?>
				</div>
<!--					--><?php //echo form_open_multipart('upload/do_upload'); ?>
				<form method="post" action="<?=base_url('upload/save')?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="pic_title">Picture Name*:</label>
						<input type="text" class="form-control" name="pic_title" value="<?= set_value('pic_title'); ?>" id="pic_title">
					</div>
					<div class="form-group">
						<label for="pic_dur">Type:*</label>
						<textarea name="pic_dur" class="form-control" id="pic_dur"><?= set_value('pic_dur'); ?></textarea>
					</div>
					<div class="form-group">
						<label for="pic_file">Select Image*:</label>
						<input type="file" name="pic_file" class="form-control" id="pic_file">
					</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
