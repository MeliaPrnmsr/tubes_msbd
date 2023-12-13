<div>
    <br>
    <div class="alert alert-repository-no" role="alert">
        <small><i class="fa-solid fa-circle-info"></i> menampilkan <b>{{$disertasi->count()}}</b> tugas akhir </small>
    </div>
    @foreach ($disertasi as $item)
    <div class="card border-0 m-2">
        <h5><a href="{{route('detail.mahasiswa', ['id_tugasakhir' => $item->id_tugasakhir])}}" class="text-black text-decoration-none" >{{$item->judul}}</a></h5>
        <small class="text-muted">{{$item->nama_penulis}} (Universitas Sumatera Utara, {{$item->tahun_terbit}})</small>
        <p>{{ Illuminate\Support\Str::limit($item->abstrak, $limit = 250, $end = '...') }}</p>

    </div>
    <br>
    @endforeach
</div>