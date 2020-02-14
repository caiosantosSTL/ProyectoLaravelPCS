@extends('layouts.app')

@section('content')




<div class="container"  >
    <div class="row justify-content-center" >
        <div class="col-md-4" >
            <div class="card" >
                <div class="card-header">Esti binevenit en home</div>


                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <?php
                        use Carbon\Carbon;
                        $date = Carbon::now();
                        $pate = Carbon::setLocale('pt-BR');
                        


                        //$date = $date->format('d-m-y');
                        $date3 = $date->addYear();
                        //$date = $date->format('l jS \\of F Y h:i:s A');
                        //$endDate = $date->addYear(66);  //para sumar el ano
                        //$endDate = $date->subYears(4); //subtrair el ano
                        //$date = Carbon::createFromDate(1970,19,12)->age; // a idade captada

                        $date44 = new Carbon('tomorrow'); 
                        $date2 = new Carbon('yesterday');  
                        //siguiente lunes         
                        $date4 = new Carbon('next monday'); 
                        //sábado pasado
                        $date5 = new Carbon('last saturday');  
                        
                        //00000000000000000000

                        $carbon = new Carbon();                  // equivalent to Carbon::now()
                        $carbon = new Carbon('first day of January 2008', 'America/Vancouver');
                        echo get_class($carbon);  
                        echo '<br>';

                        
                        echo 'Dia de manana -> ', $date44;
                        echo '<br>';
                        echo 'Dia de ayer ->', $date2;
                        echo '<br>';
                        echo $date3;
                        echo '<br>';
                        echo 'Prox segunda ->', $date4;
                        echo '<br> ======================'; 

                        
                        //0000000000000000000000000


                        // 00000000000000000000000

                        
                        // 00000000000000000000000
                        /*echo '<br><br>';
                        $gogo = Carbon::create(2011, 10, 1, 0);
                        $gogo->toDateTimeString();
                        $gogo->addMonth(0);
                        $datax = $gogo->toFormattedDateString();

                         $po = Carbon::create(2012, 1, 1, 0);
                         //$po->addMonth(1);
                         $po1 = $po->toFormattedDateString();
                         

                         $lo = Carbon::create(2012, 6, 31, 0);
                         //$lo->addMonth(6);
                         $lo1 = $lo->toFormattedDateString();
                         

                         echo '=== ',$datax, '=====';
                         echo '<br>Valor valid ', $po1;
                         //echo '<br>Valor dopo ', $lo1;

                         if($datax <= $po1){
                            echo '<br> == Safe ==';
                         }elseif($datax > $po1){
                            echo '<br>== Ya paso ==';
                         }
                         */

                         
                         ///////////////////////////////
                         /*
                            agarramos a data de agora o nosso now, e comparamos com a data
                            de vigencia

                            com uma lib de carbon temos uma forma de fazer a data virar numero de dias

                            com uso de if else, podemos dizer quanto vale os numeros de dias:
                            ##
                            se for menor que 30, estamos bem, se for menor que 30 mas maior que 15, epa, cuidado
                            se for menor que 15 mas maior que 7, o tempo esta agotando
                            caso seja menor que 7 mas maior que 1 ou igual a 0, ja esta vencido.

                         */

                        //$Tempo_Ahora = Carbon::now(new DateTimeZone('America/Mexico_City'));
                        $Tempo_Ahora = Carbon::create(2020, 11, 1);
                            echo '<br>Os dias hoje == ',$Tempo_Ahora;
                        $Dias_Rest= $Tempo_Ahora->diffInDays($Tempo_Ahora);
                            echo '<br>Os dias restantes entre agora e agora == ',$Dias_Rest;
                        $Data_valid = Carbon::create(2020, 1, 1);
                            echo '<br>Data final: ',$Data_valid;
                        $Dias_Rest2= $Tempo_Ahora->diffInDays($Data_valid);
                            echo '<br>Os dias restantes entre agora e final == ',$Dias_Rest2;

                        

                        if($Tempo_Ahora != $Data_valid && $Tempo_Ahora < $Data_valid){
                           
                            if($Dias_Rest2 >= 31){
                                echo '<br> ==== Safe =====';
                                echo '<br><img src="../picturas/Faros/faro_azul.png" class="w-25 p-3" class="img-rounded" alt="Cinque Terre">';
                                
                            }elseif($Dias_Rest2 < 31 && $Dias_Rest2 >= 25){
                                echo '<br> ==== Atencion =====';
                                echo '<br><img src="../picturas/Faros/faro_verd.png" class="w-25 p-3" class="img-rounded" alt="Cinque Terre">';
                                
                            }elseif($Dias_Rest2 < 25 && $Dias_Rest2 >= 15){
                                echo '<br> ==== Warning =====';
                                echo '<br><img src="../picturas/Faros/faro_amarel.png" class="w-25 p-3" class="img-rounded" alt="Cinque Terre">';
                                
                            }elseif($Dias_Rest2 < 15 && $Dias_Rest2 >= 1){
                                echo '<br> ==== Va a calir =====';
                                echo '<br><img src="../picturas/Faros/faro_laranj.png" class="w-25 p-3" class="img-rounded" alt="Cinque Terre">';
                                
                            }
                        }
                        
                        if($Tempo_Ahora == $Data_valid || $Tempo_Ahora > $Data_valid){

                                echo '<br> ==== Ja esta vencido =====';
                                echo '<br><img src="../picturas/Faros/faro_verm.png" class="w-25 p-3" class="img-rounded" alt="Cinque Terre">';  
                          
                        }
                        
                       /* if($Tempo_Ahora > $Data_valid){
                            echo '<br> ==== Ja esta vencido =====';
                            echo '<br><img src="../picturas/faro_verm.png" class="w-25 p-3" class="img-rounded" alt="Cinque Terre">';  
                        } */
                    


                        

                        
                    ?>

 

                    <br><br><br>
                    Hello
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
