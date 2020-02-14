@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-sm-8">
            <div class="card w-100 p-3">
                <div class="card-header text-center">Formulario de PCs</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Session::has('exito'))
                    <label for="name" class="col-md-4 col-form-label text-md">Exito</label>
                    {{Session::get('exito')}}
                    @endif

                    @if(Session::has('error'))
                    <label for="name" class="col-md-4 col-form-label text-md">Errores</label>
                    {{Session::get('error')}}
                    @endif

                            <!-- oooooooooooooooooooooooTABELAooooooooooooooooooooo -->
                    <div class="table-responsive  ">

                                        <div class="card" style="width: 18rem;">
                                            <img src="" class="card-img-top  " alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Formulario</h5>
                                                <p class="card-text">Some quick example text to build on the card
                                                     title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                            <br>

                            <form action="poner" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <!-- ====================== DIV ======================= -->
                                <div class="form-group ">
                                    <label for="pwd "> <p>IP</p>   </label>
                                    <input type="text" class="form-control " id="ip" name="ip">
                                </div>

                                <!-- ====================== DIV ======================= -->
                                <div class="form-group">
                                    <label for="pwd"> <p>MAC</p> </label>
                                    <input type="text" class="form-control" id="mac" name="mac">
                                </div>

                                <!-- ====================== DIV ======================= -->
                                <div class="form-group">
                                    <label for="pwd"><p>SELECCIONAR FECHA O DIAS</p></label>
                                    <select class="form-control" name="diafecha" id="diafecha" onclick="Func_hide()">
                                        <option value="1" selected>Dias restantes</option>
                                        <option value="2">Fecha final</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    
                                    <input type="number" class="form-control" id="DIASS" name="d" value="" style="display: block">
                                    <input type="date" class="form-control" id="FECHASS" name="f" value="" style="display: none">

                                </div>
                                <!-- ========================= butonos =========================== -->
                                <div class="form-group"> 
                                    <button type="reset" name="reset" class="btn btn-sm btn-danger" >Reset</button>
                                </div>
                                

                               
                                <!-- ====================== DIV ======================= -->
                                @if(isset($queryANTI))
                                <div class="form-group">
                                    <label for="pwd"> <p>ANTIVIRUS</p> </label>
                                    <select class="form-control " name="anti" id="anti">
							
                                    @foreach($queryANTI as $row1)
                                        <option value="{{$row1->id}}">{{$row1->NombreAntivirus}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @endif

                                <!-- ====================== DIV ======================= -->
                                @if(isset($queryMARCA))
                                <div class="form-group">
                                    <label for="pwd"> <p>MARCA PC </p> </label>
                                    <select class="form-control" name="marca" id="marc">
							
                                     @foreach($queryMARCA as $row2)
                                        <option value="{{$row2->id}}">{{$row2->NombreMarca}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                                @endif

                                <!-- ====================== DIV ======================= -->
                                @if(isset($queryPERS))
                                <div class="form-group">
                                    <label for="pwd"> <p>PERSONAL </p> </label>
                                    <select class="form-control" name="pers" id="pers">
							
                                    @foreach($queryPERS as $row3)
                                         <option value="{{$row3->id}}">{{$row3->Nombre}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                                @endif
                                
                                <!-- ====================== DIV ======================= -->
                                @if(isset($querySO))
                                <div class="form-group">
                                    <label for="pwd"> <p>SISTEMA OPERATIVO</p> </label>
                                    <select class="form-control" name="so" id="so">
							
                                    @foreach($querySO as $row4)
                                         <option value="{{$row4->id}}">{{$row4->NombreSO}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                                @endif


                                    <button type="submit" class="btn btn-primary ">Go</button>
                                   

                            </form>

                    </div>


                    <!-- ====================== SCRIPT ======================= -->
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
                

                        </div>
                   
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
