<div>
    <br>
    @foreach($groupedKategori as $nama_kategori => $items)
    <div class="alert alert-repository-no" role="alert">
        <h4>{{ $nama_kategori }}</h4>
    </div>

    @foreach ($items as $item)
    <!-- Tampilan judul dengan nama kategori yang sama -->
    <div class="card border-0 m-2">
        <h5><a href="{{ route('detail.dosen', ['id_tugasakhir' => $item->id_tugasakhir]) }}"
                class="text-black text-decoration-none">{{ $item->judul }}</a></h5>
        <small class="text-muted">{{ $item->nama_penulis }} (Universitas Sumatera Utara, {{ $item->tahun_terbit
            }})</small>
        <p>{{ Illuminate\Support\Str::limit($item->abstrak, $limit = 250, $end = '...') }}</p>
    </div>
    <br>
    @endforeach
    @endforeach

</div>