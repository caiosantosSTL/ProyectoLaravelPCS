@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card w-100 p-3">
                <div class="card-header text-center">Editar de PCs</div>

                <div class="card-body bg-dark ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Session::has('exito'))
                    <label for="name" class="col-md-4 col-form-label text-md-center">Exito</label>
                    {{Session::get('exito')}}
                    @endif

                    @if(Session::has('error'))
                    <label for="name" class="col-md-4 col-form-label text-md-center">Errores</label>
                    {{Session::get('error')}}
                    @endif

                            <!-- ooooooooooooooooooooooo TABELA ooooooooooooooooooooo -->
                    <div class="table-responsive  ">

                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">Info de {{$query->NomPers}}</h5>
                                                <p class="card-text">Some quick example text to build on the card
                                                     title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
  
                                
                            @if(isset($query))

                            <form action="update" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="saveUpdate" value="{{$query->idx}}">

                                
                            
                            <ul class="list-group">
                                <li class="list-group-item active text-center bg-secondary border-dark">Lista de infos</li>
                                    
                                <!-- ======================== DIV  Nombre ============================= -->
                                <li class="list-group-item"><label for="" class="text-right "
                                    class="font-weight-bold"><h5>Nombre:</h5></label> 
                                    @if(isset($queryNOM))
                                    <div class="form-group">
                                            <select class="form-control" name="name" id="name">
                                            @foreach($queryNOM as $rowN)
                                                @if($rowN->id == $query->id_pers)
                                                <option selected value="{{$rowN->id}}">{{$rowN->Nombre}}</option>
                                                @else
                                                <option value="{{$rowN->id}}">{{$rowN->Nombre}}</option>
                                                @endif
                                            @endforeach
                                            </select>

                                    </div>
                                    @endif

                            
                            </li>

                            <!-- ======================== DIV  Nombre Antivirus ============================= -->
                                <li class="list-group-item"><label for="" class="text-right "><h5>Nombre Antivirus:</h5>  </label> 
                                @if(isset($queryAnt))
                                <div class="form-group">
                                    <select class="form-control " name="anti" id="anti">
							
                                    @foreach($queryAnt as $row2)
                                        @if($row2->id == $query->id_ant)
                                        
                                        <option selected value="{{$row2->id}}">{{$row2->NombreAntivirus}}</option>
                                        @else
                                        <option value="{{$row2->id}}">{{$row2->NombreAntivirus}}</option>

                                        @endif

                                    @endforeach
                                    </select>
                                </div>
                                @endif
                                
                                <!-- ======================== DIV  IP ============================= -->
                            </li>

                                <li class="list-group-item"><label for="" class="text-right "><h4>IP: </h4> </label>

                                <input type="text" class="form-control" id="ip" value="{{$query->ip}}" name="ip" autocomplete="name" autofocus="autofocus">
                            </li>

                            <!-- ======================== DIV Vigencia ============================= -->

                            
                                <li class="list-group-item"><label for="" class="text-right "><h4>Vigencia: {{$query->NumVig}} </h4> </label>
                                <select class="form-control" name="diafecha" id="diafecha" onclick="Func_hide()">
                                        <option value="1" >Dias restantes</option>
                                        <option value="2" selected>Fecha final</option>
                                    </select>

                                <div class="form-group"> 
                                    
                                    <input type="number" class="form-control" id="DIASS" name="d" value="{{$query->NumVig}}" style="display: none"> 
                                    <input type="date" class="form-control" id="FECHASS" name="f" value="{{$query->NumVig}}" style="display: block">
                                </div>

                                <div class="form-group"> 
                                    <button type="reset" name="reset" class="btn btn-sm btn-danger" >Reset</button>
                                </div>
                            </li>
                            

                            <script>
                                    function Func_hide() {
                                    var x = document.getElementById('diafecha').value;
                                    var diax = document.getElementById('DIASS');
                                    var fechax = document.getElementById('FECHASS');

                                    if(x == 1){
                                        diax.style.display = "block";
                                        fechax.style.display = "none";
                                        fechax.value = "";
                                    }else if(x == 2){
                                        diax.style.display = "none";
                                        fechax.style.display = "block"; 
                                        diax.value = "";
                                    }

                                        
                                        if (x.style.display === "none") {
                                            x.style.display = "block";
                                        } else {
                                            x.style.display = "none";
                                        }
                                        }


                    </script>
                            

                            <!-- ======================== DIV  MAC ============================= -->
                                <li class="list-group-item"><label for="" class="text-right"><h4>MAC:</h4>  </label> 
                                
                                <input type="text" class="form-control" id="mac" value="{{$query->mac}}" name="mac" autocomplete="name" autofocus="autofocus">
                            </li>

                            <!-- ======================== DIV  Nombre Marca ============================= -->
                                <li class="list-group-item"><label for="" class="text-right "><h4>Nombre Marca:</h4>  </label> 
                                @if(isset($queryMarca))
                                <div class="form-group">
                                    <select class="form-control " name="marc" id="marc">
							
                                    @foreach($queryMarca as $row3)
                                        @if($row3->id == $query->id_marca)
                                        <option selected value="{{$row3->id}}">{{$row3->NombreMarca}}</option>
                                        @else
                                        <option  value="{{$row3->id}}" >{{$row3->NombreMarca}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                                @endif
                                
                            </li>

                            <!-- ======================== DIV Nombre SO ============================= -->
                                <li class="list-group-item"><label for="" class="text-right "><h4> Nombre SO: </h4></label> 
                                @if(isset($querySO))
                                <div class="form-group">
                                    <select class="form-control " name="so" id="so">
							
                                    @foreach($querySO as $row1)
                                       @if($row1->id == $query->id_so) 
                                        
                                        <option selected value="{{$row1->id}}">{{$row1->NombreSO}}</option>
                                        @else
                                        <option value="{{$row1->id}}">{{$row1->NombreSO}}</option>
                                        @endif

                                        
                                    @endforeach
                                    </select>
                                </div>
                                @endif
                               
                            </li>


                            </ul>

                            <!-- final tabla 00000000000000000000000000000 -->

                            <!-- BUTONO 0000000000000000000000000000 -->
                            <div class="card-footer text-muted">
                                <button type="submit" class="btn btn-primary">Go</button>
                                <a href="{{URL::to('tablapcTOP')}}"><button type="button" class="btn btn-primary">Regresar</button></a>
                            </div>

                            </form>
                            <!-- Final BUTONO 000000000000000000000 -->


                            @endif
                    
                            </tbody>
                            </table>
                        </div>
                   
                </div>

                
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
