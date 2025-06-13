@extends('templates.admin')
@section('title')
    Order
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
                            <th>Gambar</th>
                            <th>Jumlah Beli</th>
                            <th>Total Bayar</th>
                            <th>Bukti Transfer</th>
                            <th>Aksi</th>
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
                                <td>
                                    @if($transaction->product->photo)
                                        <img src="{{ asset('storage/' . $transaction->product->photo) }}" alt="Foto Produk" width="50" height="50">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>{{$transaction->jumlah_beli}}</td>
                                <td>{{$transaction->total_bayar}}</td>
                                <td>
                                    @if($transaction->bukti_transfer)
                                        <a href="{{ asset('storage/' . $transaction->bukti_transfer) }}" download="bukti_{{ $transaction->nama_pembeli }}_{{$transaction->no_pembeli}}_{{ $transaction->created_at->format('Ymd') }}.jpg"
                                        >Download Bukti Transfer</a>
                                    @else
                                        Tidak ada bukti transfer
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('order.complete', $transaction->id) }}" method="POST" style="display: inline;" id="complete-form-{{ $transaction->id }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" class="btn btn-success btn-sm" onclick="completeTransaction({{ $transaction->id }})">Selesaikan</button>
                                    </form>
                                </td>
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

        function completeTransaction(transactionId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Transaksi akan ditandai sebagai selesai!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#47bd9a",
                cancelButtonColor: "#e74c5e",
                confirmButtonText: 'Ya, selesaikan!',
                cancelButtonText: 'Batal'
            }).then(function (result) {
                if (result.value) {
                    // Jika pengguna mengkonfirmasi, kirim form untuk menyelesaikan transaksi
                    document.getElementById('complete-form-' + transactionId).submit();
                }
            });
        }
    </script>



@endsection
