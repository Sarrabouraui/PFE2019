<!--
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">

    <div class="t" id="t">
      <div class="cont" id="cont">
    <a class="weatherwidget-io" href="https://forecast7.com/en/36d8010d18/tunis-centre/" data-label_1="TUNIS CENTRE" data-label_2="WEATHER" data-mode="Current" data-days="3" data-theme="pure">TUNIS CENTRE WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</div>
<div class="time" id="tt">
<iframe src="http://free.timeanddate.com/clock/i6oxobhr/n4024/fs16/tt0/tw0/tm1/ts1/tb4" frameborder="0" width="99" height="38"></iframe>
</div>
</div>

<div class="img">
<img src="<?php echo base_url('assets/img/img_lights.jpg'); ?>" alt="">
</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
</div>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div id="div">

	<script>
		!function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = 'https://weatherwidget.io/js/widget.min.js';
				fjs.parentNode.insertBefore(js, fjs);
			}
		}(document, 'script', 'weatherwidget-io-js');
	</script>
</div>


<input type="button" value="+" class="b1" onclick="addRow()">
<script>
	$(document).ready(function () {
		$('.b1').click(function () {
			$('div').append('<a class="weatherwidget-io" href="https://forecast7.com/en/36d8010d18/tunis-centre/" data-label_1="TUNIS CENTRE" data-label_2="WEATHER" data-mode="Current" data-days="3" data-theme="pure">TUNIS CENTRE WEATHER</a>');

		});
	});
</script>
