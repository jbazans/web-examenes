<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<div class="main-body">
		<label>Ingrese el titulo del exámen</label>
		<input type="text" id="tituloexamen">
		<button class="mt10" onclick="add_question()">Añadir pregunta</button>
		<h3 class="mt10">Preguntas creadas</h3>
		<div class="mt10" id="body-examen">
			<div class="item-examen" id="item-1">
				<label>Ingrese pregunta 1</label>
				<textarea id="question-1"></textarea>
				<label class="mt10">Tipo de respuesta</label>
				<select class="type-question" id="type-1" onchange="show_preview(this,1)">
					<option value="0">Seleccione</option>
					<option value="1">Numero</option>
					<option value="2">Texto corto</option>
					<option value="3">Texto largo</option>
					<option value="4">Alternativa multiple</option>
				</select>
				<div class="alter-multiple mt10" id="alternativa-1" style="display: none">
					<label>Nombre alternativa</label>
					<input type="text" id="alt-nombre-1">
					<button class="mt10" onclick="add_preview(1)">Añadir alternativa</button>
				</div>
				<h4 class="mt10">Previsualización</h4>
				<div class="preview-question" id="preview-1">
					
				</div>
			</div>
		</div>
		<button class="mt10" onclick="save_examen()">Guardar exámen</button>
	</div>
	<script type="text/javascript">
		var num_id=2;
		function show_preview(dom,id){
			let html='';
			switch(dom.value){
				case '0':
					alert('Debe seleccionar otra opción');
					document.getElementById("alternativa-"+id).style.display="none";
					break;
				case '1':
					document.getElementById("alternativa-"+id).style.display="none";
					html='<input class="mt10" type="number"/>';
					break;
				case '2':
					document.getElementById("alternativa-"+id).style.display="none";
					html='<input class="mt10" type="text"/>';
					break;
				case '3':
					document.getElementById("alternativa-"+id).style.display="none";
					html='<textarea class="mt10"></textarea>';
					break;
				case '4':
					document.getElementById("alternativa-"+id).style.display="block";
					break;
			}
			document.getElementById('preview-'+id).innerHTML=html;
		}
		function add_preview(id){
			let html='';
			html=
			'<div class="content-radio">'+
				'<input type="radio">'+
				'<label for="opc1">'+document.getElementById("alt-nombre-"+id).value+'</label>'+
			'</div>';
			document.getElementById("preview-"+id).innerHTML+=html;
		}
		function add_question(){
			let html=
			'<div class="item-examen" id="item-'+num_id+'">'+
				'<label>Ingrese pregunta '+num_id+'</label>'+
				'<textarea id="question-'+num_id+'"></textarea>'+
				'<label class="mt10">Tipo de respuesta</label>'+
				'<select class="type-question" id="type-'+num_id+'" onchange="show_preview(this,'+num_id+')">'+
					'<option value="0">Seleccione</option>'+
					'<option value="1">Numero</option>'+
					'<option value="2">Texto corto</option>'+
					'<option value="3">Texto largo</option>'+
					'<option value="4">Alternativa multiple</option>'+
				'</select>'+
				'<div class="alter-multiple mt10" id="alternativa-'+num_id+'" style="display: none">'+
					'<label>Nombre alternativa</label>'+
					'<input type="text" id="alt-nombre-'+num_id+'">'+
					'<button class="mt10" onclick="add_preview('+num_id+')">Añadir alternativa</button>'+
				'</div>'+
				'<h4 class="mt10">Previsualización</h4>'+
				'<div class="preview-question" id="preview-'+num_id+'">'+
					
				'</div>'+
			'</div>';
			document.getElementById("body-examen").insertAdjacentHTML('beforeend',html);
			num_id++;
		}
		function save_examen(){
			let nomexa=document.getElementById("tituloexamen").value;
			if (nomexa=="") {
				alert("Debe poner nombre de examen");
				return;
			}
			let ar_pregunta=document.getElementsByClassName("item-examen");
			let aux=[];
			for (var i = 0; i < ar_pregunta.length; i++) {
				let id=ar_pregunta[i].id.replace("item-","");
				let nompre=document.getElementById("question-"+id).value;
				if (nompre!="") {
					let codtipres=document.getElementById("type-"+id).value;
					let aux_pre=[];
					aux_pre.push(nompre);
					aux_pre.push(codtipres);
					if (codtipres=="4") {
						let ar_alternativas=document.getElementById("preview-"+id).getElementsByClassName("content-radio");
						let aux_alt=[];
						for (var j = 0; j < ar_alternativas.length; j++) {
							aux_alt.push(ar_alternativas[j].getElementsByTagName("label")[0].innerHTML);
						}
						aux_pre.push(aux_alt);
					}
					aux.push(aux_pre);
				}
			}
			console.log(aux);
			let fd=new FormData();
			fd.append("nomexa",nomexa);
			fd.append("array",JSON.stringify(aux));
			let request=new XMLHttpRequest();
			request.open('POST','api/save_examen.php',true);
			request.onload=function(){
				if (request.readyState==4 && request.status==200) {
					console.log(request.responseText);
					alert(request.responseText);
				}
			}
			request.send(fd);
		}
	</script>
</body>
</html>