<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


@extends('layouts.admin')
@section('title', 'Daftar Buku')

@section('dBuku')

    @if (session('status'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('status') }}"
            });
        </script>
    @endif
    <div class="flex justify-between items-center">
        <div class="flex justify-center items-center gap-2">
            <a href="#">
                <button class="w-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-qrcode text-white -ml-1 mr-2"></i>QR SCANNER
                </button>
            </a>

            <a href="">

                <button class="w-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fa-solid fa-qrcode text-white -ml-1 mr-2"></i>QR SCANNER
                </button>
            </a>
        </div>


        <form class="flex items-center">
            <label for="search-username" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="search-username" name="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Pengguna..." required>
            </div>
            <button type="submit"
                class="p-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>



    </div>
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
                        Penerbit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Halaman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Genre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="text-center px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($bukus->count() > 0)
                    @foreach ($bukus as $buku)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    {{ $buku->id }}
                                </div>
                            </td>
                            {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $buku->nama }}
                    </th> --}}
                            <td class="px-6 py-8 font-semibold text-gray-500 font-medium dark:text-white">
                                <div class="flex items-start gap-2">
                                    <img src="{{ asset('/storage/' . $buku->gambar) }}" class="rounded"
                                        style="width: 70px; min-width: 70px; max-width: 70px;
                                        height: 108px; min-height: 108px; max-height: 108px;    
                                        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"
                                        alt="Buku">
                                    <div class="flex flex-col items-start w-full">
                                        <p class="text-lg text-gray-600" style="width: auto !important;">
                                            {{ $buku->nama }}<span
                                                class="text-gray-500">({{ $buku->tahun_terbit }})</span></p>
                                        <p class="mt-1 mb-2">- {{ $buku->pengarang }}</p>
                                        <p class="bg-blue-500 text-white px-1 rounded-sm">{{ $buku->kategori }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-8">
                                {{ $buku->penerbit }}
                            </td>
                            <td class="px-6 py-8">
                                {{ $buku->halaman }}
                            </td>
                            <td class="px-6 py-8">
                                {{ $buku->genre }}
                            </td>
                            <td class="px-6 py-8">
                                {{ $buku->jumlah_buku }}
                            </td>
                            <td class="px-6 py-8 space-x-1">
                                <div class="flex justify-center items-center gap-2">

                                    <a href="daftar-buku/{{ $buku->slug }}" class="" type="button"
                                        data-buku-id="{{ $buku->slug }}">
                                        <i
                                            class="fa-solid fa-circle-info font-medium text-white text-lg bg-blue-500 rounded p-2"></i>
                                    </a>
                                    <a href="{{ route('buku.edit', ['slug' => $buku->slug]) }}" class="">
                                        <i
                                            class="fa-solid fa-pen-to-square font-medium text-white text-lg bg-green-500 rounded p-2"></i>
                                    </a>
                                    <form id="deleteForm" action="{{ route('buku.destroy', ['slug' => $buku->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="button"
                                            onclick="deleteBuku('{{ route('buku.destroy', ['slug' => $buku->slug]) }}')"><i
                                                class="fa-solid fa-trash-can font-medium text-white text-lg bg-red-500 rounded p-2"></i></button>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-center" colspan="8">
                            <div class="flex flex-col justify-center items-center gap-2">
                                <img src="{{ asset('assets/no-data.jpg') }}" class="w-32 h-32" alt="">

                                <p>TIDAK ADA DATA PERIZINAN</p>
                            </div>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>

    <script>
        // import axios from 'axios';
        // axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');



        function deleteBuku(route) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#ff3d41',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#8fcc34',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form dengan AJAX
                    document.getElementById('deleteForm').action = route;
                    document.getElementById('deleteForm').submit();

                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Buku berhasil dihapus.',
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getPopup().querySelector('b');
                            const timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                            Swal.getPopup().timerInterval = timerInterval;
                        },
                        willClose: () => {
                            clearInterval(Swal.getPopup().timerInterval);
                        }
                    }).then(() => {
                        window.location.reload();
                    });
                }
            });
        }
    </script>




@endsection
