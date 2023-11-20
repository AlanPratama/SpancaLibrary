@extends('layouts.admin')
@section('title', 'Edit')
    
<style>

    .bg{
    background-image: url('https://img.freepik.com/premium-photo/3d-illustration-black-thick-books-isolated-black-background_351397-674.jpg?size=626&ext=jpg&uid=R56490936&ga=GA1.2.1149922704.1691593168&semt=ais');
    background-position: bottom;
    background-size: cover;
    background-attachment:fixed;
    }
</style>

@section('editBuku')
<form action="{{ route('buku.update', ['slug' => $buku->slug]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->nama}}">
      </div>
      <div class="mb-6">
        <label for="pengarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->pengarang}}">
      </div>
      <div class="mb-6">
          <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
          <input type="text" id="penerbit" name="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->penerbit}}">
        </div>

        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $buku->kategori }}</label>
        <select id="kategori" name="kategori" class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
          <option selected>{{ $buku->kategori }}</option>
          <option value="Novel">Novel</option>
          <option value="Manga">Manga</option>
          <option value="Study">Study</option>
        </select>
        {{-- <div class="mb-6">
          <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
          <input type="text" id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->kategori}}">
        </div> --}}
        <div class="mb-6">
          <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
          <input type="text" id="genre" name="genre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->genre}}">
        </div>
        <div class="mb-6">
          <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" name="deskripsi" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$buku->deskripsi}}</textarea>
      </div>
        <div class="mb-6">
          <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
          <input type="number" id="tahun_terbit" name="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->tahun_terbit}}">
        </div>
        <div class="mb-6">
          <label for="halaman" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Halaman</label>
          <input type="text" id="halaman" name="halaman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->halaman}}">
      </div>
        <div class="mb-6">
          <label for="jumlah_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Buku</label>
          <input type="number" id="jumlah_buku" name="jumlah_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->jumlah_buku}}">
        </div>
        <div class="mb-6">
          <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
          <input type="file" id="gambar" name="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$buku->gambar}}">
        </div>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
    
  </form>
@endsection