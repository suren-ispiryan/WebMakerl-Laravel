<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeEditorController extends Controller
{
    public function editCode(Request $request){       
        $language = strtolower($request->language);
        $code = $request->code;
       
        $random = substr(md5(mt_rand()), 0, 7);
        $filePath = public_path("temp/" . $random . "." . $language);
        
        $programFile = fopen($filePath, "w");
        fwrite($programFile, $code);
        fclose($programFile);
    
        if ($language == "php") {
            $output = shell_exec("php $filePath");
            return $output;
        }
        if ($language == "cpp" || $language == "c") {
            $output = shell_exec("php $filePath");
            return $output;
        }
        if ($language == "python") {
            $output = shell_exec("php $filePath");
            return $output;
        }
        if ($language == "node js") {
            $output = shell_exec("php $filePath");
            return $output;
        }
    }
}
