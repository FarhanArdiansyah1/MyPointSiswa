@extends('layout.main')

@section('container')
    <div id="kontak" class="container">
        <div id="bagian-map-kontak">
            <img src="aset/x1/map.png" style="width: 100%;">
        </div>

        <div id="bagian-form-kontak">
            <h2 class="fw-bolder display-6 text-capitalize">
                kontak kami
            </h2>
            <form action="" class="form-kontak">
                <div class="row">
                    <div class="col-7">
                    <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>

                    <div id="textInput" class="col-5">
                        <input type="text" class="kontak-input" placeholder="Subject">
                        <input type="text" class="kontak-input" placeholder="Nama">
                        <input type="text" class="kontak-input" placeholder="Email">
                        <button class="btn btn-success" type="submit" style="width: 100%; padding: 15px;">Kirim <img src="aset/send.svg"></button>
                    </div>
                </div>

                <div id="icon">
                    <div class="row text-center">
                        <div class="col-4">
                            <a class="links" href="#">
                                <span><img src="aset/mail.svg" id="iconlink"></span>
                                <h5 class="fw-bold">Email</h5>
                                <div class="text-secondary">tropisianimal@gmail.com</div>
                            </a>
                        </div>

                        <div class="col-4">
                            <a class="links" href="#">
                                <span><img src="aset/phone.svg" id="iconlink"></span>
                                <h5 class="fw-bold">Phone</h5>
                                <div class="text-secondary">+62 812 3456 7890</div>
                            </a>
                        </div>

                        <div class="col-4">
                            <a class="links" href="#">
                                <span><img src="aset/map-pin.svg" id="iconlink"></span>
                                <h5 class="fw-bold">Location</h5>
                                <div class="text-secondary">Kota Bandung, Jawa Barat <br> Indonesia</div>
                            </a>
                        </div> 
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection