<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
Use Alert;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dato = Archivo::all();
        return view('inicio.home', compact('dato'));
    }

    public function showIndex($lg)
    {
        App::setLocale($lg);

        return view('Inicio.archivos.subir');
    }


    public function storeArchivo(Request $request)
    {
        $acceso = "";
        $type = $request['type'];
        switch ($type) {
            case 1:
                $acceso = 0;
                break;
            case 2:
                $acceso = 1;
                break;
        }

        $files = $request->file('files');
        if($request->hasFile('files')){
            foreach($files as $file){
                // $fileName = Str::slug($file->getClientOriginalName(),'-').'.'.$file->getClientOriginalExtension();
                if(Storage::putFileAs('public/'.'archivos', $file,$file->getClientOriginalName())){

                    $request= Archivo::create([
                        'name' => $file->getClientOriginalName(),
                        'url' => Storage::putFileAs('public/'.'archivos', $file,$file->getClientOriginalName()),
                        'titulo' => $request->titulo,
                        'description' => $request->description,
                        'detalle' => $request->detalle,
                        'password_code' => $code = rand(100000,999999),
                        'empresa' => $request->empresa,
                        'acceso' => $acceso,
                        ]);
                        Alert::success(__('trdc.HHMMEXTT'), __('trdc.HHMMSCRR'));
                        return back();
                }else{
                    Alert::warning(__('trdc.HHMMERRR'), __('trdc.HHMMCRNR'));
                    return back();
                }
            }
        }else{
            Alert::warning(__('trdc.HHMMERRR'), __('trdc.HHMMNSNS'));
            return back();
        }
    }

    public function sector(Request $request,$id,$lg)
    {
        App::setLocale($lg);

        $sector =   DB::table('sectors')->where('empresa_id', $id)->get();

        return $sector;
    }

}
