<?php

namespace App\Http\Controllers;

use App\DocumentUpload;
use App\Http\Requests\UploadDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadDocumentController extends Controller
{
    //


    public function listDocumentTxt()
    {
        $document = DocumentUpload::with('user')->get();
        return response()->json($document);
    }


    public function uploadDocumentTxt(UploadDocument $request)
    {

        $archivo = $request->file('path');
        $archivo = fopen($archivo, 'r');
        $maxLinea = 0;
        $lineaMaxima = '';
        while ($linea = fgets($archivo)) {
            $cantAux = $this->UpperCount($linea);
            if ($maxLinea < strlen($cantAux)){
                $maxLinea =strlen($cantAux);
                $lineaMaxima = $cantAux;
            }
        }
        if ($lineaMaxima != '') {
            DocumentUpload::create(['value' => $lineaMaxima, 'user_id' => $request->input("currentUser")]);
        }
        return response()->json($lineaMaxima);
    }

    function UpperCount($string)
    {
        $string = preg_replace("/[^A-Z]+/", '', $string);
        return $string;
    }
}
