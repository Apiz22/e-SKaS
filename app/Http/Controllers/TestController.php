<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StandardEvidence;

class TestController extends Controller
{
    //
    public function testForm (Request $request){
        
        // dd($request->all());
        // $validated = $request->validate([
        //     'link' => 'required|url',
        //     'type' => 'required|string',
        //     'note'  => 'nullable|string',
        // ]);

        StandardEvidence::create([
            'user_id' => Auth::id(), 
            'link'    => $request['link'],
            'type'    => 'Standard 1',
            'note'    => 'test',
            'status'  => 'Diproses',
            'sub'=> $request['sub_type'],
        ]);

        return redirect()->route('aspek_1');
    }
}
