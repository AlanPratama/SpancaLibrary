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
                @foreach ($bukus as $buku)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                {{ $buku->id }}
                            </div>
                        </td>
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $buku->nama }}
                        </th> --}}
                        <td class="px-6 py-8 font-semibold text-gray-500 font-medium dark:text-white"
                            >
                            <div class="flex items-start gap-2">
                                <img src="{{ asset('/storage/' . $buku->gambar) }}"
                                    class="rounded"
                                    style="width: 70px; min-width: 70px; max-width: 70px;
                                            height: 108px; min-height: 108px; max-height: 108px;    
                                            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"
                                    alt="Buku">
                                <div class="flex flex-col items-start w-full">
                                    <p class="text-lg text-gray-600" style="width: auto !important;">{{ $buku->nama }}<span class="text-gray-500">({{ $buku->tahun_terbit }})</span></p>
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
                            <form id="deleteForm" action="{{ route('buku.destroy', ['slug' => $buku->slug]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="deleteBuku('{{ route('buku.destroy', ['slug' => $buku->slug]) }}')"><i class="fa-solid fa-trash-can font-medium text-white text-lg bg-red-500 rounded p-2"></i></button>
                            </form>
                        </div>


                        </td>
                    </tr>
                @endforeach

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
