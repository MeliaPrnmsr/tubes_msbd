<?php

namespace App\Livewire;

use App\Models\TugasAkhir;
use App\Models\Prodi;
use App\Models\Kategori;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TugasAkhirs extends Component
{
    public $search; 
    public $kategori;
    public $prodi;

    public function hasil_search()
    {
        
    }

    public function hasil_kategori($kategori_search)
    {
        $filters = DB::table('v_data_tugasakhir')->query()
            ->when($this->search, function ($query) {
                $query->where('judul', 'like', '%' . $this->search . '%');
            })
            ->when($this->kategori, function ($query) {
                $query->whereHas('kategori', function ($q) {
                    $q->where('id_kategori', $this->kategori);
                });
            })
            ->when($this->prodi, function ($query) {
                $query->whereHas('kategori.prodi', function ($q) {
                    $q->where('id_prodi', $this->prodi);
                });
            })
            ->get();

    }

    public function render(Request $request)
    {
    
        $tipe_ta_lists = TugasAkhir::distinct()->get('tipe_ta');
        $prodis = Prodi::all();
        $kategoris = Kategori::all();
        $this->search = $request->input('search', '');

        $search = '%' . $this->search . '%';
        $results = DB::table('v_data_tugasakhir')->where('judul', 'like', $search)->get();

        $kategori = '%' . $this->kategori . '%';
        $filters = DB::table('v_data_tugasakhir')->where('judul', 'like', $kategori)->get();
    
        return view('livewire.tugas-akhirs', [
            'results' => $results,
            'tipe_ta_lists' => $tipe_ta_lists,
            'prodis' => $prodis,
            'kategoris' => $kategoris,
            'filters'   => $filters
        ]);

            
    }
}
