<?php

namespace App\Livewire;

use App\Models\TugasAkhir;
use App\Models\Prodi;
use App\Models\Kategori;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class PTugasakhir extends Component
{
    use WithPagination;
    public $search;
    public $byTipe_ta;
    public $byKategori;
    public $byProdi;
    public $sortBy;

    public function mount(Request $request)
    {
        $this->search = $request->input('search');
        $this->render();
    }

    public function hasil_search()
    {
        $this->render();

    }

    public function hasil_kategori()
    {
        $this->render();

    }

    public function hasil_prodi()
    {
        $this->render();

    }

    public function hasil_sort()
    {
        $this->render();

    }
    public function render()
    {
        $tipe_ta_lists = DB::table('v_data_tugasakhir')->distinct()->get('tipe_ta');
            $prodis = Prodi::all();
            $kategoris = Kategori::all();

            $query = TugasAkhir::query();

            if ($this->search) {
                $query->where('judul', 'like', '%' . $this->search . '%');
            }

            if ($this->byTipe_ta) {
                $query->where('tipe_ta', $this->byTipe_ta);
            }

            if ($this->byKategori) {
                $query->where('kategori_id', $this->byKategori);
            }

            if ($this->byProdi) {
                $tugasAkhirIds = Kategori::where('prodi_id', $this->byProdi)->pluck('id_kategori')->toArray();
                $query->whereIn('kategori_id', $tugasAkhirIds);
            }

            if ($this->sortBy) {
                $query->orderBy('judul', $this->sortBy === 'asc' ? 'asc' : 'desc');
            }

            $results = $query->paginate(20);

            return view('livewire.p-tugasakhir', [
                'results' => $results,
                'tipe_ta_lists' => $tipe_ta_lists,
                'prodis' => $prodis,
                'kategoris' => $kategoris,
                'search' => $this->search
            ]);
    }
}
