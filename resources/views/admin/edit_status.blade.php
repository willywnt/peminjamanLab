@extends('layout/template')
@section('title','Edit Pengajuan')
@section('title-content','Edit Pengajuan')
@section('content','Edit')

@section('container')
@if(session('success'))
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
</div>
@endif

<!-- Main content -->
<section class="content">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Jadwal</h3>
            </div>
            @foreach($data as $item)
            <form method="post" action="{{url('/save_pengajuan/'.$item->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" class="form-control" name="ruangan" id="ruangan" value="{{$item->ruangan}}">
                    </div>
                    <div class="form-group">
                        <label for="komputer">Komputer</label>
                        <input type="text" class="form-control" name="komputer" id="komputer" value="{{$item->id_komputer}}">
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" class="form-control" name="hari" id="hari" value="{{$item->hari}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal" value="{{$item->tanggal}}">
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <input type="text" class="form-control" name="jam" id="jam" value="{{$item->jam}}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="custom-select" id="status_peminjaman" name="status_peminjaman">
                        @foreach($status as $stat)
                        <option value="{{$stat->id}}" {{$stat->id == $item->status_id ? 'selected' : ''}}>{{$stat->status}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              @endforeach
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection