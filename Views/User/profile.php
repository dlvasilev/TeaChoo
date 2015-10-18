<!-- Main -->
<article id="main">

	<header class="special container">
		<span class="icon fa-user"></span>
	
	</header>

	<!-- One -->
		<section class="wrapper style4 special container 75%">

			<!-- Content -->
				<div class="content">
					<div id="avatar">
						<img src="<?php echo PublicFile.'images/avatar.png'; ?>"/ id="no_avatar" class="width_upload">
						<form method="post" enctype="multipart/form-data" id="">
							<input type="file" name="upload"  class="width_upload"/>
							<input type="submit" value="Качи снимка"  id="upload_img" />
						</form>
					</div>
					<div id="info">
						<form  action="<?php echo app_url.'profile'; ?>" method="post" id="profile">
							<div class="row 50%">
								<div class="12u">
									<input id="name" type="text" name="name" disabled value="<?php echo $GLOBALS['user']->getName(); ?>"/>
								</div>
							</div>
							<div class="row 50%">
								<div class="12u">
									<input id="email" type="text" name="email" value="<?php echo $GLOBALS['user']->getEmail(); ?>"/>
								</div>
							</div>
							<div class="row 50%">
								<div class="12u">
									<input id="grade" type="text" name="class" placeholder="Клас" value="<?php if($GLOBALS['user']->getClass() != 0) echo $GLOBALS['user']->getClass(); ?>"/>
								</div>
							</div>
							<div class="row 50%">
								<div class="12u">
									<input id="years" type="text" name="years" placeholder="Години" value="<?php if($GLOBALS['user']->getYears() != 0) echo $GLOBALS['user']->getYears(); ?>"/>
								</div>
							</div>
							<div class="row">
								<div class="12u">
									<ul class="buttons">
										<li><input type="submit" class="special" id="update" value="Обнови" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
					<div id="clear"></div>
				</div>

			<div class="content" style="margin-top:40px;">
				<h2>Избрани учители</h2>
				<?php if(isset($teacher_wants)) { 
					$wants = json_decode($teacher_wants);

					foreach ($wants as $val) {
						echo "<strong>".$val[0].'</strong>: '.$val[1].'<br />';
					}
				} else {
					echo '<h3>Няма избрани учители за </h3>';
					echo '<img src="'.PublicFile.'images/sibir.jpg" alt="">';
				} ?>
			</div>
		</section>

</article>