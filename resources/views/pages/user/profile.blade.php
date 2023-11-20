@extends('layouts.main')


@section('content')
    <style>
        .informasi{
            min-width: 500px; 
        }

        @media(max-width: 1000px) {
            .informasi{
                min-width: 200px !important;
                width: 95%;
                padding: 10px 5px;
            }
        }
    </style>
    


<div class="h-full bg-gray-200">
    <div class="bg-white rounded-lg shadow-xl pb-8">
        <div class="w-full h-[250px]">
            <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
        </div>
        <div class="flex flex-wrap justify-center items-start w-full">

            <div class="w-1/2 informasi" style="margin-top: -80px;">
                
                <div class="flex flex-col items-center" >
                    <img src="{{ asset('storage/'.Auth::user()->foto) }}" class="w-32 h-32 border-4 border-white rounded-full">
                    <div class="flex justify-center items-center gap-8 w-full mt-4">
                        <div class="flex flex-col items-center">
                            <p class="text-xl font-semibold">7</p>
                            <p class="text-md">Meminjam</p>
                        </div>

                        <div class="flex flex-col items-center">
                            <p class="text-xl font-semibold">7</p>
                            <p class="text-md">Izin eBook</p>
                        </div>

                        <div class="flex flex-col items-center">
                            <p class="text-xl font-semibold">7</p>
                            <p class="text-md">Pelanggaran</p>
                        </div>
                    </div>
                    @if (session('status'))
                    <div class="mb-4 text-white bg-green-500 py-2 px-3 rounded-xl">
                    {{ session('status') }}
                    </div>
                @endif
                </div>
                <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
                    <div class="flex flex-col 2xl:w-1/3">
                        <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                            <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                            <ul class="mt-2 text-gray-700">
                                <li class="flex border-y py-2">
                                    <span class="font-bold w-24">Username:</span>
                                    <span class="text-gray-700">{{ Auth::user()->username }}</span>
                                </li>
                                <li class="flex border-y py-2">
                                    <span class="font-bold w-24">Nama:</span>
                                    <span class="text-gray-700">{{ Auth::user()->nama }}</span>
                                </li>
                                <li class="flex border-b py-2">
                                    <span class="font-bold w-24">Email:</span>
                                    <span class="text-gray-700">{{ Auth::user()->email }}</span>
                                </li>
                                <li class="flex border-b py-2">
                                    <span class="font-bold w-24">Telepon:</span>
                                    <span class="text-gray-700">{{ Auth::user()->telepon }}</span>
                                </li>
                                <li class="flex flex-wrap gap-1 border-b py-2">
                                    <span class="font-bold w-24">Alamat:</span>
                                    <span class="text-gray-700">{{ Auth::user()->alamat }}</span>
                                </li>

                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <form class="w-1/2 p-6 flex flex-col informasi" action="{{ route('profil.edit', ['slug' => Auth::user()->slug]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mt-4">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="username" name="username" id="username" value="{{ Auth::user()->username }}" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>

                <div class="mt-4">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="nama" name="nama" id="nama" value="{{ Auth::user()->nama }}" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>

                <div class="mt-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>

                <div class="mt-4">
                    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                    <input type="telepon" name="telepon" id="telepon" value="{{ Auth::user()->telepon }}" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>

                <div class="mt-4">
                    <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profil Picture</label>
                    <input type="file" accept="image/*" name="foto" id="foto" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="mt-4">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="20" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ Auth::user()->alamat }}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="sign-button w-full text-white bg-indigo-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md shadow-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save</button>
                </div>
            </form>


        </div>
    </div>

    
</div>    

    @endsection
