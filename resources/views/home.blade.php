@extends('layout')

@section('content')

<section class='py-5 text-center container'>
  <h1 class='fw-light'>What's your favourite picture?</h1>
  <h2 class='fw-light'>Vote today!</h2>     
  <a href='/results' class='btn btn-primary my-2'>View all results</a>
</section>

<div class='album py-5 bg-light'>
  <div class='container'>
    <div class='row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3'>  
      @for($image_id = 1; $image_id <= config('constants.image_count'); $image_id++)
        <div class='col'>
          <a href='/image/{{ $image_id }}'>
            <img class='bd-placeholder-img card-img-top' src="https://picsum.photos/id/{{ $image_id + config('constants.image_offset') }}/225/225"></img>
          </a>  
        </div>
      @endfor
    </div>
  </div>
</div>
@endsection