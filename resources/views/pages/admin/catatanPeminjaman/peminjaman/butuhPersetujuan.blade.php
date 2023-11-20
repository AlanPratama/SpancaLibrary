@extends('layouts.admin')

@section('title', 'Butuh Persetujuan')

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

                @if ($perizinan->count() > 0)
                    @foreach ($perizinan as $item)
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
                                        class="w-16 max-w-16 h-16 max-h-16 rounded" style="width: 60px; max-width: 60px; min-width: 60px;  height: 60px; max-height: 60px; min-height: 60px;" alt="user">
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
                                    <a href="{{ url('/catatan-butuh-persetujuan/setuju/' . $item->kode) }}">
                                        <i class="fa-regular fa-square-check text-white bg-green-500 p-2 rounded"></i>
                                    </a>

                                    <a href="{{ url('/catatan-butuh-persetujuan/tidak-setuju/' . $item->kode) }}">
                                        <i class="fa-regular fa-rectangle-xmark text-white bg-red-500 p-2 rounded"></i>
                                    </a>
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

@endsection
