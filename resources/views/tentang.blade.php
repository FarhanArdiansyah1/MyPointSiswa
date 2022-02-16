@extends('layout.main')

@section('container')
    <div id="tentang" class="container">
        <div id="bagian-content-tentang">
            <h2 class="fw-bolder display-4">NEODEV</h2>
            <p>
                Neo Developer atau NEODEV adalah company yang berjalan
                dibidang usaha software aplikasi. NEODEV dipimpin oleh Hilman Arrasyid sebagai
                CEO serta bimbingan dari Ibu Hana dan Ibu Shinta menjadikan NEODEV menjadi
                company yang unggul, ulet, dan konsisten.
            </p>
            <p>
                NEODEV didirikan pada Tanggal 02 November 2021, company
                ini dibentuk dengan beranggotakan orang- orang yang baru memulai diranah develop.
                Pembentukan tim yang sudah diperhitungkan oleh Ibu Shinta, serta keserasian antar
                anggota tim yang menjadikan NEODEV ini bisa tercipta tanpa hambatan.
            </p>
        </div>
        <div id="bagian-visimisi-tentang">
            <div class="visi">
                <h2 class="fw-bolder display-4">Visi</h2>
                <p>Menjadi perusahaan yang berperan aktif dalam pengembangan masyarakat
                    informasi di Indonesia..</p>
            </div>
            <div class="misi">
                <h2 class="fw-bolder display-4">Misi</h2>
                <p>a. Meningkatkan kemampuan individu dan tim dalam menghasilkan produk yang
                    unggul.</p>
                <p>b. Menerapkan kedisiplinan dan kerjasama tim yang baik dengan saling support dan
                    memberikan solusi untuk pengoptimalan kinerja perusahaan.</p>
            </div>
        </div>
    </div>
    {{-- 4 kartu --}}
    <div id="bagian-pawprint-home">
        <div class="background-cover"></div>

        <div class="pawprint-judul container" style="padding-top: 10px; padding-bottom: 0px;">
            <h1 class="fw-bold display-4 text-capitalize text-light">
                Keanggotaan
            </h1>
        </div>

        <div class="pawprint-isi container d-flex" style="padding-top: 0px; padding-bottom: 0px;">
            {{-- 1 --}}
            <div class="pawprint">
                <img src="aset/pawprint.svg" id="paw" alt="paw">
                <h5 class="fw-bold">Agung Kurniawan</h5>
                <p>CFO & Front-End Developer</p>
            </div>
            {{-- 2 --}}
            <div class="pawprint">
                <img src="aset/farhan.png" id="paw" alt="paw">
                <h5 class="fw-bold">Farhan Ardiansyah</h5>
                <p>Full-Stack Developer
                </p>
            </div>
            {{-- 3 --}}
            <div class="pawprint">
                <img src="aset/Farshal.jpeg" id="paw" alt="paw">
                <h5 class="fw-bold">Farshal Rauzani Yuzka</h5>
                <p>Back-End Developer
                </p>
            </div>
            {{-- 4 --}}
            <div class="pawprint">
                <img src="Hilman.jpeg" id="paw" alt="paw">
                <h5 class="fw-bold">Hilman Arasyid</h5>
                <p>CEO & System Analyst
                </p>
            </div>
            {{-- 5 --}}
            <div class="pawprint">
                <img src="aset/pawprint.svg" id="paw" alt="paw">
                <h5 class="fw-bold">Intan Puja Zaeni</h5>
                <p>UI/UX Design & Front-End Developer
                </p>
            </div>
        </div>
    </div>
@endsection
