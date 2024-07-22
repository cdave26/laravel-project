@extends("layout.layout")
@section("title", $user->name)
@section("content-section")
    <div class="row">
        {{-- <div class="d-flex">
            @foreach ($users as $user)
                <p>{{$user['name']}}</p><p>{{$user['age']}}</p>
            @endforeach
            </div>
         --}}

        <div class="col-3">
            @include("shared.left-sidebar")
        </div>
        <div class="col-6">
            @include("shared.success-message")
            <hr>
            <div class="mt-3">
                @include("user.shared.user-card")
            </div>
            <hr>
            @forelse ($ideas as $idea)
                @include("ideas.shared.idea-card")
            @empty
                <p>No Results found!</p>
            @endforelse
        </div>
        <div class="col-3">
            @include("shared.search-bar")
            @include("shared.follow-box")
        </div>
    </div>
@endsection
