@extends('admin.adminlayout')

@section('content')
<br>
<h3 class="text-center"><b>Daftar Kategori</b></h3>

<div class="row row-cols-2 card-body justify-content-center">
    @foreach($query as $data)
        <div class="card col mx-2 my-2" style="width: 45%">
            <div class="card-body">
                <h5 class="card-header"><b>{{ $data->jenjang }} {{ $data->nama_prodi }}</b></h5>
                <ul class="list-group list-group-flush">
                    @foreach ($collection as $item)
                    @if ($item-> nama_prodi == $data->nama_prodi)
                    <li class="list-group-item">{{ $item -> nama_kategori }}</li>
                    @endif
                    @endforeach
                   
                </ul>
            </div>
        </div>
    @endforeach
</div>

@endsection