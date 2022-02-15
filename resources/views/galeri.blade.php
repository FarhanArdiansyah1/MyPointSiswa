@extends('layout.main')

@section('container')
    <div id="galeri" class="container">
        <div id="bagian-slider-galeri" >
            <img src="aset/x1/buaya.png" class="slides" style="width: 100%;">
            <img src="aset/x1/burung-2.png" class="slides" style="width: 100%;">
            <img src="aset/x1/harimau-2.png" class="slides" style="width: 100%;">

            <button id="slides-kiri" class="btn btn-success" onclick="plusDivs(-1)">
                <img src="aset/panah.svg" style="transform: scale(-1);">
            </button>

            <button id="slides-kanan" class="btn btn-success" onclick="plusDivs(+1)">
                <img src="aset/panah.svg">
            </button>
        </div>

        <div id="bagian-grid-galeri" class="d-flex flex-wrap justify-content-center">
            <img src="aset/x1/burung-3.png">
            <img src="aset/x1/kancil.png">
            <img src="aset/x1/gajah-1.png">
            <img src="aset/x1/burung-1.png">
            <img src="aset/x1/kudanil.png">
            <img src="aset/x1/orangutan.png">
            <img src="aset/x1/penyu.png">
            <img src="aset/x1/komodo.png">
        </div>
            

        <script>
            var slideIndex = 1;
            showDivs(slideIndex);
            
            function plusDivs(n) {
              showDivs(slideIndex += n);
            }
            
            function showDivs(n) {
              var i;
              var x = document.getElementsByClassName("slides");
              if (n > x.length) {slideIndex = 1}
              if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              x[slideIndex-1].style.display = "block";  
            }
        </script>
    </div>
@endsection