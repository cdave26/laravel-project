@extends('layout.layout')
@section('content-section')
    <div class="row">
        {{-- <div class="d-flex">
            @foreach ($users as $user)
                <p>{{$user['name']}}</p><p>{{$user['age']}}</p>
            @endforeach
            </div>
         --}}

        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>
            <div class="mt-3">
                @foreach ($ideas as $idea)
                    @include('shared.idea-card')
                @endforeach

                <div>
                    {{ $ideas->links() }}
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
