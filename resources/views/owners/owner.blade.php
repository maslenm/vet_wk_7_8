@extends("app")

@section("content") 
    <div class="card">
        <h2 class="card-header">{{ $owner->fullName() }}</h2> 
        <article class="card-body">
            <p>Address: {{ $owner->fullAddress() }} </p>

            <p class="mb-1">Tel: {{ $owner->telephone }}</p>

            <p class="mb-1">Email: {{ $owner->email }}</p>
        </article>
    </div> 
@endsection