<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tabpc;
use Carbon\Carbon;


use DB;
use Redirect;

use PDF;
use Storage;


class Control_pc extends Controller
{
    //

    


    public function Formux(){

        $queryANTI = DB::table('antivirus')->get();
        $queryMARCA = DB::table('marcapc')->get();
        $queryPERS = DB::table('personal')->get();
        $querySO = DB::table('so')->get();

        return view('formulax', compact('queryANTI', 'queryMARCA', 'queryPERS', 'querySO'));


    }

    public function Poner_Info(){

        $ipx = strtoupper($_POST['ip']);
        $macx = strtoupper($_POST['mac']);
        $antix = strtoupper($_POST['anti']);
        $marcax = strtoupper($_POST['marca']);
        $persx = strtoupper($_POST['pers']);
        $sox = strtoupper($_POST['so']);

        $fx = $_POST['f'];
        $dx = $_POST['d'];

        
        $T_ahora = Carbon::now('America/Mexico_City');
        

        if($dx != ''){
            $T_ahora = $T_ahora->addDays($dx); 
        }else{
            $T_ahora = new Carbon($fx);
        }

        $T_ahora = $T_ahora->toDateString();

        //var_dump($T_ahora);

        
        try{

            $mipc = new Tabpc; 

            $mipc->IP=$ipx;
            $mipc->MAC=$macx;
            $mipc->idf_antivirus=$antix;
            $mipc->idf_marcapc=$marcax;
            $mipc->idf_personal=$persx;
            $mipc->idf_SO=$sox;

            $mipc->vigencia=$T_ahora;
            


            


            $mipc->save();

            return Redirect::to('putinfoTOP')->with('exito', 'Datos Actualizados');


        }catch(\Exception $e){

            $mensage = $e->getMessage();
            
            return Redirect::to('putinfoTOP')->with('error', $mensage);
            
           
        }
        


    }

    
    public function ShowTabla(){

        $query = DB::table('pc')
        ->leftJoin('antivirus', 'pc.idf_antivirus', '=', 'antivirus.id')
        ->leftJoin('marcapc', 'pc.idf_marcapc', '=', 'marcapc.id')
        ->leftJoin('personal', 'pc.idf_personal', '=', 'personal.id')
        ->leftJoin('so', 'pc.idf_SO', '=', 'so.id')

        ->select('pc.id as idx', 'pc.IP as ip', 'pc.MAC as mac', 'antivirus.NombreAntivirus as NomAnt',
        'pc.vigencia as NumVig','marcapc.NombreMarca as NomMarc', 'personal.Nombre as NomPers', 'so.NombreSO as NomSO' )

        ->get();

        return view('tablapc1', compact('query'));
    }

    public function VerInfox($Id){

        //$query = DB::table('pc')->where('id', $Id)->first();

        $query = DB::table('pc')
        ->leftJoin('antivirus', 'pc.idf_antivirus', '=', 'antivirus.id')
        ->leftJoin('marcapc', 'pc.idf_marcapc', '=', 'marcapc.id')
        ->leftJoin('personal', 'pc.idf_personal', '=', 'personal.id')
        ->leftJoin('areapc', 'personal.idf_areapc', '=', 'areapc.id')
        ->leftJoin('so', 'pc.idf_SO', '=', 'so.id')

        ->select('pc.id as idx', 'pc.IP as ip', 'pc.MAC as mac', 'antivirus.NombreAntivirus as NomAnt',
        'pc.vigencia as NumVig',
        'marcapc.NombreMarca as NomMarc', 'personal.Nombre as NomPers', 'personal.idf_areapc as AreaPc', 'so.NombreSO as NomSO' )

        ->where('pc.id', $Id)->first();

        

            //var_dump($query);
       return view('pag_showinfo', compact('query'));

    }

    public function DeletInfox($Id){


        try{
            DB::table('pc')->where('id', '=', $Id)->delete();

            /*$query = DB::table('pc')
            ->leftJoin('antivirus', 'pc.idf_antivirus', '=', 'antivirus.id')
            ->leftJoin('marcapc', 'pc.idf_marcapc', '=', 'marcapc.id')
            ->leftJoin('personal', 'pc.idf_personal', '=', 'personal.id')
            ->leftJoin('so', 'pc.idf_SO', '=', 'so.id')

            ->select('pc.id as idx', 'pc.IP as ip', 'pc.MAC as mac', 'antivirus.NombreAntivirus as NomAnt', 
            'pc.vigencia as NumVig',
            'marcapc.NombreMarca as NomMarc', 'personal.Nombre as NomPers', 'so.NombreSO as NomSO' )

            ->get(); */

            //return view('tablapc1', compact('query'))->with('exito', 'Dato eliminado');
            return Redirect::to('tablapcTOP')->with('exito', 'Datos Actualizados');

        }catch(\Exception $e){

            

           // return view('tablapc1')->with('error', 'Id no existe');
           return Redirect::to('tablapcTOP')->with('exito', 'Datos No Actualizados');

        }


    }

    // ==================== edit


    public function EditInfox($Id){ //  captando infos da linha

        //$query = DB::table('pc')->where('id', $Id)->first();

        $query = DB::table('pc') //serve para aparecer as infos na caixa de texto
        ->leftJoin('antivirus', 'pc.idf_antivirus', '=', 'antivirus.id')
        ->leftJoin('marcapc', 'pc.idf_marcapc', '=', 'marcapc.id')
        ->leftJoin('personal', 'pc.idf_personal', '=', 'personal.id')
        ->leftJoin('areapc', 'personal.idf_areapc', '=', 'areapc.id')
        ->leftJoin('so', 'pc.idf_SO', '=', 'so.id')

        ->select('pc.id as idx', 'pc.IP as ip', 'pc.MAC as mac', 'pc.vigencia as NumVig', 'antivirus.NombreAntivirus as NomAnt',

            'antivirus.id as id_ant',
            'marcapc.id as id_marca', 
            'so.id as id_so', 
            'personal.id as id_pers',
            
        'marcapc.NombreMarca as NomMarc', 'personal.Nombre as NomPers', 'personal.idf_areapc as AreaPc', 
        'so.NombreSO as NomSO' )

        ->where('pc.id', $Id)->first();

        //sublistas
        $queryAnt = DB::table('antivirus')->get();
        $querySO = DB::table('so')->get();
        $queryAreaPC = DB::table('areapc')->get();
        $queryMarca = DB::table('marcapc')->get();
        $queryNOM = DB::table('personal')->get();


        return view('pag_edit', compact('query', 'queryAnt', 'querySO', 'queryAreaPC', 'queryMarca', 'queryNOM'));
    }

    public function go_update(){ // ao clicar no botao go, eviamos as mudanças
        $id = strtoupper($_POST['saveUpdate']);
        $namex = ($_POST['name']);
        $antix = strtoupper($_POST['anti']);
        $ipx = strtoupper($_POST['ip']);
        $macx = strtoupper($_POST['mac']);
        $marcx = strtoupper($_POST['marc']);
        $sox = strtoupper($_POST['so']);

        $fx = $_POST['f'];
        $dx = $_POST['d'];


        $T_ahora = Carbon::now('America/Mexico_City');
        

        if($dx != ''){
            $$T_ahora = $T_ahora->addDays($dx);
             
            
        }else{
            $T_ahora = new Carbon($fx);
        }



        $T_ahora = $T_ahora->toDateString();

        //var_dump($T_ahora);
        
        
        try{
            DB::table('pc')
            ->where('id', $id)
            ->update(['id' => $id, 'IP' => $ipx,
                        'MAC' => $macx, 'idf_antivirus' => $antix, 'idf_marcapc' => $marcx,
                        'idf_personal' =>$namex, 'idf_SO' => $sox, 'vigencia'=> $T_ahora]);

            return \Redirect::route('ruta_edit', $id)->with('exito', 'Actualizad');

        }catch(\Exception $e){

            $msg = $e->getMessage();

            return \Redirect::route('ruta_edit', $id)->with('error', $msg);
        }

        return view('pag_edit', compact('query'));

       
    }
    
    
    // PDF area =======================================

    public function MakePDF(){
        

       // $query = DB::table('pc')->get();
        $query = DB::table('pc')
        ->leftJoin('antivirus', 'pc.idf_antivirus', '=', 'antivirus.id')
        ->leftJoin('marcapc', 'pc.idf_marcapc', '=', 'marcapc.id')
        ->leftJoin('personal', 'pc.idf_personal', '=', 'personal.id')
        ->leftJoin('so', 'pc.idf_SO', '=', 'so.id')

        ->select('pc.id as idx', 'pc.IP as ip', 'pc.MAC as mac', 'antivirus.NombreAntivirus as NomAnt',
        'pc.vigencia as NumVig','marcapc.NombreMarca as NomMarc', 'personal.Nombre as NomPers', 'so.NombreSO as NomSO' )

        ->get();
        

        $filename = '/pdf' . '/' . 'tablaExcel' . '.pdf'; 
        $dir = Storage::disk('public')->path($filename);
    
        $pdf = PDF::loadView('pdf', compact('query'))->save($dir);
    
        return redirect()->back()->with('pdf', $filename);
        // return redirect('dashboard')->with('status', 'Profile updated!');
    }
}


