<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('kunjungan.daftar')}}">Daftar Kunjungan</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Daftar Kunjungan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-8 align-self-center">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="header-title mb-4 mt-0">Daftar Kunjungan</h5>
                        <div class="row d-flex align-items-end gap-3">
                            <div class="col">
                                <a href="{{route('kunjungan.unduh',['startDate' => $startDate, 'endDate' => $endDate])}}" class="btn btn-outline-secondary">Unduh Pdf</a>
                            </div>
                            <div class="col">
                                <label for="start-date" class="form-label">Mulai</label>
                                <input type="date" wire:model='startDate' id="start-date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="start-date" class="form-label">Akhir</label>
                                <input type="date" wire:model='endDate' id="end-date" class="form-control">
                            </div>
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
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
                                        <td>{{$item->anggota ? $item->anggota->name:'Anggota sudah dihapus'}}</td>
                                        <td>{{$item->tujuan}}</td>
                                    </tr>
                                    
                                @endforeach
                                    
    
    
                            </tbody>
                        </table>
                        {{$data->links()}}
    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-4">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="header-title mb-4 mt-0">Rating</h5>
                        
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    
                                    <th class="border-top-0">Nama</th>
                                    <th class="border-top-0">Rating</th>
                                    <th class="border-top-0">Jumlah</th>
 
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($rating as $item)
                                    <tr>
                                        <td>{{$item->anggota ? $item->anggota->name :'Anggota sudah dihapus'}}</td>
                                        <td>
                                            @php
                                            $totalKunjunganTerbanyak = $terbanyak->total_kunjungan;
                                            $persentase = ($item->total_kunjungan / $totalKunjunganTerbanyak) * 100;
                                            @endphp
                        
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $persentase / 20)
                                                    <i class="mdi mdi-star text-warning"></i>
                                                @else
                                                    <i class="mdi mdi-star-outline text-warning"></i>
                                                @endif
                                            @endfor
                                        </td>
                                        <td> {{ $item->total_kunjungan }}</td>
                                    </tr>
                                    
                                @endforeach
                                    
    
    
                            </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        
    @endpush
    @push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    <x-livewire-alert::scripts />

    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
    <x-livewire-alert::flash />
        
    @endpush

</div>