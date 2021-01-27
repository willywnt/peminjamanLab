@extends('layout/template')
@section('title','Daftar Pengajuan')
@section('title-content','Daftar Pengajuan')
@section('content','daftar pengajuan')

@section('container')
@if(session('success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if($menunggu != 0)
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Status Menunggu</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  
  <!-- /.card-header -->
  <div class="card-body">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>NRP/NIP</th>
        <th>Nama</th>
        <th>Ruangan</th>
        <th>Komputer</th>
        <th>Hari</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Keperluan</th>
        <th>Status</th>
        <th>Aksi</th>
        <th>Update</th>
      </tr>
    </thead>
  <tbody>
    @foreach($pengajuan as $item)
    @if($item->status_id == 1)
    <form method="post" action="{{url('/update_pengajuan/'.$item->id)}}">
    @csrf
    <input type="hidden" id="kode" name="kode" value="{{$item->id_komputer}}">
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->user->username}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->ruangan}}</td>
        <td>{{$item->id_komputer}}</td>
        <td>{{$item->hari}}</td>
        <td>{{$item->tanggal}}</td>
        <td>{{$item->jam}}</td>
        <td>{{$item->keperluan}}</td>
        <td>
        <select class="custom-select" id="status_peminjaman" name="status_peminjaman">
        @foreach($status as $stat)
        <option value="{{$stat->id}}" {{$stat->id == $item->status_id ? 'selected' : ''}}>{{$stat->status}}</option>
        @endforeach
        </td>
        <td><button type="submit" class="btn btn-success">Save</button>
      </td>
      <td>@isset($item->updated_at)
        {{$item->updated_at->diffForHumans()}}
        @endisset
        </td>
    </tr>
    </form>
    @endif
    @endforeach
    </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endif

@if($diterima != 0)
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Status Berlangsung</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  
  <!-- /.card-header -->
  <div class="card-body">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>NRP/NIP</th>
        <th>Nama</th>
        <th>Ruangan</th>
        <th>Komputer</th>
        <th>Hari</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Keperluan</th>
        <th>Aksi</th>
        <th>Update</th>
      </tr>
    </thead>
  <tbody>
    @foreach($pengajuan as $item)
    @if($item->status_id == 2)
    <form method="post" action="{{url('/selesaikan/'.$item->id)}}">
    @csrf
    <input type="hidden" id="kode" name="kode" value="{{$item->id_komputer}}">
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->user->username}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->ruangan}}</td>
        <td>{{$item->id_komputer}}</td>
        <td>{{$item->hari}}</td>
        <td>{{$item->tanggal}}</td>
        <td>{{$item->jam}}</td>
        <td>{{$item->keperluan}}</td>
        <td><button type="submit" class="btn btn-primary">Selesaikan</button>
      </td>
      <td>@isset($item->updated_at)
        {{$item->updated_at->diffForHumans()}}
        @endisset
        </td>
    </tr>
    </form>
    @endif
    @endforeach
    </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endif

@if($selesai != 0)
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Status Selesai</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  
  <!-- /.card-header -->
  <div class="card-body">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>NRP/NIP</th>
        <th>Nama</th>
        <th>Ruangan</th>
        <th>Komputer</th>
        <th>Hari</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Keperluan</th>
        <th>Aksi</th>
        <th>Update</th>
      </tr>
    </thead>
  <tbody>
    @foreach($pengajuan as $item)
    @if($item->status_id == 3)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->user->username}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->ruangan}}</td>
        <td>{{$item->id_komputer}}</td>
        <td>{{$item->hari}}</td>
        <td>{{$item->tanggal}}</td>
        <td>{{$item->jam}}</td>
        <td>{{$item->keperluan}}</td>
        <td>
        <form method="get" action="{{url('/edit_pengajuan/'.$item->id)}}">
        @csrf
        <div class="custom-control custom-control-inline">
          <button type="submit" class="btn btn-info btn-sm">
            <i class="fas fa-pencil-alt">
              </i>
              Edit
          </button>
        </form>
        <form method="post" action="{{url('/pengajuan/delete/'.$item->id)}}">
        @csrf
        {{@method_field('delete')}}
        <button class="btn btn-danger btn-sm ml-1">
            <i class="fas fa-trash">
            </i>
            Delete
        </button>
        </form>
        </div>
      </td>
      <td>@isset($item->updated_at)
        {{$item->updated_at->diffForHumans()}}
        @endisset
        </td>
    </tr>
    @endif
    @endforeach
    </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endif

@if($ditolak != 0)
<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title">Status Batal</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  
  <!-- /.card-header -->
  <div class="card-body">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>NRP/NIP</th>
        <th>Nama</th>
        <th>Ruangan</th>
        <th>Komputer</th>
        <th>Hari</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Keperluan</th>
        <th>Aksi</th>
        <th>Update</th>
      </tr>
    </thead>
  <tbody>
    @foreach($pengajuan as $item)
    @if($item->status_id == 4)
    <form method="get" action="{{url('/edit_pengajuan/'.$item->id)}}">
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->user->username}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->ruangan}}</td>
        <td>{{$item->id_komputer}}</td>
        <td>{{$item->hari}}</td>
        <td>{{$item->tanggal}}</td>
        <td>{{$item->jam}}</td>
        <td>{{$item->keperluan}}</td>
        <td>
        <form method="get" action="{{url('/edit_pengajuan/'.$item->id)}}">
        @csrf
        <div class="custom-control custom-control-inline">
          <button type="submit" class="btn btn-info btn-sm">
            <i class="fas fa-pencil-alt">
              </i>
              Edit
          </button>
        </form>
        <form method="post" action="{{url('/pengajuan/delete/'.$item->id)}}">
        @csrf
        {{@method_field('delete')}}
        <button class="btn btn-danger btn-sm ml-1">
            <i class="fas fa-trash">
            </i>
            Delete
        </button>
        </form>
        </div>
      </td>
      <td>@isset($item->updated_at)
        {{$item->updated_at->diffForHumans()}}
        @endisset
        </td>
    </tr>
    @endif
    @endforeach
    </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endif
@endsection