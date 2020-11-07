<!DOCTYPE html>
<html>
<head>
	<title>Web de exámenes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="main-body">
		<div class="second-body">
			<h2><center>Prueba de matemáticas 1</center></h2>
			<div class="question">
				<div class="name-question"><h3>1. ¿Cuando es 1+1?</h3></div>
				<div class="answer">
					<input type="number" id="ans-1">
				</div>
			</div>
			<div class="question">
				<div class="name-question"><h3>2. ¿Defina que es un triangulo?</h3></div>
				<div class="answer">
					<textarea id="ans-2"></textarea>
				</div>
			</div>
			<div class="question">
				<div class="name-question"><h3>3. Si A+2=5. ¿Cuanto vale A?</h3></div>
				<div class="answer">
					<div class="content-radio">
						<input type="radio" id="opc1" name="ans-3" value="1">
						<label for="opc1">A=3</label>
					</div>
					<div class="content-radio">
						<input type="radio" id="opc2" name="ans-3" value="2">
						<label for="opc2">A=5</label>
					</div>
					<div class="content-radio">
						<input type="radio" id="opc3" name="ans-3" value="3">
						<label for="opc3">Ninguna de las anteriores</label>
					</div>
				</div>
			</div>
			<div class="question">
				<div class="name-question"><h3>4. Un ________ isocoles es cuando tiene 2 angulos iguales</h3></div>
				<div class="answer">
					<input type="text" id="ans-4">
				</div>
			</div>
		</div>
	</div>
</body>
</html>