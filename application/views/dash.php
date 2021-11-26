<?php $this->load->view('header/header') ?>
<head>
        <title>Dashboard</title>
<style>
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300);

/* fontawesome */
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}
.left {
  float: left;
}
.right {
  float: right;
}


.buysblock {
  background: rgb(39,183,121);
  
}
.commentsblock {
  background: rgb(255,0,0);
  margin-left: -100px;
}

.metroblock {
  width: 21em;
  padding: 0em 1em 1em 1em;
  color: #fff;
  font-family: 'Open Sans', sans-serif;
  margin: 7em;
  margin-left: 16px;
}

.metroblock h1, .metroblock h2, .metroblock .icon {
  font-weight: 300;
  margin: 0;
  padding: 0;
}
.metroblock h1, .metroblock .icon {
  font-size: 7em;
  text-align: center;
}
.metroblock .icon {
  margin-right: .2em;
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
                <div class="container">

<div class="metroblock buysblock left ">
  <span class="fas fa-desktop left" style="font-size:100px;color:white;margin-top:20px;"></span>
  <h1><?php //print_r($di[0]); 
  foreach ($di as $di) {
        print_r($di);
    }?></h1>
  <div class="clear"></div>
  <h2>Displays ON </h2>
</div>
<div class="metroblock commentsblock right ">
  <span class="fas fa-desktop right" style="font-size:100px;color:white;margin-top:20px;"></span>
  <h1><?php //print_r($di[0]); 
  foreach ($dis as $dis) {
        print_r($dis);
    }?></h1>
  <div class="clear"></div>
  <h2>Displays OFF</h2>
</div>

</div>
</div>
</div>

</body>