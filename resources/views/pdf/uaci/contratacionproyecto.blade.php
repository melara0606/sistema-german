@extends('pdf.plantilla')
@section('reporte')
@include('pdf.uaci.cabecera')
@include('pdf.uaci.pie')
<div id="contenct">
	<table width="100%">
		<?php
		$duia = $contratacionproyecto->empleado->dui;
		$dui = explode('-',$duia);
		$nita = $contratacionproyecto->empleado->nit;
		$nit = explode('-',$nita);
		?>
		<td>
			<center>CONTRATO DE SUMINISTRO DE BIENES</center>
			<p></p>
			<p align="justify">

			Nosotros, ALCALDE, de XX años de edad, COMERCIANTE, del domicilio de VERAPAZ, Departamento de San Vicente, portador de mi Documento Único de Identidad Número CERO CERO CERO CERO CERO CERO CERO CERO - CERO, con mi Número de Identificación Tributaría CERO CERO CERO - CERO CERO CERO CERO CERO CERO - CERO CERO- CERO, actuando en nombre y representación, en mi carácter de Alcalde Municipal, de la Alcaldía Municipal de Verapaz, Departamento de San Vicente, con Número de Identificación Tributaría NIT; situación que compruebo con la Credencial Emitida por el Tribunal Supremo Electoral, en la que consta que he sido electo al cargo en mención, para el período constitucional que comprende del primero de mayo del año PERIODO DE ALCALDE, los que me conceden facultades para firmar en el carácter en que actúo contrato como el presente, que en lo sucesivo y en el transcurso del presente "El Contratante" por una parte y  por otra parte el señor/a {{strtoupper ($contratacionproyecto->empleado->nombre)}} de {{ NumeroALetras::convertir($contratacionproyecto->empleado->fecha_nacimiento->age) }} años de edad, OFICIO EMPLEADO, del domicilio de MUNICIPIO, DEPARTAMENTO  y portador de mi Documento Único de Identidad número, {{duicero($dui[0])}} {{ NumeroALetras::convertir($dui[0]) }} - {{ duinitultimo($dui[1]) }} , con Número de Identificación Tributaria {{nitprimero($nit[0])}} {{ NumeroALetras::convertir($nit[0]) }}- {{ nitsegundo($nit[1]) }} {{ NumeroALetras::convertir($nit[1]) }}- {{nittercero($nit[2])}} {{NumeroALetras::convertir($nit[2])}}- {{duinitultimo($nit[3])}} con Número de Registro de Contribuyente NUM CONTRIBUYENTE; quien en este instrumento se denominará “El Contratista” y en los caracteres dichos, MANIFESTAMOS: Que hemos acordado otorgar y en efecto otorgamos el presente contrato de “OBRERO de Alcaldía Municipal de Verapaz” de conformidad a la Ley de Adquisiciones y Contrataciones de la Administración Pública,  que en adelante se denominará LACAP, su Reglamento y a las cláusulas que a continuación se especifican. CLÁUSULA PRIMERA - OBJETO DEL CONTRATO: El contratista se compromete cumplir todas las funciones de acuerdo a las especificaciones impuestas por el contratista . y según las condiciones siguientes: En la semana comprendida entre el lunes veinticuatro y viernes veintiocho de abril de dos mil diecisiete, en un horario de ocho de la mañana a doce del mediodía y de una a cuatro de la tarde, el Contratista se compromete a despachar en el lugar convenido, los siguientes productos: 
			</p>
		</td>
	</table>
</div>
@endsection