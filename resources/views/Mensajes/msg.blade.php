<div class="container">
    @if(session('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="fa fa-check fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<strong>¡Éxito!</strong> {{session('message')}}
    </div>

    @elseif(session('Elimessage'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<strong>¡Éxito!</strong> {{session('Elimessage')}}
    </div>
    @elseif(session('Upmessage'))
    <div class="alert alert-info alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<strong>¡Éxito!</strong> {{session('Upmessage')}}
    </div>
    @endif
</div>