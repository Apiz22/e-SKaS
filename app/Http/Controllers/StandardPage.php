<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StandardEvidence;
use App\Models\SubEviden;

class StandardPage extends Controller
{
    //
    public function Aspek_1_1(){

        $userId = Auth::id();

        $tables = [
            '1.1.1' => [
                'title' => '1.1.1',
                'description'=> 'PGB menetapkan hala tuju sekolah secara terancang',
                'Tindakan'=> 'Menetapkan hala tju sekolah dengan membuat analisa, menentukan sasaran, mendokumentasikan dan menyebarluaskan hala tuju secara menyeluruh, jelas serta mengikut keperluan dan kesesuian sekolah',
                'evidences' => StandardEvidence::where('user_id', $userId)
                    ->where('type', 'Standard 1')
                    ->where('sub','like','1.1.1')
                    ->get(),
                'subtypes' => SubEviden::where('type', 'like', '1.1.1.%')
                    ->orderBy('type')
                    ->get()
            ],
            '1.1.2' => [
                'title' => '1.1.2',
                'description'=> '3',
                'Tindakan'=> '23',
                'evidences' =>StandardEvidence::where('user_id', $userId)
                            ->where('type', 'Standard 1')
                            ->where('sub','like','1.1.2')
                            ->get(),
                'subtypes' => SubEviden::where('type', 'like', '1.1.2.%')
                    ->orderBy('type')
                    ->get()
            ],
            '1.1.3' => [
                'title' => '1.1.3',
                'description'=> '3',
                'Tindakan'=> '23',
                'evidences' =>StandardEvidence::where('user_id', $userId)
                            ->where('type', 'Standard 1')
                            ->where('sub','like','1.1.3')
                            ->get(),
                'subtypes' => SubEviden::where('type', 'like', '1.1.3.%')
                    ->orderBy('type')
                    ->get()
            ],
            '1.1.4' => [
                'title' => '1.1.4',
                'description'=> '3',
                'Tindakan'=> '23',
                'evidences' =>StandardEvidence::where('user_id', $userId)
                            ->where('type', 'Standard 1')
                            ->where('sub','like','1.1.4')
                            ->get(),
                'subtypes' => SubEviden::where('type', 'like', '1.1.4.%')
                    ->orderBy('type')
                    ->get()
            ],
            '1.1.5' => [
                'title' => '1.1.5',
                'description'=> '3',
                'Tindakan'=> '23',
                'evidences' =>StandardEvidence::where('user_id', $userId)
                            ->where('type', 'Standard 1')
                            ->where('sub','like','1.1.5')
                            ->get(),
                'subtypes' => SubEviden::where('type', 'like', '1.1.5.%')
                    ->orderBy('type')
                    ->get()
            ],
            '1.1.6' => [
                'title' => '1.1.6',
                'description'=> '3',
                'Tindakan'=> '23',
                'evidences' =>StandardEvidence::where('user_id', $userId)
                            ->where('type', 'Standard 1')
                            ->where('sub','like','1.1.6')
                            ->get(),
                'subtypes' => SubEviden::where('type', 'like', '1.1.6.%')
                    ->orderBy('type')
                    ->get()
            ],
            '1.1.7' => [
                'title' => '1.1.7',
                'description'=> '3',
                'Tindakan'=> '23',
                'evidences' =>StandardEvidence::where('user_id', $userId)
                            ->where('type', 'Standard 1')
                            ->where('sub','like','1.1.7')
                            ->get(),
                'subtypes' => SubEviden::where('type', 'like', '1.1.7.%')
                    ->orderBy('type')
                    ->get()
            ]
        ];

        return view('user.Std-1.std_1_1', compact('tables'));
    }

    public function Aspek_2_1(){

        $userId = Auth::id();

        $tables = [
            '2.1.1' => [
                'title' => '2.1.1',
                'description'=> 'PGB menetapkan hala tuju sekolah secara terancang',
                'Tindakan'=> 'Menetapkan hala tju sekolah dengan membuat analisa, menentukan sasaran, mendokumentasikan dan menyebarluaskan hala tuju secara menyeluruh, jelas serta mengikut keperluan dan kesesuian sekolah',
                'evidences' => StandardEvidence::where('user_id', $userId)
                    ->where('type', 'Standard 2')
                    ->where('sub','like','2.1.1')
                    ->get(),
                'subtypes' => SubEviden::where('type', 'like', '2.1.1.%')
                    ->orderBy('type')
                    ->get()
            ],
            '2.1.2' => [
                'title' => '2.1.2',
                'description'=> '3',
                'Tindakan'=> '23',
                'evidences' =>StandardEvidence::where('user_id', $userId)
                            ->where('type', 'Standard 2')
                            ->where('sub','like','2.1.2')
                            ->get(),
                'subtypes' => SubEviden::where('type', 'like', '2.1.2.%')
                    ->orderBy('type')
                    ->get()
            ]
        ];

        return view('user.Std-2.std_2_1', compact('tables'));
    }

    public function view_Page_1_1()
    {
        $userId = Auth::id();
        
        $tables = [
            '1.1.1' => [
                'title' => '1.1.1',
                'description' => 'PGB mengetuai peyediaan Rancangan Pemajuan Sekolah secara terancang dan sistematik',
                'tindakan' => 'Menegetuai penyediaan perancangan strategik dengan menyediakan garis panduan/format perancangan strategik, merangka strategik sasaran',
                'data' => SubEviden::where('type', 'like', '1.1.1')
                    ->orderBy('type')
                    ->get()
                    ->map(function ($subtype) use ($userId) {
                        return [
                            'id' => $subtype->id,
                            'description' => $subtype->description,
                            'type' => $subtype->type,
                            'evidence' => StandardEvidence::where('user_id', $userId)
                                ->where('sub_id', $subtype->id)
                                ->where('type', 'Standard 1')
                                ->first()
                                ?->only(['id', 'link', 'status'])
                        ];
                    })
            ],
            '1.1.2' => [
                'title' => '1.1.2',
                'data' => SubEviden::where('type', 'like', '1.1.2.%')
                    ->orderBy('type')
                    ->get()
                    ->map(function ($subtype) use ($userId) {
                        return [
                            'id' => $subtype->id,
                            'description' => $subtype->description,
                            'type' => $subtype->type,
                            'evidence' => StandardEvidence::where('user_id', $userId)
                                ->where('sub_id', $subtype->id)
                                ->first()
                                ?->only(['id', 'link', 'status'])
                        ];
                    })
            ]
        ];
    
        return view('user.Std-1.aspek_1_1', compact('tables'));
    }
}
