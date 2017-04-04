<?php
      session_start();
      require('dbconn.php');

      $query = "SELECT * FROM projects WHERE project_id = 17;";
      $result = pg_query($dbconn, $query);
      $plen = false;
      $num = 0;
      if(pg_num_rows($result) == 1) {
        $plen = true;
        $num++;
      }
      $query = "SELECT * FROM projects WHERE project_id = 3;";
      $result = pg_query($dbconn, $query);
      $jack = false;
      if(pg_num_rows($result) == 1) {
        $jack = true;
        $num++;
      }
?>

<div id='theCarousel' class='carousel slide' data-ride='carousel' data-interval='9000'>

<?php
	if ($num == 1) {
		echo "
		<ol class='carousel-indicators'>
			<li data-target='#theCarousel' data-slide-to='0' class='active'></li>
			<li data-target='#theCarousel' data-slide-to='1'></li>
		</ol>";
	} else if ($num == 2) {
		echo"
		<ol class='carousel-indicators'>
			<li data-target='#theCarousel' data-slide-to='0' class='active'></li>
			<li data-target='#theCarousel' data-slide-to='1'></li>
			<li data-target='#theCarousel' data-slide-to='2'></li>
		</ol>
		";
	}
?>

<?php
	if ($num == 0) {
		echo "
			<div class='carousel-inner'>
	
				<div class='item active'>
				<img src='img/nyc-skyline.jpg' alt='First Slide'>
					<div class='slide1'></div>
					<div class='carousel-caption carousel-caption-middle'>
						<p class='carousel-big-text'>Hello Visionaries!</p>
						<hr>
						<p class='carousel-small-text'>Fund Hunter provides a platform for creative individuals to realise their dreams.</p>
						<p class='carousel-small-text'>Make the first step and launch your project today.</p>
						<br>
						<p><a href='projectcreation.php' class='btn btn-primary btn-lg'>Get started</a></p>
					</div>
					</div>
				</div>

			</div>
		";
	} else if ($num == 1 && $plen == true) {
		echo "
			<div class='carousel-inner'>
	
				<div class='item active'>
					<img src='img/nyc-skyline.jpg' alt='First Slide'>
					<div class='slide1'></div>
					<div class='carousel-caption carousel-caption-middle'>
						<p class='carousel-big-text'>Hello Visionaries!</p>
						<hr>
						<p class='carousel-small-text'>Fund Hunter provides a platform for creative individuals to realise their dreams.</p>
						<p class='carousel-small-text'>Make the first step and launch your project today.</p>
						<br>
						<p><a href='projectcreation.php' class='btn btn-primary btn-lg'>Get started</a></p>
					</div>
				</div>

				<div class='item'>
					<img src='img/plen-cube2.jpg' alt='Second Slide'>
					<div class='slide2'></div>
					<div class='carousel-caption'>
						<p class='carousel-big-text'>PLEN Cube  -  The Portable Personal Assistant Robot</p><br>
						<p class='carousel-small-text'>Your customizable, palm-sized companion featuring a smart camera and automation skills.</p>
						<p class='carousel-small-text'>There for you wherever you go.</p>
						<br>
						<p><a href='projectprofile.php?id=17' class='btn btn-primary btn-lg'>Learn more</a></p>
					</div>
				</div>

			</div>
		";
	} else if ($num == 1 && $jack == true) {
		echo "
			<div class='carousel-inner'>
	
				<div class='item active'>
					<img src='img/nyc-skyline.jpg' alt='First Slide'>
					<div class='slide1'></div>
					<div class='carousel-caption carousel-caption-middle'>
						<p class='carousel-big-text'>Hello Visionaries!</p>
						<hr>
						<p class='carousel-small-text'>Fund Hunter provides a platform for creative individuals to realise their dreams.</p>
						<p class='carousel-small-text'>Make the first step and launch your project today.</p>
						<br>
						<p><a href='projectcreation.php' class='btn btn-primary btn-lg'>Get started</a></p>
					</div>
				</div>

				<div class='item'>
					<img src='img/jack2.png' alt='Second Slide'>
					<div class='slide2'></div>
					<div class='carousel-caption carousel-caption-middle black-font'>
						<p class='carousel-med-text'>Make Any Headphones Wireless</p><br>
						<p class='carousel-small-text'>This tiny device brings Bluetooth capability to all of your audio devices.</p>
						<br>
						<p><a href='projectprofile.php?id=3' class='btn btn-primary btn-lg'>Learn more</a></p>
					</div>
				</div>

			</div>
		";
	} else {
		echo "
		<div class='carousel-inner'>
	
			<div class='item active'>
			<img src='img/nyc-skyline.jpg' alt='First Slide'>
			<div class='slide1'></div>
			<div class='carousel-caption carousel-caption-middle'>
				<p class='carousel-big-text'>Hello Visionaries!</p>
				<hr>
				<p class='carousel-small-text'>Fund Hunter provides a platform for creative individuals to realise their dreams.</p>
				<p class='carousel-small-text'>Make the first step and launch your project today.</p>
				<br>
				<p><a href='projectcreation.php' class='btn btn-primary btn-lg'>Get started</a></p>
			</div>
			</div>

			<div class='item'>
			<img src='img/plen-cube2.jpg' alt='Second Slide'>
			<div class='slide2'></div>
			<div class='carousel-caption'>
				<p class='carousel-big-text'>PLEN Cube  -  The Portable Personal Assistant Robot</p><br>
				<p class='carousel-small-text'>Your customizable, palm-sized companion featuring a smart camera and automation skills.</p>
				<p class='carousel-small-text'>There for you wherever you go.</p>
				<br>
				<p><a href='projectprofile.php?id=17' class='btn btn-primary btn-lg'>Learn more</a></p>
			</div>
			</div>

			<div class='item'>
			<img src='img/jack2.png' alt='Third Slide'>
			<div class='slide3'></div>
			<div class='carousel-caption carousel-caption-middle black-font'>
				<p class='carousel-med-text'>Make Any Headphones Wireless</p><br>
				<p class='carousel-small-text'>This tiny device brings Bluetooth capability to all of your audio devices.</p>
				<br>
				<p><a href='projectprofile.php?id=3' class='btn btn-primary btn-lg'>Learn more</a></p>
			</div>
			</div>

		</div>
		";
	}
?>

	<a class='left carousel-control' href='#theCarousel' data-slide='prev'>
	<span class='glyphicon glyphicon-chevron-left'></span></a>

	<a class='right carousel-control' href='#theCarousel' data-slide='next'>
	<span class='glyphicon glyphicon-chevron-right'></span></a>
</div>
<br>