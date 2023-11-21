@extends('layouts.main')

@section('title', 'Buku')
    <style>
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
            margin: 10px 0px 0px 0px;
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
            align-items: center;
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
                gap: 8px;
                justify-content: space-evenly
            }

            .container-buku-user .buku-cover{
                min-width: 140px;
                width: auto;
            }  

            .container-buku-user .buku-cover .cover{
                width: 130px;
                aspect-ratio: 75:118;
            }
            
            .container-buku-user .buku-cover .cover img{
                /* aspect-ratio: 75:118; */
                height: 190px;
                width: 100%;
                border-radius: 10px;
            }

            .container-buku-user .buku-cover .text-detail{
                width: 130px;
            }

            .container-buku-user .buku-cover .text-detail p{
                font-size: 18px;
                color: #161616ab;
                margin-bottom: 4px
            }
            
        }
    </style>
@section('bukuUser')

<div class="mother-buku-user one">
    <h3 class="judul">Daftar Buku <span>Novel</span></h3>
    <div class="container-buku-user">
    @foreach ($novels as $novel)
    <div class="buku-cover">
        <a href="buku/{{$novel->slug}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $novel->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $novel->nama }}</h3>
                <p>{{ $novel->pengarang }}</p>
                <button>{{ $novel->kategori }}</button>
            </div>
        </a>
    </div>

   
    @endforeach
</div>
</div>
    
<div class="mother-buku-user">
    <h3 class="judul">Daftar Buku <span>Manga</span></h3>
    <div class="container-buku-user">
    @foreach ($mangas as $manga)
    <div class="buku-cover">
        <a href="buku/{{$manga->slug}}">
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


<div class="mother-buku-user">
    <h3 class="judul">Daftar Buku <span>Pelajaran</span></h3>
    <div class="container-buku-user">
    @foreach ($studys as $study)
    <div class="buku-cover">
        <a href="buku/{{$study->slug}}">
            <div class="cover">
                <img src="{{ asset('storage/'. $study->gambar) }}" alt="">
            </div>
            <div class="text-detail">
                <h3>{{ $study->nama }}</h3>
                <p>{{ $study->pengarang }}</p>
                <button>{{ $study->kategori }}</button>
            </div>
        </a>
    </div>
    @endforeach
</div>
</div>


@endsection