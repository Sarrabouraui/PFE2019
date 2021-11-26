<body id="showdata">
   
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
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
 <script>
 $('#showdata').( function () {
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