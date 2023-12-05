<?php

namespace App\Livewire;

use App\Models\TugasAkhir;
use Livewire\Component;
use Illuminate\Http\Request;

class TugasAkhirs extends Component
{
    public $search;

    public $queryString = [
        'tugas_akhirs' => ['except' => ''],
    ];
    public function render( Request $request)
    {
            $results = TugasAkhir::query();
            
            $searchTerm = $request->input('search');
            $kategoriFilter = $request->input('kategori');
            $prodiFilter = $request->input('prodi');
    
            if (!empty($searchTerm)) {
                $results->where('judul', 'like', '%' . $searchTerm . '%');
            }
    
            if ($kategoriFilter) {
                $results->whereHas('kategori', function ($q) use ($kategoriFilter) {
                    $q->where('id_kategori', $kategoriFilter);
                });
            }
    
            if ($prodiFilter) {
                $results->whereHas('kategori.prodi', function ($q) use ($prodiFilter) {
                    $q->where('id_prodi', $prodiFilter);
                });
            }
    
            $results = $results->get(); 
        
            return view('livewire.tugas-akhirs', [
                'tugasAkhirs' => $results,
            ]);
            
    }
}
