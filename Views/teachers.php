<style>
	div.scroll {
	background-color: #FFFFFF;
		width: 300px;
	height: 200px;
	position: relative;
	float:left;
	margin-left:115px;
	margin-top:30px;
	}
	#clear{clear:both;}
	#send{position:relative;
		float:right;
		right:7%;
		min-width:180px !important;
		margin:10px;
		}
</style>

<!-- Main -->
<article id="main">

	<header class="special container">
		<span class="icon fa-graduation-cap"></span>
	
	</header>
	<form action="<?php echo app_url.'/teachers'; ?>" method="post">
		<div>
			<div class="scroll">
				Български език и литература<br>
				<input type="radio" name="bg" value="Силвия Христова" required>Силвия Христова<br>
				<input type="radio" name="bg" value="Добрин Казаков" required>Добрин Казаков<br>
				<input type="radio" name="bg" value="Нели Янкова" required>Нели Янкова<br>
			</div>
			<div class="scroll">
				Английски език<br>
				<input type="radio" name="ae" value="Елица Кърпичева" required>Елица Кърпичева<br>
				<input type="radio" name="ae" value="Виолета Диманова" required>Виолета Диманова<br>
				<input type="radio" name="ae" value="Катя Мицова" required>Катя Мицова<br>
			</div>
			<div class="scroll">
				Математика<br>
				<input type="radio" name="math" value="Надя Николова" required>Надя Николова<br>
				<input type="radio" name="math" value="Красимира Димитрова" required>Красимира Димитрова<br>
				<input type="radio" name="math" value="Ива Граматикова" required>Ива Граматикова<br>
				
			</div>
			<div class="scroll">
				Немски език<br>
				<input type="radio" name="nemski" value="Апостол Костадинов" required>Апостол Костадинов<br>
				<input type="radio" name="nemski" value="Светлана Проданова" required>Светлана Проданова<br>
				<input type="radio" name="nemski" value="Силвия Христова" required>Силвия Христова<br>
			</div>
			<div class="scroll">
				Информатика<br>
				<input type="radio" name="info" value="Весела Вангелова" required>Весела Вангелова<br>
				<input type="radio" name="info" value="Соня Димова" required>Соня Димова<br>
				<input type="radio" name="info" value="Дора Трифонова" required>Дора Трифонова<br>
			</div>
			<div class="scroll">
				Информационни технологии<br>
				<input type="radio" name="it" value="Весела Вангелова" required>Весела Вангелова<br>
				<input type="radio" name="it" value="Соня Димова" required>Соня Димова<br>
				<input type="radio" name="it" value="Дора Трифонова" required>Дора Трифонова<br>
			</div>
			<div id="clear"></div>
		</div>
		<div class="12u">
			<input type="submit" name="submit" class="special" value="Изпрати" id="send">
		</div>
	</form>
<div id="clear"></div>
</article>