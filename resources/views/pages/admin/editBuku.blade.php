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
<form method="post" action="{{ route('buku.update', ['slug' => $buku->slug]) }}" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="flex flex-wrap justify-center items-center w-full">
      <div class="mb-6 w-1/2 pr-1">
          <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input type="text" id="nama" name="nama"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Kisah Tanah Jawa" value="{{ $buku->nama }}" required>
      </div>
      <div class="mb-6 w-1/2 pl-1">
          <label for="pengarang"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
          <input type="text" id="pengarang" name="pengarang"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required value="{{ $buku->pengarang }}">
      </div>
  </div>
  <div class="flex flex-wrap justify-center items-center w-full">
      <div class="mb-6 w-1/2 pr-1">
          <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
          <input type="text" id="penerbit" name="penerbit"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required value="{{ $buku->penerbit }}">
      </div>
      <div class="mb-6 w-1/2 pl-1">
          <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
              Terbit</label>
          <input type="number" id="tahun_terbit" name="tahun_terbit"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required value="{{ $buku->tahun_terbit }}">
      </div>
  </div>

  <div class="flex flex-wrap justify-center items-center w-full">
      <div class="mb-6 w-1/2 pr-1">
          <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
              Kategori</label>
          <select id="kategori" name="kategori"
              class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required>
              <option value="{{ $buku->kategori }}" selected>Pilih Kategori</option>
              <option value="Novel">Novel</option>
              <option value="Manga">Manga</option>
              <option value="Study">Study</option>
          </select>
      </div>
      <div class="mb-6 w-1/2 pl-1">
          <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
          <input type="text" id="genre" name="genre"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required value="{{ $buku->genre }}">
      </div>
  </div>


  <div class="flex flex-wrap justify-center items-start w-full">
      <div class="mb-6 w-1/2 pr-1 flex flex-col">
          <div class="mb-2">
              <label for="halaman"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Halaman</label>
              <input type="text" id="halaman" name="halaman"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required value="{{ $buku->halaman }}">
          </div>
          <div class="mb-2">
              <label for="jumlah_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                  Buku</label>
              <input type="number" id="jumlah_buku" name="jumlah_buku"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required value="{{ $buku->jumlah_buku }}">
          </div>
          <div class="mb-2">
              <label for="link_ebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link eBook
                  (Jika Ada)</label>
              <input name="link_ebook" id="link_ebook" type="text" value="{{ $buku->link_ebook }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
          <div class="mb-2">
              <label for="deskripsi"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" rows="5"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required>{{ $buku->deskripsi }}</textarea>
          </div>


      </div>
      <div class="mb-6 mb-6 w-1/2 pl-1">
          <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover
              Buku</label>
          <img id="imagePreview" src="{{ asset('storage/'.$buku->gambar) }}" alt="Preview"
              style="box-shadow: rgba(50, 50, 93, 0.115) 0px 6px 12px -2px, rgba(0, 0, 0, 0.061) 0px 3px 7px -3px; border-radius: 10px; display: ; border: 1px solid rgba(0, 0, 0, 0.161); max-width: 250px; min-width: 250px; width: 250px; max-height: 320px; min-height: 320px; height: 320px;">
          <input type="file" accept="image/*" id="gambar" name="gambar"
              class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>
  </div>

  <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>



<script>
  document.addEventListener('DOMContentLoaded', function() {
      const imageInput = document.getElementById('gambar');
      const imagePreview = document.getElementById('imagePreview');

      imageInput.addEventListener('change', function() {
          if (imageInput.files && imageInput.files[0]) {
              const reader = new FileReader();

              reader.onload = function(e) {
                  imagePreview.src = e.target.result;
                  imagePreview.style.display = 'block';
              };

              reader.readAsDataURL(imageInput.files[0]);
          }
      });
  });
</script>
@endsection