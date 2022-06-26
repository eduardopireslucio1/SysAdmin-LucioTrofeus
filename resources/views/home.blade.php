@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="cont" class="col-md-8">

        <img id="lucio_logo"  src="{{('/images/lucio_logo_2.png')}}">
            <div id="logado">

                   
                    <h3 id="vc_logado">Você está logado!</h3>
                    <a id="btn-funcionario" href="{{route('register')}}" class="btn btn-success btn-sm"
                        style=""><h5>Novo usuário</h5></a>
                </div>
                
        
        </div>
    </div>
</div>

@endsection

<style>
    
#contt{
 background-color: #343A40;
}

#btn-funcionario{
    margin-left: 60px;
    margin-top: 25px;
    width:150px;
    height:35px;
}

#vc_logado{
    margin-left: 30px;
    color: white;
    width: 450px;
}

#lucio_logo{
  height: 80%;
  width: 700px;
}

#logado{
    margin-left: 220px;
    width: 250px;
}
  
</style>