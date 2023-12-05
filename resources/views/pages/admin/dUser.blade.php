@extends('layouts.admin')

@section('title', 'Daftar User')

@section('dUser')
    
<div class="mt-14 w-full relative overflow-x-auto shadow-md sm:rounded-lg">
    @csrf
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        No.
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Telepon
                </th>
                <th scope="col" class="text-center px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->nama }}
                </th> --}}
                        <td class="px-6 py-8 font-semibold text-gray-500 font-medium dark:text-white">
                            <div class="flex items-start gap-2">
                                <img src="{{ ($user->foto == null ? asset('/assets/no-img.jpg') : asset('/storage/' . $user->foto)) }}" class="rounded"
                                    style="width: 70px; min-width: 70px; max-width: 70px;
                                    height: 70px; min-height: 70px; max-height: 70px;    
                                    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"
                                    alt="user">
                                <div class="flex flex-col items-start w-full">
                                    <p class="text-lg text-gray-600" style="width: auto !important;">
                                        {{ $user->nama }}<span
                                            class="text-gray-500">({{ $user->username }})</span></p>
                                    <p class="bg-blue-500 text-white px-1 rounded-sm">{{ $user->roles->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-8">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-8">
                            {{ $user->telepon }}
                        </td>
                        <td class="px-6 py-8">
                            {{ $user->alamat }}
                        </td>
                        <td class="px-6 py-8 space-x-1">
                            <div class="flex justify-center items-center gap-2">

                                <a href="daftar-user/{{ $user->slug }}" class="" type="button"
                                    data-user-id="{{ $user->slug }}">
                                    <i
                                        class="fa-solid fa-circle-info font-medium text-white text-lg bg-blue-500 rounded p-2"></i>
                                </a>
                                <a href="{{ route('edit.user', ['slug' => $user->slug]) }}" class="">
                                    <i
                                        class="fa-solid fa-pen-to-square font-medium text-white text-lg bg-green-500 rounded p-2"></i>
                                </a>
                                <form id="deleteForm" action="{{ route('delete.user', ['slug' => $user->slug]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button"
                                        onclick="deleteUser('{{ route('delete.user', ['slug' => $user->slug]) }}')"><i
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
    function deleteUser(route) {
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
            if (result.isConfirmed || result.response == 200) {
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
                    window.location.href = 'daftar-user'
                });
            }
        });
    }
</script>
@endsection
    