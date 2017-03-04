<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<table width="100%" border="1" cellpadding="0" cellspacing="0">
		<tr align="center">
			<td colspan="2"><h4>Dados</h4></td>
		</tr>
		<tr align="center">
			<th width="30%">Exportado:</th>
			<td width="70%">{!! date('d/m/Y') !!}</td>
		</tr>
		<tr align="center">
			<th width="30%">Período:</th>
			<td width="70%">{!! $inicio." - ".$fim !!}</td>
		</tr>
	</table>
	<br>
	<table width="100%" border="1" cellpadding="0" cellspacing="0"> 
		<tr align="center">
			<th width="30%">Área</th>
			<td width="70%">Consultas</td>
		</tr>
		<tr align="center">
			<th width="30%">Traumato Ortopédica:</th>
			<td width="70%">{!! $traumato !!}</td>
		</tr>
		<tr align="center">
			<th width="30%">Respiratória:</th>
			<td width="70%">{!! $respiratoria !!}</td>
		</tr>
		<tr align="center">
			<th width="30%">Neurofuncional:</th>
			<td width="70%">{!! $neuro !!}</td>
		</tr>
		<tr align="center">
			<th width="30%">Gestacional:</th>
			<td width="70%">{!! $gestacional !!}</td>
		</tr>
		<tr align="center">
			<th width="30%">Cardiopulmonar:</th>
			<td width="70%">{!! $cardio !!}</td>
		</tr> 
	</table>
	<br>
	
	<table width="100%" border="1" cellpadding="0" cellspacing="0"> 
		<tr align="center">
			<th width="30%">Status</th>
			<td width="70%">Consultas</td>
		</tr>
		<tr align="center">
			<th width="30%">Atendimentos:</th>
			<td width="70%">{!! $atendimento !!}</td>
		</tr>
		<tr align="center">
			<th width="30%">Consultas Marcadas:</th>
			<td width="70%">{!! $marcada !!}</td>
		</tr>
		<tr align="center">
			<th width="30%">Ausências:</th>
			<td width="70%">{!! $ausencia !!}</td>
		</tr> 
	</table>
</body>
</html>