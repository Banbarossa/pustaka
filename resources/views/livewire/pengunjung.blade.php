<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('kunjungan.index')}}">Kunjungan</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-8">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0">Members Profiles</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    {{-- <th class="border-top-0" style="width:60px;">Member</th> --}}
                                    <th class="border-top-0">Tanggal</th>
                                    <th class="border-top-0">Waktu</th>
                                    <th class="border-top-0">Nama Pengunjung</th>
                                    <th class="border-top-0">Tujuan</th>
    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                                        <td>{{$item->waktu}}</td>
                                        <td>{{$item->anggota ? $item->anggota->name:'Anggota Non Aktif'}}</td>
                                        <td>{{$item->tujuan}}</td>
                                    </tr>
                                    
                                @endforeach
                                    
    
    
                            </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-4">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mt-0 mb-4">Tambah Kunjungan</h5>
    
               
                        <div class="input-group mt-2">
                            <input type="search" class="form-control" wire:model="search" placeholder="Search for..." aria-label="Search for..." autofocus>
                            @if ($search)
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button" wire:click="clear">Reset</button>
                            </span>
                                
                            @endif
                        </div>

                    
                    <div class="mt-4">
                        <div class="d-flex gap-2 align-items-center">
                            <h5 class="mr-3">{{$search?'Hasil Pecarian':'Pengunjung Terbaru'}}</h5>
                            <div class="spinner-border spinner-border-sm text-primary" wire:loading wire:target='getAnggota' role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </div>
                        @forelse ($latest as $item)
                            @if ($search)
                                <button type="button" wire:click="getAnggota({{ $item->id }})" class="btn {{$idAnggota == $item->id ? 'btn-primary':'btn-outline-primary'}} rounded-pill me-3 mb-3">
                                    {{$item->name}}
                                </button>
                            @else
                            @if ($item->anggota)
                                <button type="button" wire:click="getAnggota({{ $item->anggota->id }})" class="btn {{$idAnggota == $item->anggota->id ? 'btn-primary':'btn-outline-primary'}} rounded-pill mr-3 mb-3">
                                    {{$item->anggota->name}}
                                </button>
                                
                            @endif
                            @endif
                            
                        @empty
                            <h6 class="text-warning">😒 Tidak ditemukan!</h6>
                        @endforelse
                    </div>
                    

                    <div class="mt-4">
                        <div class="d-flex gap-2 align-items-center">
                            <h5 class="mr-3">Tujuan</h5>
                            <div class="spinner-border spinner-border-sm text-primary" wire:loading wire:target='test' role="status">
                                <span class="visually-hidden"></span>
                            </div>

                        </div>
                            @foreach ($tujuan as $item)
                            <button type="button" wire:click="test({{$item->id}})" class="btn {{$selectedTujuan == $item->id ? 'btn-primary':'btn-outline-primary'}} rounded-pill mr-3 mb-3">{{$item->tujuan}}</button>
                                
                            @endforeach
                            <button type="button" wire:click='showModal' class="btn btn-success rounded-pill mr-3 mb-3">{{$modalVisible ? '-':'+'}}</button>
                    </div>




                    @if ($idAnggota)
                        <div class="mt-4">
                            <div class="d-grid">

                                <button type="button" class="btn btn-block btn-success rounded-pill" wire:click='store'>
                                    <div class="spinner-border spinner-border-sm text-white mr-3" wire:loading wire:target='store' role="status">
                                        <span class="visually-hidden"></span>
                                    </div>
                                    Submit
                                </button>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            @if ($modalVisible==true)
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mt-0 mb-4">Kelola Tujuan</h5>
    
               
                        <div class="input-group mt-2">
                            <input type="tujuan" class="form-control @error('tambahTujuan') is-invalid @enderror" wire:model="tambahTujuan" placeholder="Tujuan">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button" wire:click="storeTujuan">Submit</button>
                            </span>
                            @error('tambahTujuan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                                
                            @enderror
                        </div>
                        <hr>
                        <div class="mt-4">
                            @foreach ($tujuan as $item)
                            <button type="button" wire:click="destroyTujuan({{$item->id}})" class="btn btn-outline-danger rounded-pill mr-3 mb-3"><span class="mr-2"><i class="ion-trash-a"></i></span>{{$item->tujuan}}</button>
                                
                            @endforeach
                        </div>


                </div>
            </div>
            @endif
            
        </div>
    </div>

    @push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    <x-livewire-alert::scripts />

    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
    <x-livewire-alert::flash />
        
    @endpush


</div>