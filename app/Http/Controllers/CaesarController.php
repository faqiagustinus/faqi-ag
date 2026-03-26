<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaesarController extends Controller
{
    public function index()
    {
        return view('caesar');
    }

    public function process(Request $request)
    {
        $text = $request->text; $shift = $request->shift;
        $mode = $request->action;

        $result = '';
        $geser = $mode == 'encrypt' ? $shift : -$shift;

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            $code = ord($char);

            if ($code >= 65 && $code <= 90) {
                $result .= chr((($code - 65 + $geser + 26) % 26) + 65);
            } elseif ($code >= 97 && $code <= 122) {
                $result .= chr((($code - 97 + $geser + 26) % 26) + 97);
            } else {
                $result .= $char;
            }
        }

        return view('caesar', [
            'result' => $result,
            'text' => $text,
            'shift' => $shift,
            'mode' => $mode
        ]);
    }

    public function processJson(Request $request)
    {
        return response()->json([
            'message' => 'Proses JSON Caesar'
        ]);
    }
}