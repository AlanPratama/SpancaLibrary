@extends('layouts.admin')

@section('title', 'Dipinjam')

@section('content')

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

    @if (session('failed'))
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
                icon: "error",
                title: "{{ session('failed') }}"
            });
        </script>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode
                    </th>
                    <th scope="col" class="px-6 py-3" style="padding: 0px 20px;">
                        Peminjam
                    </th>
                    <th scope="col" class="px-6 py-3" style="padding: 0px 20px;">
                        Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pinjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Kembali
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @if ($rent->count() > 0)
                    @foreach ($rent as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->kode }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white"
                                style="padding: 0px 20px;">
                                <div class="flex gap-2">
                                    <img src="{{ asset('/storage/' . $item->users->foto) }}"
                                        class="w-16 max-w-16 h-16 max-h-16 rounded" style="width: 60px; max-width: 60px; min-width: 60px;  height: 60px; max-height: 60px; min-height: 60px;" alt="Apple Watch">
                                    <div class="flex flex-col items-start">
                                        <p>{{ $item->users->nama }}</p>
                                        <p>{{ $item->users->telepon }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4  font-semibold text-gray-500 font-medium dark:text-white"
                                style="padding: 0px 20px;">
                                <div class="py-2 flex flex-col justify-center items-center w-full">
                                    <img src="{{ asset('/storage/' . $item->buku->gambar) }}" class="rounded"
                                        style="width: 60px; max-width: 60px;" alt="Apple Watch">
                                    <p class="text-md"
                                        style="-webkit-line-clamp: 1;
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;">
                                        {{ $item->buku->nama }}</p>
                                </div>
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->tanggal_pinjam }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->tanggal_kembali }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->status }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ url('/catatan-dipinjam/dikembalikan/' . $item->kode) }}">
                                        <i class="fa-regular fa-square-check text-white bg-green-500 p-2 rounded"></i>
                                    </a>

                                    <button data-modal-target="pelanggaran-{{ $item->kode }}" data-modal-toggle="pelanggaran-{{ $item->kode }}">
                                        <i class="fa-regular fa-rectangle-xmark text-white bg-red-500 p-2 rounded"></i>
                                    </button>
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








    
    @foreach ($rent as $item)
        <!-- Main modal -->
        <div id="pelanggaran-{{ $item->kode }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Pilih Jenis Pelanggaran
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="pelanggaran-{{ $item->kode }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Masukkan total denda sesuai dengan besarnya pelanggaran.</p>
                        <ul class="my-4 space-y-3">
                            <li class="">
                                <button data-modal-target="rusak-{{ $item->kode }}" data-modal-toggle="rusak-{{ $item->kode }}" class="flex justify-start items-center p-3 text-left font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white w-full">
                                    <i class="fa-solid fa-circle-exclamation text-xl text-white bg-red-500 rounded p-2"></i>
                                    <span class="ml-3 flex-1 ms-3 whitespace-nowrap text-xl">Rusak</span>
                                </button>
                            </li>
                            <li class="">
                                <button data-modal-target="hilang-{{ $item->kode }}" data-modal-toggle="hilang-{{ $item->kode }}" class="flex justify-start items-center p-3 text-left font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white w-full">
                                    <i class="fa-solid fa-circle-exclamation text-xl text-white bg-red-500 rounded p-2"></i>
                                    <span class="ml-3 flex-1 ms-3 whitespace-nowrap text-xl">Hilang</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div id="rusak-{{ $item->kode }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Masukkan Denda Rusak
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="rusak-{{ $item->kode }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{ route('denda.rusak', ['kode' => $item->kode]) }}" method="post">
                            @csrf
                            <div>
                                <input type="text" name="denda" id="dendaRusak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Rp 50.000" required>
                            </div>
                            
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    
    
    
    
        <div id="hilang-{{ $item->kode }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Masukkan Denda Hilang
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hilang-{{ $item->kode }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{ route('denda.hilang', ['kode' => $item->kode]) }}" method="post">
                            @csrf
                            <div>
                                <input type="text" name="denda" id="dendaHilang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Rp 50.000" required>
                            </div>
                            
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    @endforeach


    <script>
        // Fungsi untuk menghapus karakter selain angka
        function formatRupiah(angka) {
            var numberString = angka.toString().replace(/[^,\d]/g, '');
            var split = numberString.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);
    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
    
            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp ' + rupiah;
        }
    
        // Event listener untuk memformat input saat nilai berubah
        document.getElementById('dendaRusak').addEventListener('input', function (event) {
            var inputValue = event.target.value;
            event.target.value = formatRupiah(inputValue);
        });

        document.getElementById('dendaHilang').addEventListener('input', function (event) {
            var inputValue = event.target.value;
            event.target.value = formatRupiah(inputValue);
        });
    </script>
    
    
@endsection
