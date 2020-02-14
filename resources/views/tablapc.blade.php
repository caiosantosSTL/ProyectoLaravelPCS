@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header text-center">Tablas de PCs</div>



                <div class="card-body bg-dark">
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

                            <!-- oooooooooooooooooooooooTABELAooooooooooooooooooooo -->
                    <div class="table-responsive">

                    
                    <table class="table table-dark">

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

                                                                       
                                    <td><p class="text-center text-warning">{{$rows->NomPers}}</p></td>
                                    <td><p class="text-center text-primary">{{$rows->NomAnt}}</p></td>
                                 
                
                                    <td><p class="text-center text-primary">{{$rows->NumVig}}</p></td>

                                    <td><p class="text-center ">{{$rows->ip}}</p></td>
                                    <td><p class="text-center">{{$rows->mac}}</p></td>                                   
                                    <td><p class="text-center text-success">{{$rows->NomMarc}}</p></td>                                   
                                    <td><p class="text-center text-danger">{{$rows->NomSO}}</p></td>
                                    <td>
                                        <!-- ======================== BUTONOS ============================= -->
                                        <a href="{{URL::to('/verInfo', $rows->idx)}}"><button type="button" class="btn btn-primary">Ver info</button></a>

                                    </td>
                                    <td>
                                       <a href="{{URL::to('/editInfo', $rows->idx)}}"><button type="button" class="btn btn-success">Editar info</button> </a>   
                                    </td>
                                    <td>
                                       <a href="{{URL::to('/deletInfo', $rows->idx)}}"><button type="button" class="btn btn-danger">Eliminar info</button> </a> 
                                    </td>
                                    
                                </tr>
                                
                                @endforeach

                            @endif
                    
                            </tbody>
                            </table>
                        </div>
                   
                </div>
                    
            </div>
        </div>
    </div>
</div>

@endsection

