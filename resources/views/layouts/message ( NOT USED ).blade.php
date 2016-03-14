
<!-- Mensagem de sucesso -->
@if (Session::has('flash_message')) 
	<div class="box box-success">
    	<div class="box-header with-border">
        	<h3 class="box-title">
        		<i class="icon fa fa-check"></i> Sucesso!
        	</h3>
            <div class="box-tools pull-right">
            	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
        	<ul>
		        <li class="text-green">{{ Session::get('flash_message') }}.</li>
		    </ul>
        </div><!-- /.box-body -->
	</div>
@endif

<!-- Mensagem de erro -->
@if ( count($errors) > 0 ) 
	<div class="box box-danger">
    	<div class="box-header with-border">
        	<h3 class="box-title">
        		<i class="icon fa fa-ban"></i> Atenção!
        	</h3>
            <div class="box-tools pull-right">
            	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
	   		@unless($errors->isEmpty()) 
	   			<ul>
			    @foreach($errors->getMessages() as $error)
			        <li class="text-red">{{ $error[0] }}</li>
			    @endforeach 
			    </ul>
			@endunless
        </div><!-- /.box-body -->
	</div>
@endif
    
    