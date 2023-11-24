@extends('layout')

@section('content')
  <a class='home_button' href='/'>Home</a></br>

  <section class='py-4 text-center container'>
    <h1 class='fw-light'>Picture {{$image_id}}</h1>

    @if($image_id > 1) 
      <a class='btn' href='/image/{{ $image_id - 1 }}'>&laquo; Previous Picture</a>
    @endif

    @if($image_id < 30)
      <a class='btn' href='/image/{{ $image_id + 1 }}'>Next Picture &raquo;</a>
    @endif 
  </section>

  <img class='img_large' width='40%' height='auto' src="https://picsum.photos/id/{{ $image_id + config('constants.image_offset') }}/1000/1000"></img>

  <section class='vote_form'>
    <form method='post'>
      @csrf
      <legend><b>Vote for this image as your favourite</b></legend>
      <label for='voter_name'>Your name:</label>
      <input type='text' id='voter_name' name='name' maxlength='100'>
      <input type='hidden' name='image_id' value={{ $image_id }}>
      <input type='submit' value='This is my favourite'>
    </form>

    @if ($errors->any())
      <br>
      <div class='alert alert-danger'>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

  </section>

@endsection
