@extends('templates.admin')
@section('title')
    Histroy Transaksi
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pembeli</th>
                            <th>Nama Pembeli</th>
                            <th>Nomor Pembeli</th>
                            <th>Alamat</th>
                            <th>Product</th>
                            <th>Jumlah Beli</th>
                            <th>Total Bayar</th>
                            <th>Gambar</th>
                            <th>Bukti Transfer</th>
                            <th>diselesaikan oleh</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$transaction->customer->Customer_ID}}</td>
                                <td>{{$transaction->customer->nama_customer}}</td>
                                <td>{{$transaction->customer->no_pembeli}}</td>
                                <td>{{$transaction->customer->alamat}}</td>
                                <td>{{$transaction->product->name}}</td>
                                <td>{{$transaction->jumlah_beli}}</td>
                                <td>{{$transaction->total_bayar}}</td>
                                <td>
                                    @if($transaction->product->photo)
                                        <img src="{{ asset('storage/' . $transaction->product->photo) }}" alt="Foto Produk" width="50" height="50">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    @if($transaction->bukti_transfer)
                                        <a href="{{ asset('storage/' . $transaction->bukti_transfer) }}" download="bukti_{{ $transaction->nama_pembeli }}_{{$transaction->no_pembeli}}_{{ $transaction->created_at->format('Ymd') }}.jpg"
                                        >Download Bukti Transfer</a>
                                    @else
                                        Tidak ada bukti transfer
                                    @endif
                                </td>
                                <td>{{$transaction->updatedBy->name}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!-- end row -->

    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });

    </script>



@endsection
