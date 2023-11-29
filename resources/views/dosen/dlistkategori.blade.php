<div>
    <br>
    <div class="alert alert-repository-no" role="alert">
        <small><i class="fa-solid fa-circle-info"></i> menampilkan <b>xx</b> tugas akhir </small>
    </div>
    @foreach ($kategori as $item)
    <div class="card border-0 m-2">
        <h5><a href="{{route('detail.dosen', ['id_tugasakhir' => $item  ->id_tugasakhir])}}" class="text-black text-decoration-none" >{{$item->judul}}</a></h5>
        <small class="text-muted">{{$item->nama_penulis}} (Universitas Sumatera Utara, {{$item->tahun_terbit}})</small>
        <p>{{ Illuminate\Support\Str::limit($item->abstrak, $limit = 250, $end = '...') }}</p>

    </div>
    <br>
    @endforeach
    {{-- pagination start --}}
    <nav aria-label="pagination">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous" style="color: #3dae2b">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#"  style="color: #3dae2b">1</a></li>
            <li class="page-item"><a class="page-link" href="#"  style="color: #3dae2b">2</a></li>
            <li class="page-item"><a class="page-link" href="#"  style="color: #3dae2b">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next"  style="color: #3dae2b">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
        </nav>
    {{-- pagination end --}}
</div>