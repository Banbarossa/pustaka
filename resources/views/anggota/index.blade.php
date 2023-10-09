@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{Request::url()}}">{{ucFirst(Request::path())}}</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Data Anggota</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h4 class="mt-0 header-title">Daftar Anggota Perpustakaan</h4>
                        <div class="d-flex">
                            <div class="dropdown mo-mb-2 mr-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Unduh
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('anggota.export.excel')}}">Excel</a>
                                    <a class="dropdown-item" href="{{route('anggota.export.pdf',['role'=>'Santri'])}}" target="blank">Pdf</a>
                                    <a class="dropdown-item" href="{{route('card.index',['role'=>'Santri'])}}" target="blank">Kartu</a>
                                </div>
                            </div>
                            <a href="{{$routeCreate}}" class="btn btn-primary">Tambah Anggota</a>
                            <div class="swal" data-swal="{{session('success')}}"></div>
                        </div>
                    </div>

                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>No Anggota</th>
                                <th>Tanggal Lahir</th>
                                <th>Action</th>

                            </tr>
                        </thead>


                        
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- end container -->

@push('style')
<link href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    
@endpush

@push('script')
    <script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script>
        const alert =$('.swal').data('swal')

        if(alert){
            swal({
                title: 'Success',
                text: alert,
                timer: 3000
            })
            .then(
                function () {
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                        console.log('I was closed by the timer')
                    }
                }
            )
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable({

                responsive: true,
                processing:true,
                serverSide:true,
                ajax:"{{route('anggota.index')}}",
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable:false, sortable:false},
                    {
                        data:'name',
                        name:'name',
                        render: function(data) {
                            return data.charAt(0).toUpperCase() + data.slice(1);
                        }
                    },
                    {data:'nisn',name:'nisn'},
                    {data:'dob',name:'dob'},
                    {data:'action',name:'action',orderable:false, sortable:false}
                    
                    
                ]
            });
        })

    </script>


@endpush

@endsection
