@extends('layout')

@section('content')
<a class='home_button' href='/'>Home</a></br>

<section class='py-5 text-center container'>
  <h1 class='fw-light'>Voting results</h1>   
</section>

<table>
  <tr>
    <th><a href='/results/SortByName'>Name</a></th>
    <th><a href='/results/SortByImage'>Favourite Picture</th>
  </tr>

  @foreach($results as $record)
    <tr>
      <th>{{$record->name}}</th>
      <th><a href='/image/{{ $record->image_id }}'><img width='100' height='auto' src="https://picsum.photos/id/{{ $record->image_id + config('constants.image_offset') }}/100/100"></img></th>
    </tr>
  @endforeach

</table>

@endsection