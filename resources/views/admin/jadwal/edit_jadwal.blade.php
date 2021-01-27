@extends('layout/template')
@section('title','Jadwal LAB')
@section('title-content','Edit Jadwal')
@section('content','LAB 301')

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
            @foreach($edit as $jadwal)
            <form method="post" action="{{url('/update/'.$jadwal->id)}}">
            @csrf
            <input type="hidden" name="ruangan" id="ruangan" value="{{$ruangan}}"/>
            <div class="card-body">
                  <div class="form-group">
                    <label for="hari">Hari</label>
                    <input type="text" class="form-control" name="hari" id="hari" value="{{$jadwal->hari}}">
                  </div>
                  <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="text" class="form-control" name="waktu" id="waktu" value="{{$jadwal->waktu}}">
                  </div>
                  <div class="form-group">
                    <label for="matkul">Matkul</label>
                    <input type="text" class="form-control" name="matkul" id="matkul" value="{{$jadwal->matkul}}">
                  </div>
                  <div class="form-group">
                    <label for="dosen">Dosen</label>
                    <input type="text" class="form-control" name="dosen" id="dosen" value="{{$jadwal->dosen}}">
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