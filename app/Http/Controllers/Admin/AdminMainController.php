<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StandardEvidence;
use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index(Request $request)
    {
        $query = StandardEvidence::with('user');

        // Filter by school name
        if ($request->filled('sekolah')) {
            $query->whereHas('user.sekolah', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->sekolah . '%');
            });
        }

        // Filter by jenis sekolah
        if ($request->filled('sekolah_type')) {
            $query->whereHas('user.sekolah', function($q) use ($request) {
                $q->where('jenis', $request->sekolah_type);
            });
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $evidences = $query->get();
        
        

        $sekolahList = Sekolah::pluck('nama', 'id');
        $sekolahTypes = Sekolah::distinct()->pluck('jenis');
        $types = StandardEvidence::distinct()->pluck('type');
        $statuses = ['Diproses', 'Diluluskan', 'Ditolak'];
        $listOfYear = StandardEvidence::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
    
        return view('admin.admin', compact('evidences', 'sekolahList', 'sekolahTypes', 'types', 'statuses', 'listOfYear'));
    }

    public function viewAllUser(){
        $users= User::where('name', '!=', 'admin')->get();
        return view('admin.view-user', compact('users'));
    }

    public function review($id){
        $evidence = StandardEvidence::find($id);
        $user = User::find($evidence->user_id);
        
        return view('admin.review', compact('evidence','user'));
    }

    public function registerUser(){
        return view('admin.register-user');
    }

    public function storeByAdmin(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'category' => 'required',
            'kod'=> 'required|unique:users',
            'pgb'=>'required',
            'phone_number'=>'required|numeric|digits_between:10,15',
            'password' => 'required',
            'password_confirmation'=> 'required',
        ]);

        // Check if password and confirmation match
        if ($request->password !== $request->password_confirmation) {
            session()->flash('error', 'Password and confirmation do not match.');
            return redirect()->back()->withInput();
        }
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 2,
                'category' => $request->category,
                'kod' => $request->kod,
                'pgb' => $request->pgb,
                'phone_number'=> $request->phone_number,
            ]);

            // Flash success message
            session()->flash('success', 'User registered successfully!');
        } catch (\Exception $e) {
            // Flash error message
            session()->flash('error', 'Failed to register user: '. $e->getMessage());
        }

        return redirect()->route('admin.view.user');
    }

    public function viewUserDetail($id){ 
        $user = User::find($id);
        return view('admin.view-user-detail', compact('user'));
        }
}
