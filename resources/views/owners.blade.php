
@extends("app")

@section("content")
  <div class="list-group">
    <h1>Registered owners :</h1>
    {{-- loop over all of the owners  --}}
    {{-- each owner object goes into $owner  --}}
    @foreach ($owners as $owner)
      {{-- {{ /* pass-through $owner as "owner" */ }}  --}}
      @include("_partials/owners/list-item", ["owner" => $owner])
    @endforeach
  </div>
@endsection







