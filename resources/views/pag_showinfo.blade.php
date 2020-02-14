@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card w-100 p-3">
                <div class="card-header text-center">Tablas de PCs</div>

                <div class="card-body bg-dark ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                            <!-- oooooooooooooooooooooooTABELAooooooooooooooooooooo -->
                    <div class="table-responsive  ">

                    

                                        <div class="card" style="width: 18rem;">
                                            <img src="" class="card-img-top" alt="Usuario">
                                            <div class="card-body">
                                                <h5 class="card-title">Info de {{$query->NomPers}}</h5>
                                                <p class="card-text">Some quick example text to build on the card
                                                     title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
  
                                
                            @if(isset($query))

                            <!-- ====================== LISTA DE INFOS ======================= -->
                            <ul class="list-group">
                                    <li class="list-group-item active text-center bg-secondary border-dark">Lista de infos</li>
                                    
                                <!-- ====================== Nombre ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right "
                                class="font-weight-bold"><h5>Nombre:</h5></label> 
                                <label for="" class="text-lg-right">{{$query->NomPers}}</label></li>
                                
                                <!-- ====================== AreaPC ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right "><h5>AreaPC:</h5></label>
                                <label for="" class="text-right ">{{$query->AreaPc}}</label></li>

                                <!-- ====================== Nombre Antivirus ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right "><h5>Nombre Antivirus:</h5>  </label> 
                                <label for="" class="text-right ">{{$query->NomAnt}}</label></li>
                                
                                <!-- ====================== VIGENCIA ANTIVIRUS ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right "><h4>VIGENCIA ANTIVIRUS: </h4> </label>
                                <label for="" class="text-right ">{{$query->NumVig}}</label></li>

                                <!-- ====================== IP ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right "><h4>IP: </h4> </label>
                                <label for="" class="text-right ">{{$query->ip}}</label></li>

                                <!-- ====================== MAC ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right"><h4>MAC:</h4>  </label> 
                                <label for="" class="text-right ">{{$query->mac}}</label></li>
                                <!-- ====================== Nombre Marca ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right "><h4>Nombre Marca:</h4>  </label> 
                                <label for="" class="text-right ">{{$query->NomMarc}}</label></li>
                                <!-- ====================== Nombre SO ======================= -->
                                    <li class="list-group-item"><label for="" class="text-right "><h4> Nombre SO: </h4></label> 
                                <label for="" class="text-right ">{{$query->NomSO}}</label></li>

                            </ul>

                            @endif

                        </div>

                        <div class="card-footer">

                            <a href="{{URL::to('tablapcTOP')}}"><button type="button" class="btn btn-primary">Regresar</button></a>
                        </div>
                        
                   
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
