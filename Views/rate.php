
<script>
	$(document).ready(function() 
	{
		$('#teachers li').click(function(e) 
		{ 
			var name = $(this).text();
			var id = $(this).attr('id');
			$('#teacher #name').html(name);
			$('#id').val(id);
			$('#teacher').removeClass('hidden');
		});
	});
</script>
<!-- Main -->
<article id="main">

	<header class="special container">
		<span class="icon fa-user"></span>
	
	</header>

	<!-- One -->
		<section class="wrapper style4 special container 75%">

			<!-- Content -->
				<div class="content">
					<div id="teachers">
						<ul>
							<?php 
							foreach ($teachers as $teacher) {
								echo '<li id="'.$teacher['id'].'">'.$teacher['name'].'</li>';
							}
							?>
						</ul>
					</div>
					<div id="teacher" class="hidden">
						<div id="name"></div>
						<form action="<?php echo app_url.'rate'; ?>" method="post">
							<input type="hidden" name="teacher_id" id="id" value="">
							<div id="category_1">
								Начин на преподаване:
								<select name="category_1">
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							</div>
							<div id="category_2">
								Отношение:
								<select name="category_2">
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							</div>
							<div id="category_3">
								Начин на оценяване:
								<select name="category_3">
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							</div>
							<div id="clear"></div>
							<div class="12u" style="margin-top: 40px;">
								<ul class="buttons">
									<li><input type="submit" name="submit" class="special" value="Изпрати" /></li>
								</ul>
							</div>
						</form>
					</div>
					<div id="clear"></div>
				</div>

		</section>

</article>