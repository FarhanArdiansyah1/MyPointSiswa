@extends('layout.main')

@section('container')
    <div id="berita" class="container">
        <div id="bagian-content-berita">
            <div class="row">
                <div class="col-6 d-flex">
                    <div class="bagian-kiri">
                        <img src="aset/x1/gajah-2.png">
                    </div>
                    <div class="bagian-kanan">
                        <img src="aset/x1/badak.png" class="vgambar" style="padding-bottom: 10px;">
                        <img src="aset/x1/kudanil.png" class="vgambar">
                    </div>
                </div>

                <div class="col-6 align-content-center" style="padding: 25px;">
                    <h2 class="fw-bolder text-capitalize display-6">10 hewan herbivora <br> yang berbahaya</h2>
                    <p class="fw-bold">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis esse itaque recusandae facilis modi doloremque exercitationem, asperiores aliquid vero iste cumque alias illum temporibus quia, eius, consequatur excepturi beatae ab!
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quaerat eaque voluptatem vel quae non in iure, est doloremque temporibus natus alias. Recusandae, voluptas.</p>
                    <button class="btn btn-success">baca selengkapnya <img src="aset/panah.svg"></button>
                </div>
            </div>
        </div>

        <div id="bagian-thumbnail-berita">
            <h2 class="fw-bolder display-6 text-capitalize">berita lainya</h2>
            {{-- 1-3 --}}
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="aset/x1/harimau.png" class="card-img-top" alt="harimau">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-capitalize">apa kabar kebun binatang <br>saat wabah covid 19?</h5>
                        <p class="card-text text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, facere.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="aset/x1/burung-2.png" class="card-img-top" alt="burung">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-capitalize">anugerah dari hutan indonesia</h5>
                        <p class="card-text text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, facere.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="aset/x1/badak.png" class="card-img-top" alt="badak">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-capitalize">10 hewan herbivora yang berbahaya</h5>
                        <p class="card-text text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, facere.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4-6 --}}
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="aset/x1/harimau-2.png" class="card-img-top" alt="harimau_putih" height="251.883px">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-capitalize">4 penyakit yang ditularkan hewan ke manusia</h5>
                        <p class="card-text text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, facere.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="aset/x1/penyu.png" class="card-img-top" alt="penyu">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-capitalize">terumbu karang: pengertian, jenis, sebaran, dan masalah</h5>
                        <p class="card-text text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, facere.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="aset/x1/kancil.png" class="card-img-top" alt="kancil">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-capitalize">ternyata, tanduk rusa berasal dari sel kanker tulang</h5>
                        <p class="card-text text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, facere.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection