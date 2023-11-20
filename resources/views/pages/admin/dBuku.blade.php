<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


@extends('layouts.admin')
@section('title', 'Daftar Buku')
    
@section('dBuku')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        ID
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Pengarang
                </th>
                <th scope="col" class="px-6 py-3">
                    Penerbit
                </th>
                <th scope="col" class="px-6 py-3">
                    Tahun
                </th>
                <th scope="col" class="px-6 py-3">
                    Halaman
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        {{ $buku->id }}
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $buku->nama }}
                </th>
                <td class="px-6 py-4">
                    {{ $buku->pengarang }}
                </td>
                <td class="px-6 py-4">
                    {{ $buku->penerbit }}
                </td>
                <td class="px-6 py-4">
                    {{ $buku->tahun_terbit }}
                </td>
                <td class="px-6 py-4">
                    {{ $buku->halaman }}
                </td>
                <td class="px-6 py-4">
                    {{ $buku->kategori }}
                </td>
                <td class="px-6 py-4">
                    {{ $buku->genre }}
                </td>
                <td class="px-6 py-4">
                    {{ $buku->jumlah_buku }}
                </td>
                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="daftar-buku/{{$buku->slug}}" class="font-medium text-white bg-blue-500 rounded px-1" type="button" data-buku-id="{{ $buku->slug }}" >Detail</a>
                    <a href="{{ route('buku.edit', ['slug' => $buku->slug]) }}" class="font-medium text-white bg-green-500 rounded px-1">Edit</a>
                    <a href="#" class="font-medium text-white bg-red-500 rounded px-1" onclick="event.preventDefault(); deleteBuku('{{ $buku->slug }}');"> Hapus </a>
                    

                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

<script>
    // import axios from 'axios';
    // axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    
    function deleteBuku(bukuSlug) {
    Swal.fire({
        title: 'Apakah Anda yakin ?',
        text: 'Anda tidak dapat mengembalikan ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        confirmButtonColor: '#ff3d41',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#8fcc34',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/daftar-buku/${bukuSlug}`)
            .then(response => {
                    Swal.fire(
                        'Terhapus!',
                        'Buku berhasil dihapus.',
                        'success'
                    );
                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
}
</script>




@endsection