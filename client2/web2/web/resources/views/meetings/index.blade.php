@extends('adminlte::page')

@section('content_header')
    <h1>EVENTOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('meetings.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    </div>
	</ol>
@stop


@section('content')
	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <div class="box-body"><!-- Main content -->
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_meetings"> 
							<thead>
								<tr>
									<th>ID</th>
									<th>Data</th>
									<th>Tipo</th>
									<th>Cidade/UF</th>	
									<th>Região</th>
									<th>Descrição</th>
									<th>Situação</th>
									<th>Totais Partic Prev</th>
									<th>Totais Partic Confirm</th>
									<th>Despesas Totais</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th width="1%">ID</th>
									<th>Data</th>
									<th>Tipo</th>
									<th>Cidade/UF</th>	
									<th>Região</th>
									<th>Descrição</th>
									<th>Situação</th>
									<th>Totais Partic Prev</th>
									<th>Totais Partic Confirm</th>
									<th>Despesas Totais</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($meetings as $meeting)
							    <tr>
							     	<td><a href="{!! route('meetings.show', ['id' => $meeting->id]) !!}">{{ $meeting->id }}</a></td>
							     	<td>
							     		@if($meeting->date!=null)
				           			{{ $meeting->date->format('d/m/Y') }}
				        			@endif
				         		</td>
								   	<td>{{ $meeting->meeting_type->description }}</td>
								   	<td>{{ $meeting->city->description }}/{{ $meeting->city->state->code }}</td>
								   	<td>{{ $meeting->city->region->description }}</td>
								   	<td>{{ $meeting->description }}</td>
										<td>{{ $meeting->meeting_status->description }}</td>
								   	<td class="text-right"></td>
								   	<td class="text-right"></td>
								   	<td class="text-right">
										 	<b>{{ number_format(($meeting->expenses_members_food + $meeting->expenses_members_accommodation + $meeting->expenses_members_transport + $meeting->expenses_partners_food + $meeting->expenses_partners_accommodation + $meeting->expenses_partners_transport + $meeting->expenses_employees_food + $meeting->expenses_employees_accommodation + $meeting->expenses_employees_transport), 2,",",".") }}</b>
										</td>
								  </tr>
							  @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@stop
