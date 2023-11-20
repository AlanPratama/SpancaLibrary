@extends('layouts.main')
@section('title', 'Novel')
    <style>
        nav{
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            position: fixed;
            top: 0;
            z-index: 999;
            width: 100%;
        }
        body{
            user-select: none;
        }

        .slider-buku{
            padding-top: 100px !important;
        }

        .slider-buku .bungkus-slider-buku img{
            margin: 0 10px;
        }



        .one{
            margin: 100px 0px 0px 0px;
        }

        .mother-buku-user{
            margin-bottom: 70px
        }

        .mother-buku-user .judul{
            font-size: 42px;
            color: #000;
            font-weight: 600;
            margin-left: 25px;
            margin-bottom: 18px;
        }

        .mother-buku-user .judul span{
            color: #5333f2;
        }


        .container-buku-user{
            height: auto !important;
            display: flex;
            flex-wrap: wrap !important;
            justify-content: center !important;
            gap: 0px;
            align-items: end;
        }

        .container-buku-user .buku-cover{
            display: flex !important;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            margin-bottom: 40px;
            width: auto;
            min-width: 250px;
            /* transition: all .2s ease-in; */
            transform-origin:right; /* Pusat transformasi di tengah gambar */
            transition: all .6s cubic-bezier(0.24, 0.74, 0.58, 1) 0s;
        }

        .container-buku-user .buku-cover:hover{
            transform: translateY(-16px);
            
        }

        .container-buku-user .buku-cover .cover{
            width: 220px;
            aspect-ratio: 75:118;
        }
        
        .container-buku-user .buku-cover .cover img{
            /* aspect-ratio: 75:118; */
            height: 320px;
            width: 100%;
            border-radius: 10px;
        }

        .container-buku-user .buku-cover .text-detail{
            width: 220px;
        }

        .container-buku-user .buku-cover .text-detail h3{
            font-size: 24px;
            color: #2d2e2e;
            -webkit-line-clamp: 1;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }

        .container-buku-user .buku-cover .text-detail p{
            font-size: 20px;
            color: #161616ab;
            margin-bottom: 4px
        }

        .container-buku-user .buku-cover .text-detail button{
            background-color: #4587f8;
            padding: 1px 4px;
            border-radius: 4px;
            color: white;
            width: auto;
        }

        @media(max-width: 500px){
            .one{
                margin: 100px 0px 0px 0px;
            }

            /* .mother-buku-user{
                margin-bottom: 70px
            } */

            .mother-buku-user .judul{
                font-size: 36px;
                color: #000;
                font-weight: 600;
                margin-left: 0px;
                text-align: center;
                margin-bottom: 18px;
            }
            .container-buku-user{
                margin: 0px 0px;
            }

            .container-buku-user .buku-cover{
                min-width: 300px;
                width: auto;
                display: flex;
                justify-content: center;
            }  

            .container-buku-user .buku-cover .cover{
                width: 280px;
                aspect-ratio: 75:118;
            }
            
            .container-buku-user .buku-cover .cover img{
                /* aspect-ratio: 75:118; */
                height: 380px;
                width: 100%;
                border-radius: 10px;
            }

            .container-buku-user .buku-cover .text-detail{
                width: 280px;
            }
            
        }
    </style>
@section('kategoriManga_User')
<div class="mother-buku-user one">
    <h3 class="judul">Daftar Buku <span>Novel</span></h3>
    <div class="container-buku-user">
    @foreach ($mangas as $manga)
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    <div class="buku-cover">
        <a href="{{$manga->id}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $manga->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $manga->nama }}</h3>
                <p>{{ $manga->pengarang }}</p>
                <button>{{ $manga->kategori }}</button>
            </div>
        </a>
    </div>
    
    @endforeach
</div>

</div>
{{-- <img src="{{ asset('storage/' . $buku->gambar) }}" class="w-100" alt="Buku Gambar"> --}}

{{-- <div class="container-detailBuku h-full w-full">
    <div class="image"> 
        <img src="{{ asset('storage/' . $buku->gambar) }}" class="w-100" alt="Buku Gambar">
    </div>
    <div class="text">
        <h3>{{ $buku->nama }}</h3>
        <p><span>Pengarang:</span> {{ $buku->pengarang }}</p>
        <p><span>Penerbit:</span> {{ $buku->penerbit }}</p>
        <p><span>Halaman:</span> {{ $buku->halaman }}</p>
        <p><span>Kategori:</span> {{ $buku->kategori }}</p>
        <p><span>Genre:</span> {{ $buku->genre }}</p>
        <p><span>Tahun Terbit:</span> {{ $buku->tahun_terbit }}</p>
    </div>
</div>
<div class="bungkus-deskripsi">
    <p class="deskripsi"><span >Deskripsi:</span> <br>{{ $buku->deskripsi }}</p>
</div> --}}
@endsection