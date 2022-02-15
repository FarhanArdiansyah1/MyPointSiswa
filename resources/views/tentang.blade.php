@extends('layout.main')

@section('container')
    <div id="tentang" class="container">
        <div id="bagian-content-tentang">
            <h2 class="fw-bolder display-4">NEODEV</h2>
            <p class="fw-bold">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, modi accusamus maiores ea voluptatem
                doloremque velit iusto repellendus quis animi ad placeat in distinctio est asperiores quam eum molestias
                fuga?
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            </p>
        </div>

        <div id="bagian-visimisi-tentang">
            <div class="visi">
                <h2 class="fw-bolder display-4">Visi</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="misi">
                <h2 class="fw-bolder display-4">Misi</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>

        {{-- 4 kartu --}}
        <div id="bagian-pawprint-home">
            <div class="background-cover"></div>

            <div class="pawprint-judul container" style="padding-top: 50px;">
                <h1 class="fw-bold display-4 text-capitalize text-light">
                    kami membawa anda <br>untuk mengetahui lebih dalam
                </h1>
            </div>

            <div class="pawprint-isi container d-flex" style="padding-top: 20px;">
                {{-- 1 --}}
                <div class="pawprint">
                    <img src="aset/pawprint.svg" id="paw" alt="paw">
                    <h5 class="fw-bold">Agung Kurniawan</h5>
                    <p>sadsfcxvdgffdfgr dgdfghjfgdgfdg fgfdgdfgdfgg fdgdggggg gggggggggggg gggdfgdfgdf</p>
                </div>
                {{-- 2 --}}
                <div class="pawprint">
                    <img src="aset/pawprint.svg" id="paw" alt="paw">
                    <h5 class="fw-bold">Farhan Ardiansyah</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate nihil eveniet ea velit esse at?
                    </p>
                </div>
                {{-- 3 --}}
                <div class="pawprint">
                    <img src="aset/pawprint.svg" id="paw" alt="paw">
                    <h5 class="fw-bold">Fharsal Rauzani Yuzka</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate nihil eveniet ea velit esse at?
                    </p>
                </div>
                {{-- 4 --}}
                <div class="pawprint">
                    <img src="aset/pawprint.svg" id="paw" alt="paw">
                    <h5 class="fw-bold">Hilman Arasyid</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate nihil eveniet ea velit esse at?
                    </p>
                </div>
                {{-- 5 --}}
                <div class="pawprint">
                    <img src="aset/pawprint.svg" id="paw" alt="paw">
                    <h5 class="fw-bold">Intan Puja Zaeni</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate nihil eveniet ea velit esse at?
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
