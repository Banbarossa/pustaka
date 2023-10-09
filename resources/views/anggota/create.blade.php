@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Anggota</a></li>
                        <li class="breadcrumb-item"><a href="{{route('anggota.create')}}">Tambah Anggota</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Tambah Anggota</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 mb-4 header-title">Daftar Anggota Perpustakaan</h4>
                    <div class="row">
                        <div class="col-lg-7">
                            <form action="{{$data['route']}}" method="post">
                                @csrf
                                @if ($data['method']=='put')
                                    @method('put')
                                @endif

                                <div class="form-group">
                                    <label>Nama anggota</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required placeholder="Nama Anggota" value="{{old('name') ?? $data['model']->name}}"/>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" required placeholder="NISN" value="{{old('nisn') ?? $data['model']->nisn}}"/>
                                    @error('nisn')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="pob" class="form-control @error('pob') is-invalid @enderror" placeholder="Tempat Lahir" value="{{old('pob') ?? $data['model']->pob}}"/>
                                    @error('pob')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanngal Lahir</label>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" placeholder="Tempat Lahir" value="{{old('dob') ?? $data['model']->dob}}"/>
                                    @error('dob')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group {{$data['method']=='put' ? 'd-none':''}}">
                                    <label>Jenis Keanggotaan</label>
                                    <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" required placeholder="Tempat Lahir" value="{{Request::is('anggota/create')?'Santri':'Pegawai'}}" readonly/>
                                </div>
                                
                                
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                
        
                               
                            </form>
                        </div>
                    </div>
                    

                    

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- end container -->



@endsection
