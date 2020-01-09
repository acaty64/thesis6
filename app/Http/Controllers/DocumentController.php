<?php

namespace App\Http\Controllers;

use App\Sequence;
use App\Trace;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class DocumentController extends Controller
{

    /**
     * route('document.up10')
     */
    public function up10(Request $request)
    {
        $data = $request->all();
        $thesis_id = $data['thesis_id'];
        $deal_id = $data['deal_id'];
        $sequence = Sequence::where('deal_id', $deal_id)->first();
        $sequence_id = $sequence->id;
        $author_id = $data['author_id'];
        try {
            $file = $request->file('file');
            $document = $file->getClientOriginalName(); 
            $filename = basename($file);
            $filename = 'up10' . date('Y-m-d H:i:s') . '.doc';

            $path = realpath($file);

            $root = storage_path('app/public');
            $newDir = $root . '/' . $thesis_id;
            $newFile = $newDir . '/' . $filename;
            copy($path, $newFile);
            if(file_exists($newFile)){
                $trace = Trace::create([
                    'thesis_id' => $thesis_id,
                    'sequence_id' => $sequence_id,
                    'date' => Carbon::today()->toDateTimeString(),
                    'document' => $document,
                    'filename' => $filename
                ]);
                Flash::success('Documento ' . $document . ' grabado.');
                Flash::error("WORKING (email)...");
                return view('home');
            }else{
                Flash::error('Documento no grabado.'  . $document);
                return ['success' => false];
            }
        } catch (Exception $e) {
            Flash::error('Documento no grabado.'  . $document);
            return ['success' => false];
        }
    }


    public function download($pathtoFile, $nameDocument)
    {
// dd($pathtoFile);
        // return Storage::download($pathtoFile, $nameDocument);
        // return download($pathtoFile, $nameDocument);
        return response()->download($pathtoFile);
    }
    /**
     * route('document.down10')
     */
    public function down10($trace_id, $new_deal_id, $new_sequence_id)
    {
        // identifica ultimo documento subido
        $trace = Trace::findOrFail($trace_id);
        $documentos = Trace::where('filename','!=',null)->get();
        $ultimo = $documentos->sortByDesc('id')->first();
     
        $nameDocument = $trace->document;
        // verifica que esta descargando el ultimo
        if($trace_id == $ultimo->id){
        // Graba el trace
            Trace::create([
                'thesis_id' => $trace->thesis_id,
                'sequence_id' => $new_sequence_id,
                'date' => Carbon::today()->toDateTimeString(),
                'document' => $trace->document,
            ]);
            Flash::success('Documento descargado. Podrá subir sus observaciones en el siguiente acceso.');
            // return view('home');
        }else{
            Flash::error('El documento descargado no es la última versión.');
            // return back();
        }
        $pathtoFile = storage_path( 'app/public/'.$trace->thesis_id.'/'.$trace->filename);
        return response()->download($pathtoFile, $nameDocument);
        // $this->download($pathtoFile, $trace->document);

    }

}
