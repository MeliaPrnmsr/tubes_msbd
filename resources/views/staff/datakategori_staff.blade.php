@extends('staff.stafflayout')
@php
    $active = 'datakategori';
    $prodiStaff = auth()->user()->staff->prodi_id;
    $prodi = App\Models\Prodi::where('id_prodi', $prodiStaff)->first();
    $jenjang = $prodi->jenjang ?? '';
    $namaJurusan = $prodi->nama_prodi ?? '';
@endphp
@section('content')
<br>
<h3 class="text-center"><b>Daftar Kategori</b></h3>  
  <div class="row row-cols-2 card-body">
    <div class="card col mx-2 my-2" style="width: 45%">
      <div class="card-body">
        <h5 class="card-header"><b>{{ $jenjang }} {{ $namaJurusan }}</b></h5>
        <ul class="list-group list-group-flush">
          @foreach ($kategoris as $kategori)
          <li class="list-group-item">{{$kategori->nama_kategori}}</li>
          @endforeach
        </ul>         
      </div>
    </div>
</div>
@endsection
