 
<table width="100%"> 
	<tbody> 
		<tr align="left">
			<td><h3>Relatório de consultas</h3></td>  
		</tr> 
		<tr align="left"> 
			<td> Data da consulta: {!! date('d/m/y') !!}</td>
		</tr> 
	</tbody> 
</table>
<br>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th>Paciente</th>
			<th>Telefone</th>
			<th>Aluno</th>
			<th>Inicio</th>
			<th>Término</th>
		</tr>
	</thead>
	<tbody>
		@forelse($consultas as $consulta)
		<tr align="center"> 
			<td>{!! $consulta->paciente->nome !!}</td> 
			<td>{!! $consulta->paciente->telefone !!}</td> 
			<td>{!! $consulta->aluno->usuario->nome !!}</td> 
			<td>{!! $consulta->hora_start !!}</td> 
			<td>{!! $consulta->hora_end !!}</td> 
		</tr>
		@empty
		<tr>
			<td colspan="4">Nenhum registro encontrado.</td> 
		</tr>
		@endforelse

	</tbody> 
</table>
  
