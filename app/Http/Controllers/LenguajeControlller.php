<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LenguajeControlller extends Controller
{
    public function start(){
        App::setLocale("es");
        return redirect('/es');
    }

    public function homeTraduc($lg){
        App::setLocale($lg);
        return view('home');
    }

    //welcome

    public function welcom(Request $request, $empresa,$id,$lg){

        App::setLocale($lg);


        $archivo = DB::table('archivos')->where('id','=',$id)->where('empresa',$empresa)->first();
        if(!$titulo = $archivo){
            return redirect('404/es');
        }else{
            return view('welcome', compact( 'archivo'));
        }

    }

    public function error( Request $request, $lg){
        App::setLocale($lg);
        return view('error.404');
    }

    public function verificacion(Request $request)
    {
        $user = Archivo::where('password_code', $request->input('password_code'))->count();
        if($user == "1"):
            $archivo = Archivo::where('password_code', $request->input('password_code'))->first();
            // dd($archivo->name);
            return redirect('archivo/'.$archivo->empresa.'/'.$archivo->id.'/es')->with('user', $user)->with('archivo',$archivo);
        else:
            Alert::warning(__('trdc.HHMMCDOP'),  __('trdc.HHMMCDVI'));
            return back();
        endif;
    }

    public function verificar(Request $request, $name,$lg){

        App::setLocale($lg);


        $archivo = DB::table('archivos')->where('name','=',$name)->first();

        if($archivo->acceso == 1){
            if(!$titulo = $archivo){
                return redirect('404/es');
            }else{
                return view('archivo.veerificacion', compact( 'archivo'));
            }
        }else{
            return redirect('archivo/'.$archivo->empresa.'/'.$archivo->id.'/es')->with('archivo',$archivo);
        }



    }

    // public function downloadFile($url)
    // {

    //     $archivo =  Archivo::where('url', $url)->firstOrFail();
    //     $pathToFile = storage_path("app/public/archivos/". $archivo->url);
    //     return response()->dowload($pathToFile);
    // }

    public function downloadFile($name)
    {
        $pathtoFile = storage_path().'/app/public/archivos/'.$name;
        return response()->download($pathtoFile);
    }


}
