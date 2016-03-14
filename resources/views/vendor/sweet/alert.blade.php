@if (Session::has('sweet_alert.alert'))
<script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
            type: "{!! Session::get('sweet_alert.type') !!}",
            showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
            confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
            confirmButtonColor: "#AEDEF4"

            // more options
        });
    </script>
@endif   
@if ( count($errors) > 0 )
<script>
        swal({
            title: "Atenção",   
            text:"@unless($errors->isEmpty()) @foreach($errors->getMessages() as $error) {{ $error[0] }}<br> @endforeach @endunless",
            type: "warning",    
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Fechar", 
            html:true
        });
    </script>
@endif
