<?php $this->load->view('header/header') ?>
	<script>
		$(function () {
			$("#datepicker").datepicker();
		});
	</script>

</head>

<body>
<div class='wrapper'>
	<?php $this->load->view('menu/menu') ?>


	<div class='content isOpen' id="c">
		<header>
			<nav class="nav">
			</nav>
		</header>
		<div class="container" style="padding-top: 60px; padding-left: 40px;">
			<div class="form-group" style="padding-top:40px;">
				<form methode="post" action="<?= base_url('create/addLayout'); ?>">
					<div style="color:red">
						<?php echo validation_errors(); ?>
						<?php if (isset($error)) {
							print $error;
						} ?>
					</div>
					<?php echo form_open_multipart('create/addLayout'); ?>
					<label for="lay_title">Layouts Name*:</label>
					<input type="text" name="lay_title" value="<?= set_value('lay_title'); ?>" id="lay_title">
					<label>Duration:*</label>
					<fieldset>From:
						<input type="time" id="input_from" name="lay_from" value="<?= set_value('lay_from'); ?>"
							   id="lay_from">
					</fieldset>
					<br/>
					<fieldset>To:
						<input type="time" id="input_to" name="lay_to" value="<?= set_value('lay_to'); ?>" id="lay_to">
					</fieldset>


					<br/>


					<label for="pic_date">Date*:</label>
					<p><input type="text" id="datepicker" name="lay_date" value="<?= set_value('lay_date'); ?>"
							  id="lay_date"></p>


					<?php if (isset($picture_list) && count($picture_list)) { ?>


						<?php foreach ($picture_list as $pic): ?>

							<label><!--class="image-checkbox"-->
								<input type="checkbox" name="pic_id[]" value="<?php echo $pic->pic_id; ?>"
									   class="img-responsive"
									   href="<?= base_url() . 'assets/uploads/' . $pic->pic_file; ?>"
									   target="_blank"><img
									src="<?= base_url() . 'assets/uploads/' . $pic->pic_file; ?>"
									width="100"/> <?php echo $pic->pic_title; ?> <br>
								<input hidden="hidden" name="pic_id[]" value="<?php echo $pic->pic_id; ?>"/>


								<!--<i class="fa fa-check"></i>-->
							</label>


						<?php endforeach; ?>


					<?php } ?>


					<br/>
			</div>


			<!-- <button onclick="window.location.href='http://localhost:8081/CC/create2/index/create2'" type="submit" class="btn btn-success">Create</button>
           -->
			<button type="submit" name="submit" class="btn btn-success">Create</button>


			<!--<input name="btn" type="submit" value="save" class="btn btn-success" action="<?= base_url() . 'layouts/save'; ?>"></button>
-->
			</form>

		</div>

	</div>
</div>


</body>
</html>


<!--<html>
  <head>
  <title>Create layouts 2</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/home.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/layouts.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



<script>
  $(function () {

$('input[name="presetimage"]').on('click', function() {
    $(".image-checkbox-checked")
    $(this).parent().toggleClass("image-checkbox-checked");
});
})
  </script>
<script>
$(function () {
  $("div[id^='myModal']").each(function(){
  
  var currentModal = $(this);
  
  //click next
  currentModal.find('.btn-next').click(function(){
    currentModal.modal('hide');
    currentModal.closest("div[id^='myModal']").nextAll("div[id^='myModal']").first().modal('show'); 
  });
  
  //click prev
  currentModal.find('.btn-prev').click(function(){
    currentModal.modal('hide');
    currentModal.closest("div[id^='myModal']").prevAll("div[id^='myModal']").first().modal('show'); 
  });

});

})
</script>



 

  </head>
  <body>
  <div class='wrapper'>
  <div class='sidebar'>
    <div class='title' >
    Menu
    </div>
   

    <ul>
            <li>
                <a href="#">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                  
                </li>
                <li >
                <a href="<?php echo base_url(); ?>displays/index/dis">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            Displays
                        </span>
                    </a>
                    

                    
                </li>
                <li >
                <a href="<?php echo base_url(); ?>welcome/index/picture_list">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Media
                        </span>
                    </a>
                   
                </li>
                
                <li >
                    <a href="#">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Layouts
                        </span>
                    </a>
                <li >
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>

                <li >
                   <a href="#">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Planner
                        </span>
                    </a>
                </li>

                <li >
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Help
                        </span>
                    </a>
                </li>
            

       
                <li>
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
         

</div>
  
  <div class='content isOpen' id="c" style="width:1400px;">

 
<header>
       
       <nav class="nav">
     
       </nav>

     </header> 
     <div class="container" style="padding-top: 75px;
padding-left: 0px;">


<div class="progress" style="margin-top:20px;"  >
  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%;">
    60% Complete 
  </div>
 
</div>
  <button style="margin-top:-40px;" type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-primary" id="up">Upload More</button>
 


<button style="width:120px; height:39px; margin-top:120px; margin-left:-125px;" class="btn btn-success"data-toggle="modal" data-target="#myModal3" ><i class="fas fa-cloud-sun"></i></button>


<script>
$(document).ready(function(){
  $('#b1').click(function(){
      $('h1').append('<a class="weatherwidget-io" href="https://forecast7.com/en/33d899d54/tunisia/" data-label_1="TUNISIA" data-label_2="WEATHER" data-days="5" data-theme="original" style="width:315px; left:280px;">TUNISIA WEATHER</a>');
 
  });
});
</script>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>




<div>

<button style="width:120px; height:39px; margin-top:-39px; margin-left:150px;" id="b2" class="btn btn-success"onclick="addRow()"><i class="far fa-clock"></i>

</button>

</div>




<script>
$(document).ready(function(){
  $('#b2').click(function(){
      $('h2').append('<iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:260px; margin-top:0px;padding:0;width:450px;height:450px;"src="https://www.clocklink.com/html5embed.php?clock=039&timezone=GMT0100&color=black&size=450&Title=&Message=&Target=&From=2019,1,1,0,0,0&Color=black"></iframe>');
 
  });
});
</script>



  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
 
    <h1>


</h1>

<h2>

</h2>


</div>




    </div>
    <div class="carousel-item" id="a">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
</div>
  
  </div>
</div>



<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img  src="<?php echo base_url('assets/img/wpe.png'); ?>" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  id="b1" onclick="addRow()">Add to layout</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
<div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">List of Pictures
</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="" method="post">
      <?php if (isset($picture_list) && count($picture_list)) { ?>


<?php foreach ($picture_list as $pic): ?>

                        <label >
                        <input  type="checkbox" name="pic_id[]" value="<?php $pic->pic_id; ?>"
                        class="img-responsive"  href="<?= base_url() . 'assets/uploads/' . $pic->pic_file; ?>"
                         target="_blank">
                         <img src="<?= base_url() . 'assets/uploads/' . $pic->pic_file; ?>"
                         width="100" /> <?php //echo $pic->pic_title; ?> <br>
                        <input hidden="hidden" name="pic_id[]" value="<?php echo $pic->pic_id; ?>" />
    

                        </label>


<?php endforeach; ?>



<?php } ?>  -->
<!--
<?php if (isset($picture_list) && count($picture_list)) { ?>


<?php foreach ($picture_list as $pic): ?>

                      <label class="image-checkbox">
                          <img class="img-responsive"  href="<?= base_url() . 'assets/uploads/' . $pic->pic_file; ?>" target="_blank"><img src="<?= base_url() . 'assets/uploads/' . $pic->pic_file; ?>" width="100" />
                          <input  type="checkbox" id="" name="presetimage" value="" />
                          <i class="fa fa-check"></i>
                      </label>


<?php endforeach ?>


<br />

<?php } ?>

-->
<!--</form>
    </div>
    <div class="modal-footer">
    
      <button type="submit" class="btn btn-default btn-next">submit</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>




<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" >
<div class="modal-dialog" >
<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">reorder pictures
</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">


</div>



  <div class="modal-footer">
  <button type="button" class="btn btn-default btn-prev">Prev</button>
      <button type="button" class="btn btn-default btn-next">Next</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
</div>

  </body>
</html>-->
