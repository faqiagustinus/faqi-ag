<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CipherController extends Controller
{
    public function index()
    {
        return view('cipher');
    }

    public function process(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'shift' => 'required|integer|min:1|max:25',
            'action' => 'required|in:encrypt,decrypt'
        ]);

        $text = $request->text;
        $shift = (int) $request->shift;
        $action = $request->action;

        if ($action === 'decrypt') {
            $shift = -$shift;
        }

        $result = $this->caesarCipher($text, $shift);

        return response()->json([
            'success' => true,
            'result' => $result,
            'action' => $action
        ]);
    }

    private function caesarCipher($text, $shift)
    {
        $result = '';
        $length = strlen($text);
        
        for ($i = 0; $i < $length; $i++) {
            $char = $text[$i];
            
            if (ctype_upper($char)) {
                $result .= chr(((ord($char) - 65 + $shift) % 26 + 26) % 26 + 65);
            } elseif (ctype_lower($char)) {
                $result .= chr(((ord($char) - 97 + $shift) % 26 + 26) % 26 + 97);
            } else {
                $result .= $char;
            }
        }
        
        return $result;
    }
}
