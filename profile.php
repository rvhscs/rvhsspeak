<!DOCTYPE html>
<html>
	<head>
		<title>RVHS Speak - Profile</title>
		<?php
			if (! isset($_GET["id"])) {
				header("location: /");
			}
		
			$incdoc = file_get_contents("inc/incdoc.php");
			$header = file_get_contents("inc/header.php");
			$footer = file_get_contents("inc/footer.php");
			echo $incdoc;
		?>
	</head>
	<body>
		<?php 
			echo $header;
			
			$users = array(
				array(
					"Max",
					"I like cheese<br/>
					I like cheese in tacos",
					"http://icons.iconarchive.com/icons/tatice/cristal-intense/256/Rubiks-cube-icon.png",
				),
				array(
					"Jake",
					"I like avocado<br/>
					I like avocado in tacos",
					"https://cdn1.iconfinder.com/data/icons/pretty-office-part-13-simple-style/512/emoticons.png",
				)
			);
			
			$bdct = "";

			if (! isset($users[$_GET["id"]])) {
				$bdct = "Profile not Found";
			} else {
				$bdct = $users[$_GET["id"]][0];
			}
		?>
		
		<div class="container-fluid">
			<div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><a href="#"><?php echo $bdct; ?></a></h3>
                </div>
                <div class="panel-body">
					<div class="col-md-8">
						<?php 
							if (! isset($users[$_GET["id"]])) {
								?>
									Nothing to show.
								<?php
								die();
							}
							
							echo $users[$_GET["id"]][1];
						?>
						<img src="<?php echo $users[$_GET["id"]][2] ?>"/>
					</div>
				</div>
			</div>
		</div>
		
		<?php 
			echo $footer;
		?>
	</body>
</html>
