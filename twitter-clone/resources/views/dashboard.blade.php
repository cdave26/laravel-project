@extends('layout.layout')
@section('content-section')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>
            <div class="mt-3">
                @forelse ($ideas as $idea)
                    @include('shared.idea-card')
                @empty
                    <p>No Results found!</p>
                @endforelse
                <div>
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
