<?php
	$cn=mysqli_connect("localhost","root","","web-examen");

	$nomexa=$_POST['nomexa'];
	$array=json_decode($_POST['array']);

	$sql="INSERT INTO examen (codexa,nomexa,feccreexa,estado)
	values ('','$nomexa',now(),1)";
	$result=mysqli_query($cn,$sql);
	if ($result) {
		//Si es correcto
		$codexa=mysqli_insert_id($cn);
		for ($i=0; $i < count($array); $i++) {
			$codpre=$i+1;
			$nompre=$array[$i][0];
			$codtipres=$array[$i][1];
			$sql="INSERT INTO pregunta (codpre,codexa,nompre,codtipres)
			values ($codpre,$codexa,'$nompre',$codtipres)";
			$result=mysqli_query($cn,$sql);
			if ($codtipres=="4") {
				$array_alt=$array[$i][2];
				for ($j=0; $j < count($array_alt); $j++) { 
					$codalt=$j+1;
					$nompre=$array[$i][0];
					$codtipres=$array[$i][1];
					$nomalt=$array_alt[$j];
					$sql="INSERT INTO alternativa (codalt,codpre,codexa,nomalt)
					values ($codalt,$codpre,$codexa,'$nomalt')";
					$result=mysqli_query($cn,$sql);
				}
			}
		}
		echo "Examen guardado";
	}else{
		//Si es incorrecto
		echo "No se pudo crear el examen";
	}