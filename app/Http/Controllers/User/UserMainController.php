<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StandardEvidence;

class UserMainController extends Controller
{
    //
    public function index(){
        return view('user.dashboard');
    }

    public function createPage(){
        return view('user.create');
    }

    public function editPage($id){
        $evidence = StandardEvidence::find($id);
        return view('user.edit', compact('evidence'));
    }

    public function delete($id){
        $evidence = StandardEvidence::find($id);
        
        if (!$evidence) {
            return redirect()->route('dashboard')->with('error', 'Evidence not found!');
        }
        
        $evidence->delete();
        return redirect()->route('dashboard')->with('success', 'Evidence deleted successfully!');
    }
}
