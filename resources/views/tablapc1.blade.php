@extends('layouts.app')
<?php
use Carbon\Carbon;
?>
@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header text-center">Tablas de PCs</div>



                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Session::has('error'))
                    <label for="name" class="col-md-4 col-form-label text-md-center text-danger">Id no existe</label>
                    {{Session::get('error')}}
                    @endif

                    @if(Session::has('exito'))
                    <label for="name" class="col-md-4 col-form-label text-md-center text-danger">Eliminad</label>
                    {{Session::get('exito')}}
                    @endif

                            <!-- ooooooooooooooooooooooo TABELA ooooooooooooooooooooo -->
                    <div class="table-responsive" class="overflow-auto">
                    <!-- Area de botao pdf -->
                    <a href="{{ route('pdf') }}"><button type="button" class="btn btn-danger btn-sm float-right">&nbsp; Exportar Reporte PDF</button></a>
                    
                    <table class="table ">

                        <!-- ======================== COLUNAS ============================= -->
                            <thead>
                                <tr>
                                <th scope="col"><p class="text-center">Personal</p></th>
                                <th scope="col"><p class="text-center">Antivirus</p></th>
                                <th scope="col"><p class="text-center">Vigencia</p></th>
                                <th scope="col"><p class="text-center">IP</p></th>
                                <th scope="col"><p class="text-center">MAC</p></th>                               
                                <th scope="col"><p class="text-center">Marca de PC</p></th>                             
                                <th scope="col"><p class="text-center">Sis. Operativo</p></th>
                                <th></th>
                                <th scope="col"><p class="text-center">Action</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ======================== LINHAS ============================= -->
                                
                            @if(isset($query))
                                @foreach($query as $rows)
                                
                                <tr>

                                <?php
                                $Tiempo_Ahora = Carbon::now(new DateTimeZone('America/Mexico_City'));
                                //$Tiempo_Ahora = Carbon::create(2020, 3, 1);
                                $Data_valid = Carbon::create($rows->NumVig);
                                $Dias_Restant= $Tiempo_Ahora->diffInDays($Data_valid);

                                // echo " || ",$Data_valid;
                                /*
                                if($Dias_Restant >= 31 ){
                                    echo '<br> ==== Safe =====';
                                    echo '<br><button type="button" class="btn btn-outline-success">Success</button>';
                                    echo '<br><img src="../picturas/faro_verd.png" class="img-rounded" alt="Cinque Terre">';
                                }elseif($Dias_Restant < 31 && $Dias_Restant >= 25){
                                    echo '<br> ==== Atencion =====';
                                    echo '<br><button type="button" class="btn btn-outline-secondary">OIOO</button>';
                                }elseif($Dias_Restant < 25 && $Dias_Restant >= 15){
                                    echo '<br> ==== Warning =====';
                                    echo '<br><button type="button" class="btn btn-outline-warning">Epa</button>';
                                }elseif($Dias_Restant < 15 && $Dias_Restant >= 1){
                                    echo '<br> ==== Cuidado =====';
                                    echo '<br><button type="button" class="btn btn-outline-dark">Vixi</button>';
                                }elseif($Dias_Restant < 1 && $Dias_Restant >= 0){
                                    echo '<br> ==== Ja esta vencido =====';
                                    echo '<br><button type="button" class="btn btn-outline-danger">AI AI</button>';
                                }
                                */
                                



                                ?>
                                                                       
                                    <td><p class="align-middle" ><br>{{$rows->NomPers}}</p></td>
                                    <td><p class="text-center "><br>{{$rows->NomAnt}}</p></td>               
                                    <td><p class="text-center ">
                                        <?php
                                        if($Tiempo_Ahora != $Data_valid && $Tiempo_Ahora < $Data_valid){
                                                
                                            if($Dias_Restant >= 31 ){
                                                    //{{$rows->NumVig}}  {{$Dias_Restant}} 
                                                echo '<br><img src="../picturas/Faros/faro_azulN2.png"  class="img-rounded" alt="Cinque Terre">';
                                            }elseif($Dias_Restant < 31 && $Dias_Restant >= 25){
                                                
                                                echo '<br><img src="../picturas/Faros/faro_verd2.png" class="img-rounded" alt="Cinque Terre">';
                                                
                                            }elseif($Dias_Restant < 25 && $Dias_Restant >= 15){
                                                echo '<br><img src="../picturas/Faros/faro_amarel2.png" class="img-rounded" alt="Cinque Terre">';
                                            }elseif($Dias_Restant < 15 && $Dias_Restant >= 1){
                                                echo '<br><img src="../picturas/Faros/faro_laranj2.png" class="img-rounded" alt="Cinque Terre">';
                                            }
                                        }

                                        if($Tiempo_Ahora == $Data_valid || $Tiempo_Ahora > $Data_valid){
                                            echo '<br><img src="../picturas/Faros/faro_verm2.png" class="img-rounded" alt="Cinque Terre">';
                                        }




                                        ?>

                                    </p></td>
                                    <td><p class="text-center "><br>{{$rows->ip}}</p></td>
                                    <td><p class="text-center"><br>{{$rows->mac}}</p></td>                                   
                                    <td><p class="text-center "><br>{{$rows->NomMarc}}</p></td>                                   
                                    <td><p class="text-center "><br>{{$rows->NomSO}}</p></td>
                                    <td>
                                        <!-- ======================== BUTONOS ============================= -->
                                       <!-- <a href="{{URL::to('/verInfo', $rows->idx)}}"><button type="button" class="btn btn-primary">Veer</button></a> -->
                                        <!--<a href="{{URL::to('/verInfo', $rows->idx)}}"> <br><img src="../picturas/Butonos/butonVe2.png" alt="Cinque Terre"> </a>-->
                                        <a href="{{URL::to('/verInfo', $rows->idx)}}"> <br><img src="{{ asset('/picturas/Butonos/butonVe2.png') }}" alt="Cinque Terre"> </a>

                                    </td>
                                    <td>
                                     <!--  <a href="{{URL::to('/editInfo', $rows->idx)}}"><button type="button" class="btn btn-success">Editar</button> </a> -->
                                       <a href="{{URL::to('/editInfo', $rows->idx)}}"> <br><img src="../picturas/Butonos/butonUP2.png"  alt="Cinque Terre"> </a>  
                                    </td>
                                    <td>
                                      <!-- <a href="{{URL::to('/deletInfo', $rows->idx)}}"><button type="button" class="btn btn-danger">Eliminar</button> </a> --> 
                                       <a href="{{URL::to('/deletInfo', $rows->idx)}}"> <br><img src="../picturas/Butonos/butonDEL2.png" alt="Cinque Terre"> </a>
                                    </td>
                                    
                                </tr>
                                
                                @endforeach

                            @endif
                    
                            </tbody>
                            </table>
                        </div>
                   
                </div>
                    
            </div>
            <!-- NUEVO CARD PARA VISUALIZAR PDF ================================= -->
            <br>
            <hr>
            <div class="card">
              <div class="card-header">
                Area de PDF
              </div>
              <div class="card-body">

              @if(Session::has('pdf'))

                <object data="{{asset('storage')}}{{Session::get('pdf')}}" type='application/pdf' width='100%' height='600px'></object>

                @endif

               
              </div>
            </div>

            <!-- FINAL DE CARD ================================= -->
        </div>
    </div>
</div>

@endsection

