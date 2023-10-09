<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-8">
            <div class="card m-b-30">
                <div class="card-body graph">
                    {!! $chart->container() !!} 
                </div>
            </div>
        </div>
        
        <div class="col-md-12 col-lg-12 col-xl-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Latest Visitor</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                @forelse ($data as $item )
                                <tr>
                                    <td>{{$item->anggota ? $item->anggota->name :'Anggota Non Aktif'}}</td>
                                </tr>
                                @empty
                                    <h5>👌No Data Found</h5>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-8">
            <div class="card bg-white m-b-30">
                <div class="card-body new-user">
                    <h5 class="header-title mb-4 mt-0">10 Top Rating</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Jumlah Kunjungan</th>
                                    <th class="border-top-0">Persentase</th>
                                    <th class="border-top-0">Rating</th>                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rating as $item)
                                <tr>
                                    <td>{{$item->anggota ? $item->anggota->name :'Anggota Non Aktif'}}</td>
                                    <td>{{$item->total_kunjungan}}</td>
                                    <td>{{ number_format(($item->total_kunjungan / $terbanyak->total_kunjungan) * 100, 2) }}%</td>
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
                                       
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4"><h5>👌No Data Found</h5></td>
                                </tr>
                                
                                @endforelse

                                
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-4">
            <div class="card bg-info m-b-30">
                <div class="card-body">
                    <div id="verticalCarousel" class="carousel slide vertical" data-ride="carousel">
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row d-flex justify-content-center text-center">
                                    <div class="col-sm-12 carousel-icon">
                                        <i class="ion-android-friends text-white pt-3"></i>
                                        {{-- <i class="fa fa-twitter text-white pt-3"></i> --}}
                                    </div>
                                    <div class="col-6 text-white">                                                                
                                        <h2>{{$anggota}}</h2>
                                        <p class="">Anggota</p>                                                                
                                    </div>
                                    <div class="col-6 text-white">                                                                
                                        <h2>{{$kunjungan}}</h2>
                                        <p class="">Kunjungan</p>                                                               
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ $chart->cdn() }}"></script>

        {{ $chart->script() }}


        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
        <x-livewire-alert::scripts />
    
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
        <x-livewire-alert::flash />
            
        
    @endpush

</div> 