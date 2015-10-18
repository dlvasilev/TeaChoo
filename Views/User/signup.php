<script>
	$(function() {
		$('#registration').validate({
			rules: {
				name: {
					required: true,
					minlength: 4,
					maxlength: 100
				},
				email: {
					required: true,
					email: true
				},
				pass: {
					required: true,
					minlength: 8
				},
				repass: {
					equalTo: "#pass",
					required: true,
					minlength: 8
				}
			},
			messages:{
				name: "Трябва да въведеш име",
				email: "Трябва да въведеш превилен е-майл",
				pass: "Паролата трябва да бъде поне 8 символа",
				repass: "Паролите не съвпадат",
			}
		});
	});
</script>

<!-- Main -->
<article id="main">

		<header class="special container">
			<span class="icon fa-pencil-square-o"></span>
		
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
						<form action="<?php echo app_url; ?>signup" method="post" id="registration">
							<div class="row 50%">
								<div class="12u">
									<input type="text" name="name" id="name" placeholder="Име на ученик" />
								</div>
							</div>
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
							<div class="row 50%">
								<div class="12u">
									<input type="password" name="password_again" id="repass" placeholder="Повторете паролата" />
								</div>
							</div>
							<div class="row">
								<div class="12u">
									<ul class="buttons">
										<li><input type="submit" class="special" value="Регистрирай се" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>

			</section>

	</article>