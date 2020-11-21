<a href="/owners/{{ $owner->id }}" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
       {{--  @if(count($owners) > 1)
        @foreach ($owners as $owner) --}}
        {{-- output the owner fullname method --}}
        <h5 class="mb-1">{{ $owner->fullName() }}</h5>

        {{-- use the relativeDate() method --}}
    {{--  <small>{{ $owner->relativeDate() }}</small>--}}
    </div> 

    {{-- output the owner's full address method --}}
    <p class="mb-1">{{ $owner->fullAddress() }}</p>
    {{-- @endforeach
    @else
    "No owners found"
    @endif --}}

    
</a>