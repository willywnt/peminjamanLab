@extends('layout/template')
@section('title','Jadwal LAB')
@section('title-content','Jadwal LAB 303')
@section('content','LAB 303')

@section('container')
@if(session('success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  {{ session('success') }}
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
        <th>Hari</th>
        <th>Waktu</th>
        <th>Mata Kuliah</th>
        <th>Dosen</th>
        <th>Status</th>
        <th>Aksi</th>
        <th>Update</th>
      </tr>
    </thead>
  <tbody>
    @foreach($edit as $today)
    <form method="post" action="{{url('/update_status')}}">
    @csrf
    <input type="hidden" name="id_jadwal" id="id_jadwal" value="{{$today->id}}"/>
    <input type="hidden" name="lab" id="lab" value="LAB 303"/>
    <tr>
      <td>{{$today->hari}}</td>
      <td>{{$today->waktu}}</td>
      <td>{{$today->matkul}}</td>
      <td>{{$today->dosen}}</td>
      <td>
      <select class="custom-select" id="status" name="status">
      @foreach($status as $stat)
        <option value="{{$stat->id}}" {{$stat->id == $today->status_id ? 'selected' : ''}}>{{$stat->status}}</option>
      @endforeach
      </select>
      </td>
      <td><button type="submit" class="btn btn-success">Save</button>
      </td>
      <td>@isset($today->updated_at)
        {{$today->updated_at->diffForHumans()}}
        @endisset
        </td>
    </tr>
    </form>
    @endforeach
    </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- Default box -->
<div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Table Data LAB 303</h3>
          <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
        </div>
        <div class="card-body">
        <a href="{{url('/jadwal/view/303?page='.$days)}}">
          <button type="button" class="btn btn-primary mb-3">Jadwal Hari Ini</button>
        </a>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Hari</th>
              <th>Waktu</th>
              <th>Mata Kuliah</th>
              <th>Dosen</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jadwal as $list)
            <tr>
              <td>{{$list->id}}</td>
              <td>{{$list->hari}}</td>
              <td>{{$list->waktu}}</td>
              <td>{{$list->matkul}}</td>
              <td>{{$list->dosen}}</td>
              <td>{{$list->status->status}}</td>
              <td>
                <form method="get" action="{{url('/edit/'.$list->id)}}">
                @csrf
                <input type="hidden" name="lab" id="lab" value="LAB 303"/>
                  <div class="custom-control custom-control-inline">
                    <button type="submit" class="btn btn-info btn-sm">
                      <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </button>
                </form>
                <form method="post" action="{{url('/delete/'.$list->id)}}">
                @csrf
                {{@method_field('delete')}}
                  <input type="hidden" name="lab" id="lab" value="LAB 303"/>
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