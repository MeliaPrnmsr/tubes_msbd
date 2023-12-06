<?php

namespace App\Livewire;

use App\Models\TugasAkhir;
use App\Models\Prodi;
use App\Models\Kategori;

use Livewire\Component;
use Illuminate\Http\Request;

class TugasAkhirs extends Component
{
    public $search;
    // public $kategori;
    // public $prodi;



    public function render()
    {
    
        $tipe_ta_lists = TugasAkhir::distinct()->get('tipe_ta');
        $prodis = Prodi::all();
        $kategoris = Kategori::all();


        // $results = TugasAkhir::query()
        //     ->when($this->search, function ($query) {
        //         $query->where('judul', 'like', '%' . $this->search . '%');
        //     })
        //     ->when($this->kategori, function ($query) {
        //         $query->whereHas('kategori', function ($q) {
        //             $q->where('id_kategori', $this->kategori);
        //         });
        //     })
        //     ->when($this->prodi, function ($query) {
        //         $query->whereHas('kategori.prodi', function ($q) {
        //             $q->where('id_prodi', $this->prodi);
        //         });
        //     })
        //     ->get();

        $search = '%' . $this->search . '%';
        $results = TugasAkhir::where('judul', 'like', $search)->get();
    
        return view('livewire.tugas-akhirs', [
            'results' => $results,
            'tipe_ta_lists' => $tipe_ta_lists,
            'prodis' => $prodis,
            'kategoris' => $kategoris
        ]);

        // return view('livewire.tugas-akhirs', [
        //     'results' => $results,
        //     'tipe_ta_lists' => $tipe_ta_lists,
        //     'prodis' => $prodis,
        //     'kategoris' => $kategoris
        // ]);
            
    }
}
