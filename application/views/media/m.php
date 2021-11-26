<!--<html>-->
<!--<head>-->
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"-->
<!--		  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<!---->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--assets/css/m.css">-->
<!--	<script type='text/javascript' src="--><?php //echo base_url(); ?><!--assets/javascript/m.js"></script>-->
<!--	<!-- Compiled and minified CSS -->-->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->
<!---->
<!--	<!-- Compiled and minified JavaScript -->-->
<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
<!---->
<!--	<script src="https://use.fontawesome.com/532236494c.js"></script>-->
<!---->
<!--	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"-->
<!--			integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
<!--			crossorigin="anonymous"></script>-->
<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"-->
<!--			integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"-->
<!--			crossorigin="anonymous"></script>-->
<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"-->
<!--			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"-->
<!--			crossorigin="anonymous"></script>-->
<!--	<script>-->
<!--		$('#myModal').on('shown.bs.modal', function () {-->
<!--			$('#myInput').trigger('focus')-->
<!--		})-->
<!--	</script>-->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--vendor/dropzone/dropzone.min.css">-->
<!--	<style>-->
<!--		body {-->
<!--			background: #7f7f7;-->
<!--		}-->
<!---->
<!--		.dropzone {-->
<!--			background: #fff;-->
<!--			border: 2px dashed #ddd;-->
<!--			border-radius: 5px;-->
<!--		}-->
<!---->
<!--		.dz-message {-->
<!--			color: #999;-->
<!--		}-->
<!---->
<!--		.dz-message:hover {-->
<!--			color: #464646;-->
<!--		}-->
<!---->
<!--		.dz-message h3 {-->
<!--			font-size: 200%;-->
<!--			margin-bottom: 15px;-->
<!--		}-->
<!---->
<!--	</style>-->
<!---->
<!--</head>-->

<?php $this->load->view('header/header') ?>


<body>


<div class='wrapper'>
	<?php $this->load->view('menu/menu') ?>


	<div class='content isOpen'>

		<header>

			<nav class="nav">

			</nav>
		</header>


		<!--
                    <aside class="search-button">
                      <div class="container">
                          <span class="lupa">
                            <i class="fa fa-search" id="fas"></i>
                          </span>
                          <input type="search" id="search" placeholder="search..." />
                      </div>
                      <div class="floater-bottom">
         <div class="button1">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" id="up">
       Add media
      </button>
                      </div>
          </div>
                  </aside>

              <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <div>
                          <button class="button-three">Remove</button>
                          <button class="button-three">Edit</button>

                        </div></td>
                    </tr>



                </tbody>
              </table>
      </div>
      </div>
      -->


		<!-- Button trigger modal -->


		<!-- Modal

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="content">
 <div id="my-dropzone"  class="dropzone">
 <div class="dz-message">
 <h3> Drop files here </h3> or <strong> click </strong> to upload
 </div>
 </div>
        <script  src="<?php echo base_url(); ?>vendor/dropzone/dropzone.min.js"></script>
    <script  src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
<script>
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#my-dropzone" , {
url: "<?php echo site_url("im/upload") ?>",
addRemoveLinks: true,
removedfile: function(file){
   var name = file.name;
   $.ajax({
       type: "post",
       url: "<?php echo site_url("im/remove") ?>",
       data: {file: name},
       datatype: 'html'
   });
   var previewElement;
   return (previewElement = file.previewElement) != null ?(
   previewElement.parentNode.removeChild(
       file.previewElement)) : (void 0);
},
init: function(){
    var me = this;
    $.get("<?php echo site_url("im/list_files") ?>", function(data){
        if (data.length > 0){
            $.each(data , function (key,value){
                var mockfile = value;
                me.emit("addedfile",mockfile);
                me.emit("thumbnail" , mockfile , "<?php echo base_url(); ?>uploads/" + value.name);
                me.emit("complete", mockfile);
            })
        }
    });
}
} );
</script>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="up">upload</button>
      </div>
    </div>
  </div>
</div>

-->
</body>
</html>
