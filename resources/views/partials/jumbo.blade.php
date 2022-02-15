@if ($title === "Home")
<div id="jumbotron-1" class="container text-light">
<h1 class="fw-bold text-capitalize display-3">{!! $jumbojudul !!}</h1>
    <p>{!! $jumboisi !!}</p>
</div>
@else
<div id="jumbotron-2" class="container text-light">
    <h1 class="fw-bold text-capitalize display-3">{!! $jumbojudul !!}</h1>
    <p>{!! $jumboisi !!}</p>
</div>
@endif



