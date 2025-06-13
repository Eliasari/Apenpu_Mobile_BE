@extends('templates.admin')
@section('title')
    Chat
@endsection

@section('content')

    <h4>Daftar Pengguna</h4>
    <ul class="list-group">
        @foreach ($customers as $customer)
            <li class="list-group-item">
                <a href="{{ route('chat.show', $customer->Customer_ID) }}">
                    <span class="badge bg-success">●</span> {{ $customer->nama_customer }}
                </a>
            </li>
        @endforeach
    </ul>

@endsection
