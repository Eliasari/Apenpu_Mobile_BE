@extends('templates.admin')
@section('title')
    Product
@endsection

@section('action')
    <a href="{{route('product.create')}}" class="btn btn-primary"  >
        <i class="mdi mdi-plus"></i> Tambah
    </a>
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
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($product->photo)
                                        <img src="{{ asset('storage/' . $product->photo) }}" alt="Foto Produk" width="50" height="50">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteProduct({{ $product->id }})">Hapus</button>
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

        function deleteProduct(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#47bd9a",
                cancelButtonColor: "#e74c5e",
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
               if (result.value) {
                    console.log('asa');
                    // Jika pengguna mengkonfirmasi, kirim form untuk menghapus
                    document.getElementById('delete-form-' + productId).submit();
                }
            });
        }
    </script>



@endsection
