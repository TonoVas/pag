@extends('layouts.app')

@section('title', __('trdc.HHMMRCCH'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center bg-dark">{{ __('trdc.HHMMTBLL') }}</div>

                <div class="card-body text-white bg-secondary">
                        <center>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal">
                                {{ __('trdc.HHMMSBRC') }}
                            </button>

                        </center>
                        <!-- Modal -->
                        @extends('Inicio.archivos.modal.achivos')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function validarExt()
    {
        var  Fotografia = document.getElementById('files');
        var FotografiaRuta = Fotografia.value;
        var extPermitidas = /(.rar|.zip|.apk)$/i;

        if(!extPermitidas.exec(FotografiaRuta))
        {
            alert('Asegurese de haber seleccionado un archivo');
            Fotografia.value='';
            return false;
        }
        else{
            if(Fotografia.files && Fotografia.files[0])
            {
                var visor= new  FileReader();
                visor.onload=function(e)
                {
                    document.getElementById('visorFotografia').innerHTML=
                    '<embed src="'+e.target.result+'"width ="100" height="100">';
                }
                visor.readAsDataURL(Fotografia.files[0]);
               }
        }
     }

</script>
@endsection
