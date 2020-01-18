<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
		<style>
		select{
			border-radius: 10px;
			width:200px;
			height:60px;
		}
		html,body{
			height:100%;
		}
		.rolldown-list {
		  text-align: left;
		  padding: 0;
		  margin: 0;
		}

		.rolldown-list li {
		  padding: 1em;
		  margin-bottom: .125em;
		  display: block;
		  list-style: none;
		  text-transform: uppercase;
		}

		.rolldown-list li {
		  visibility: hidden;
		  animation: rolldown .7s 1;
		  transform-origin: 50% 0;
		  animation-fill-mode: forwards;
		}

		.rolldown-list li:nth-child(2n) {
		  background-color: #dadada;
		}

		.rolldown-list li:nth-child(2n+1) {
		  background-color: #dadada;
		}

		#myList {
		  position: absolute;
		  width: 50%;
		  left: 50%;
		  margin-left: -25%;
		}

		#btnReload {
		  float: right;
		  color: #333;
		  background: #ccc;
		  text-transform: uppercase;
		  border: none;
		  padding: .5em 1em;
		}

		#btnReload:hover {
		  background: #ddd;
		}

		@keyframes rolldown {
		  0% {
			visibility: visible;
			transform: rotateX(180deg) perspective(500px);
		  }
		  70% {
			visibility: visible;
			transform: rotateX(-20deg);
		  }
		  100% {
			visibility: visible;
			transform: rotateX(0deg);
		  }
		}
		</style>
		<script>
		const convertTime12to24 = (time12h) => {
		  const [time, modifier] = time12h.split(' ');

		  let [hours, minutes] = time.split(':');

		  if (hours === '12') {
			hours = '00';
		  }

		  if (modifier === 'PM') {
			hours = parseInt(hours, 10) + 12;
		  }

		  return `${hours}:${minutes}`;
		}
		function setAlarm1(){
			var hr=document.getElementById('hour').value;
			var min=document.getElementById('minute').value;
			var ampm=document.getElementById('ampm').value;
			var v1 = convertTime12to24(hr+":"+min+" "+ampm);
			//var alarmDate="Fri Apr 05 2019 04:36:00";
			var date1=
			var vaal ="2019-08-30T"+String(v1)+":00+0000";
			var myDate = new Date(vaal);
			var neresult = myDate.getTime();
			var result = new Date().getTime()+19800000;
			console.log(neresult);
			console.log(result);
			window.setTimeout(function() {alaramringing();}, neresult - result);
			alert("Alarm is Successfull Set");
		}
		function alaramringing()
		{
			var alaram = document.getElementById('alarm-ring');
			alaram.play();
			if(confirm("Are you WakeUP!!")){
				alaram.pause();
			}
			else{
				alaram.pause();
			}
		}
		$(document).ready(function() {
			$('#calculate').click(function() {
				if($('#hour').val() != '(hour)' && $('#minute').val() != '(minute)') {
					$('#start').hide();
					var setTime = new Date();

					if($('#hour').val() == 12) {
						$('#hour').val(0);
					}

					if($('#ampm').val() == "AM") {
						setTime.setHours($('#hour').val());
					}
					else if($('#ampm').val() == "PM") {
						setTime.setHours(+$('#hour').val() + 12);
					}

					setTime.setMinutes($('#minute').val());

					var res1 = new Date(setTime.getTime() - 270*60000);
					var res2 = new Date(res1.getTime() - 90*60000);
					var res3 = new Date(res2.getTime() - 90*60000);
					var res4 = new Date(res3.getTime() - 90*60000);

					function retDate(dateObj) {
						var formatted = '';
						var pm = false;
						if(dateObj.getHours() > 12) {
							formatted = dateObj.getHours() - 12;
							pm = true;
						} else if(dateObj.getHours() < 12 && dateObj.getHours() != 0) {
							formatted = dateObj.getHours();
						} else if(dateObj.getHours() == 0){
							formatted = "12";
						} else if(dateObj.getHours() == 12){
							formatted = "12";
							pm = true;
						}
						if(dateObj.getMinutes() < 10) {
							formatted = formatted + ":0" + dateObj.getMinutes();
						} else {
							formatted = formatted + ":" + dateObj.getMinutes();
						}
						if(pm == true) {
							formatted = formatted + " PM";
						} else {
							formatted = formatted + " AM";
						}
						return formatted;
					}

					$('#r4').html(String(retDate(res1)));
					$('#r3').html(String(retDate(res2)));
					$('#r2').html(String(retDate(res3)));
					$('#r1').html(String(retDate(res4)));
					$('#results').css('display', 'block');
				} // end hour/minute check if
				else {
					alert("Please select an hour and a minute before trying to calculate!");
				} // end not-filled check
			}); // end calculate
			$('.rolldown-list li').each(function () {
			  var delay = ($(this).index() / 4) + 's';
			  $(this).css({
				webkitAnimationDelay: delay,
				mozAnimationDelay: delay,
				animationDelay: delay
			  });
			});
		});
	</script>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        
                    </a>
                </div>
                <!-- End Logo -->

            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">Set Alarm</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Alarm</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Alarm</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                            <select id="hour">
								<option>(hour)</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
							</select>
							<select id="minute">
								<option>(minute)</option>
								<option>00</option>
								<option>05</option>
								<option>10</option>
								<option>15</option>
								<option>20</option>
								<option>25</option>
								<option>30</option>
								<option>35</option>
								<option>40</option>
								<option>45</option>
								<option>50</option>
								<option>55</option>
							</select>
							<select id="ampm">
								<option>AM</option>
								<option>PM</option>
							</select>
							<button id="calculate" style="width:200px;height:60px" onClick="setAlarm1();">Set Alarm</button>
                        </div>
						<audio id="alarm-ring" preload>
							<source src="birds_and_melody.mp3" type="audio/mpeg" />
						</audio>
                </div>
				<div class="row">
					<div id="results" style="display: none">
						<h1>You Should Sleep on this Time</h1>
						<ul class="rolldown-list" id="myList">
						  <li id="r1">One</li>
						  <li id="r2">Two</li>
						  <li id="r3">Three</li>
						  <li id="r4"></li>
						</ul>
					</div>
				</div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>
