@extends('layout/template')
@section('title','Jadwal Kelas')
@section('title-content','Jadwal Kelas')
@section('content','jadwal')

@section('container')
@if(session('deleted'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  {{ session('deleted') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Edit Status Jadwal Hari ini</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  
  <!-- /.card-header -->
  <div class="card-body">
  <table id="example2" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Hari</th>
        <th>Mata Kuliah</th>
        <th>Waktu</th>
        <th>Ruangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($jadwal as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->hari}}</td>
      <td>{{$item->matkul}}</td>
      <td>{{$item->waktu}}</td>
      <td>{{$item->ruang}}</td>
      <td>
        <form method="get" action="{{url('/edit/class/'.$item->id)}}">
        @csrf
            <div class="custom-control custom-control-inline">
            <button type="submit" class="btn btn-info btn-sm">
                <i class="fas fa-pencil-alt">
                </i>
                Update
            </button>
        </form>
        <form method="post" action="{{url('/delete/class/'.$item->id)}}">
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
      </tr>
    @endforeach
    </tbody>
  </table>
    {{ $jadwal->links('pagination::bootstrap-4') }}
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<script>
window.addEventListener("load", function(){
  $('.pagination').addClass('float-sm-right mt-2');
});
</script>
@endsection