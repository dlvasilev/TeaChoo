<script>
	$(function() {
		$('#login').validate({
			rules: {
				name: {
					required: true,
					minlength: 4,
					maxlength: 10
				},
				pass: {
					required: true,
					minlength: 8
				}
			}
		});
	});
</script>
<article id="main">

	<header class="special container">
		<span class="icon fa-users"></span>
	</header>

	<!-- One -->
		<section class="wrapper style4 special container 75%">

			<!-- Content -->
				<div class="content">
					<?php
						if(isset($errors) && count($errors) > 0) {
							foreach ($errors as $error) {
								echo $error." ";
							}
						}
					?>
					<form action="<?php echo app_url.'signin'; ?>" method="post" id="login">
						<div class="row 50%">
							<div class="12u">
								<input type="email" name="email" id="email" placeholder="Е-майл" />
							</div>
						</div>
						<div class="row 50%">
							<div class="12u">
								<input type="password" name="password" id="pass" placeholder="Парола" />
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="buttons">
									<li><input type="submit" class="special" value="Вход" /></li>
								</ul>
							</div>
						</div>
						
					</form>
				</div>

		</section>

</article>