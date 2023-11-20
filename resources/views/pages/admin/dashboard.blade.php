@extends('layouts.admin')

@section('title', 'Dashboard')
@section('count_buku', $totalBuku)
@section('count_user', $totalUsers)

<style>
    .hero{
        height: 30vh;
        background-image: url('https://img.freepik.com/premium-photo/3d-illustration-black-thick-books-isolated-black-background_351397-674.jpg?size=626&ext=jpg&uid=R56490936&ga=GA1.2.1149922704.1691593168&semt=ais');
    }
</style>


@section('total_user')
    @csrf
    <a href="{{url('daftar-user')}}" class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
                <div class="text-center">
                    <p class="text-3xl">
                        {{ $totalUsers }}
                    </p>
                    <h5 class=" mb-2 text-xl font-bold tracking-tight ">Total User</h5>
                </div>
                
        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-users text-2xl"></i>
        </div>
    </a>
@endsection

@section('total_buku')
    @csrf
    <a href="{{url('daftar-buku')}}" class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
                <div class="text-center">
                    <p class="text-3xl">{{ $totalBuku }}</p>
                    <h5 class=" mb-2 text-xl font-bold tracking-tight ">Total Buku</h5>
                </div>
                
        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-book text-2xl"></i>
        </div>
    </a>
@endsection

@section('rent_log_online')
    @csrf
    <a href="#" class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
                <div class="text-center">
                    <p class="text-3xl">20</p>
                    <h5 class=" mb-2 text-xl font-bold tracking-tight ">Rent Log Online</h5>
                </div>
                
        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-clipboard text-3xl"></i>
        </div>
    </a>
@endsection

@section('rent_log_offline')
    @csrf
    <a href="#" class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
                <div class="text-center">
                    <p class="text-3xl">15</p>
                    <h5 class=" mb-2 text-xl font-bold tracking-tight ">Rent Log Offline</h5>
                </div>
                
        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-clipboard text-3xl"></i>
        </div>
    </a>
@endsection



@section('dPelanggaran')
<div class="mt-4 relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Telepon
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Tanggal Peminjaman
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Tanggal Kembali
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Terlambat
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach (Auth::user() as $item)
            <tr class="bg-white dark:bg-gray-800">
                    
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4">
                    Alan Pratama
                </td>
                <td class="px-6 py-4">
                    0888 8888 8888
                </td>
                <td class="px-6 py-4">
                    20/08/2023
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    23/08/2023
                </th>
                <td class="px-6 py-4">
                    <h3 class="text-green-500">Tidak Ada</h3>
                </td>
                <td class="px-6 py-4">
                    Dipinjam
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection