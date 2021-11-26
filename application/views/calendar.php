<?php $this->load->view('header/header') ?>
<head>
        <title>Calendar Display</title>
<style>
#calendar{
  margin-top:100px;
  margin-left:-50px;
  margin-bottom: 50px;
  width:1000px;
  height:350px;
}
</style>
</head>
 
<body>
 
<div class='wrapper'>
        <?php $this->load->view('menu/menu') ?>
        <div class='content isOpen' id="c"style="background-color:white;">
                <header>
                        <nav class="nav">
                        </nav>
                </header>
               <!-- <div class="container">style="margin-top: 80px;"-->
                <h1 style='magin-top:80px;'>Planner</h1>
                <div id="calendar">
<!--</div>-->
        </div>
</div>
 
<script type="text/javascript">
$(document).ready(function() {
    $('#calendar').fullCalendar({

    });
});

var date_last_clicked = null;

$('#calendar').fullCalendar({
    eventSources: [
    {
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '<?php echo base_url() ?>calendar/get_events',
                dataType: 'json',
                data: {                
                    start: start.unix(),
                    end: end.unix()
                },
                success: function(msg) {
                    var events = msg.events;
                    callback(events);
                }
            });
       }
    },
    ],
    dayClick: function(date, jsEvent, view) {
        date_last_clicked = $(this);
        $(this).css('background-color', '#bed7f3');
        $('#addModal').modal();
	},
	eventClick: function(event, jsEvent, view) {
          $('#name').val(event.title);
          $('#description').val(event.description);
          //$('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          $('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          if(event.end) {
            $('#end_date').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
          } else {
            $('#end_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          }
          $('#event_id').val(event.id);
          $('#editModal').modal();
},
});


$('#calendar').fullCalendar({
    eventSources: [
            {
                color: '#18b9e6',   
                textColor: '#000000',
                events: []
            }
        ]
});

</script>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a program</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
      <form id="myForm" action="" method="post" class="form-horizontal">
      <div class="form-group">
      <label for="p-in" class="col-md-4 label-heading">Name</label>
      <div class="col-md-8 ui-front">

      <select class="form-control" name="name" >

<?php if( isset($lays)){ ?>

<?php foreach ($lays as $layouts ): ?>

<option value="<?php echo $layouts->lay_title;?>" ><?php echo $layouts->lay_title;?></option><br>

<?php endforeach; ?>
<?php }  ?> 
</select>
</div>
</div>


        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Description</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="description">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="start_date">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="end_date">
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add program">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>





	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Calendar program</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">program Name</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="" id="name">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Description</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="description" id="description">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="start_date" id="start_date">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="end_date" id="end_date">
                </div>
        </div>
        <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">Delete program</label>
                    <div class="col-md-8">
                        <input type="checkbox" name="delete" value="1">
                    </div>
            </div>
            <input type="hidden" name="eventid" id="event_id" value="0" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div> 
 

</body>

