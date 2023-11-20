@extends('layouts.main')

@section('title', 'Homepage')

@section('body')
        <div class="container-hero">
            <div class="text">
                <h3>Buku adalah teman yang berharga. Namun, sulit untuk menjelaskan hal itu kepada yang tak suka membaca.</h3>
                <a href="{{ url('buku') }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">PINJAM SEKARANG <i class="fa-solid fa-arrow-right"></i></button></a>
            </div>
        </div>

        <div class="container-hero-card">
            <div class="bungkus-card">
                <div class="card">
                    <i class="fa-solid fa-book"></i>
                    <h3>Buku Berkualitas</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-globe"></i>
                    <h3>Pinjam Online</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-book-open"></i>
                    <h3>All Genre</h3>
                </div>
                <div class="card">
                    <i class="fa-solid fa-bolt"></i>
                    <h3>Layanan Cepat</h3>
                </div>
            </div>
        </div>


        <div class="container-about" id="about">
            <div class="image">
                <img src="https://img.freepik.com/premium-photo/smart-man-casual-black-wear-glasses-relaxing-reading-interesting-book_213441-1749.jpg?size=626&ext=jpg&uid=R56490936&ga=GA1.2.1149922704.1691593168&semt=ais" alt="">
            </div>
            <div class="text">
                <h3>Choose <span>Spanca Library</span> For Your Mind</h3>
                <p>Perpustakaan Spanca Library adalah pusat pengetahuan yang memberikan akses luas kepada masyarakat terhadap koleksi bahan bacaan, sumber informasi, dan referensi. Kami menjadi tempat nyaman bagi pembelajar, pencari ilmu, dan pencinta literasi.</p>
                <a href="{{ url('buku') }}"><button type="button" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Selengkapnya</button></a>

            </div>
        </div>


        <div class="container-genre-card">
            <div class="bungkus-card">
                <div class="judul">
                    <button>Category Book ~</button>
                    <h3>The <span>Categories</span> Book</h3>
                </div>
                <div class="card">
                    <img src="https://img.freepik.com/free-photo/book-that-has-word-mountain-it_188544-12612.jpg?size=626&ext=jpg" alt="novel" class="thumbnail">
                    <div class="text">
                        <button class="label">Novel</button>
                        <h3>Menjelajahi Dunia yang Tersembunyi di Balik Fasad Kehidupan...</h3>
                        <p>Dalam kedipan mata, dunia biasa berpadu dengan keajaiban yang tersembunyi, dan seorang....</p>
                        <div class="more-detail">
                            <div class="image">
                                <img src="assets/logo sekolah.jpg" alt="">
                                <p>Spanca Library</p>
                            </div>
                            <div class="text">
                                <p><a href="{{ url('buku/novel') }}">More Details <i class="fa-solid fa-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="https://img.freepik.com/free-photo/boy-looking-moon-night_1340-38945.jpg?size=626&ext=jpg&ga=GA1.2.1449891322.1692801509&semt=ais" alt="fantasy genre" class="thumbnail">
                    <div class="text">
                        <button class="label">Manga</button>
                        <h3>Petualangan di Balik Kehidupan yang Nampaknya Biasa Saja...</h3>
                        <p>Di balik rutinitas sehari-hari yang nampaknya biasa, tersembunyi petualangan epik....</p>
                        <div class="more-detail">
                            <div class="image">
                                <img src="assets/logo sekolah.jpg" alt="">
                                <p>Spanca Library</p>
                            </div>
                            <div class="text">
                                <p><a href="{{ url('buku/manga') }}">More Details <i class="fa-solid fa-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="https://img.freepik.com/premium-photo/ready-school-concept-background-with-books-alarm-ai-generative-ai_590200-2244.jpg?size=626&ext=jpg&ga=GA1.1.1449891322.1692801509&semt=sph" alt="romance genre" class="thumbnail">
                    <div class="text">
                        <button class="label">Study</button>
                        <h3>Menggali Pembelajaran Untuk Kehidupan Yang Akan Datang...</h3>
                        <p>Dalam perjalanan menggali pembelajaran untuk kehidupan yang akan datang, kita....</p>
                        <div class="more-detail">
                            <div class="image">
                                <img src="assets/logo sekolah.jpg" alt="">
                                <p>Spanca Library</p>
                            </div>
                            <div class="text">
                                <p><a href="{{ url('buku/study') }}">More Details <i class="fa-solid fa-arrow-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
