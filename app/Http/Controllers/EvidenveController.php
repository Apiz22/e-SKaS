<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StandardEvidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvidenveController extends Controller
{
    //
    //create a new evidence
    public function storeByUser(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validated = $request->validate([
            'link' => 'required',
            // 'type' => 'required|string',
            'note'  => 'nullable|string',
            'sub'=> 'nullable|string',  
        ]);

    $sub =$validated['sub'];
    $type = '';
        $firstNumber = explode('.', $sub)[0]; // Get the first number from the sub
        // Set the standard based on the first number
        switch ($firstNumber) {
            case '1':
                $type = 'Standard 1';
                break;
            case '2':
                $type = 'Standard 2';
                break;
            case '3':
                $type = 'Standard 3';
                break;
            case '4':
                $type = 'Standard 4';
                break;
            default:
                $type = 'Unknown Standard';
                break;
            }

        // Create a new StandardEvidence record
        StandardEvidence::create([
            'user_id' => Auth::id(), 
            'link'    => $validated['link'],
            'sub'    => $validated['sub'],
            'note'    => $validated['note'],
            'type'=> $type,
            'status'  => 'Diproses', 
        ]);
        // Redirect or return a response
        return redirect()->route('create')->with('success', 'Rekod Eviden Berjaya di Tambah!');
    }

    public function viewByUser(Request $request)
    {
        $query = StandardEvidence::where('user_id', Auth::id());
        
        // Filter by types
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

       // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

         // Filter by year
         if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        $evidences = $query->get();

        $user_id = Auth::id();
        
        // return view('user.dashboard', compact('evidences','type'));
        $types = StandardEvidence::where('user_id', $user_id)->distinct()->pluck('type');
        $statuses = ['Diproses', 'Diluluskan', 'Ditolak'];
        $listOfYear = StandardEvidence::where('user_id', $user_id)
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('user.dashboard', compact('evidences', 'types', 'statuses','listOfYear'));
    }

   
    
    public function update(Request $request, $id){
        $evidence = StandardEvidence::find($id);
        $evidence->update([
            'link' => $request->link,
            'type' => $request->type,
            'note' => $request->note,
            'status' => 'Diproses',
        ]);
        return redirect()->route(route: 'dashboard')->with('success', 'Rekod Berjaya di Sunting!');
    }

    //-------------------------admin part--------------------------------
     //view all evidences
    //  public function viewAll(Request $request)
    //  {
    //      $evidences = StandardEvidence::all();
         
    //      return view('admin.admin', compact('evidences'));
    //  }

    public function reviewByAdmin(Request $request, $id){
        $evidence = StandardEvidence::find($id);
        $evidence->update([
            'status' => $request->status,
            'note' => $request->note,
            'update_at' => now(),
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Evidence updated successfully!');
    }

    public function getEvidence($id)
    {
        $evidence = StandardEvidence::find($id);
        return response()->json($evidence);
    }

    // Add using form from Page each Standard
    public function store(Request $request)
{
    $validated = $request->validate([
        'sub' => 'required',
        'link' => 'required|url',
        'message'=>'nullable'
    ]);
    
    $sub =$validated['sub'];
    $type = '';
        $firstNumber = explode('.', $sub)[0]; // Get the first number from the sub
        // Set the standard based on the first number
        switch ($firstNumber) {
            case '1':
                $type = 'Standard 1';
                break;
            case '2':
                $type = 'Standard 2';
                break;
            case '3':
                $type = 'Standard 3';
                break;
            case '4':
                $type = 'Standard 4';
                break;
            default:
                $type = 'Unknown Standard';
                break;
            }

    StandardEvidence::create(
        [
            'user_id' => Auth::id(), 
            'link'    => $validated['link'],
            'type'    => $type,
            'note'    => $validated['message'],
            'sub'     => $validated['sub'],
            'status'  => 'Diproses', 
        ]
    );
    return redirect()->back()->with('success', 'Eviden berjaya di tambah!');
}

public function updateForm(Request $request, StandardEvidence $evidence)
{
    $evidence->update([
        'link' => $request->link
    ]);

    return redirect()->back()->with('success', 'Eviden berjaya du ubah');
}

public function destroy(StandardEvidence $evidence)
{
    $evidence->delete();
    return redirect()->back()->with('success', 'Eviden bejaya di padam');
}
}
