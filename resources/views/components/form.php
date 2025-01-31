<section>
<div class="form-file">
		<h1 class="title-view">Formulario de carga de información</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="file-input-container">
				<input type="file" class="file-input" name="archivo" id="archivo" accept=".txt" required>
				<input type="text" placeholder="...examinar" id="file-name" class="input-name" readonly>
				<label for="archivo" class="file-label">Cargar</label>
			</div>
			<?php
			if (isset($_GET['errores'])) {
				$errores = $_GET['errores']; // Los errores vienen en la URL
				foreach ($errores as $error) {
					echo "<p class='error'>$error</p>";
				}
			}
			?>
			<div class="send-button">
			<button type="submit" >Enviar formulario</button>
			</div>
		</form>
	</div>
	<script>
		document.getElementById('archivo').addEventListener('change', function(event) {
			var fileName = event.target.files[0] ? event.target.files[0].name : '';
			document.getElementById('file-name').value = fileName;
		});
	</script>
</section>