<div class="card mt-5">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt=" {{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route("user.show", $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route("ideas.destroy", $idea->id) }}">
                    @csrf
                    @method("delete")
                    @if (auth()->id() == $idea->user->id)
                        <a href="{{ route("ideas.edit", $idea->id) }}">Edit</a>
                    @endif
                    <a href="{{ route("ideas.show", $idea->id) }}">view</a>
                    @if (auth()->id() == $idea->user->id)
                        <button class="btn btn-danger btn-sml">x</button>
                    @endif
                </form>

            </div>
        </div>
    </div>

    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route("ideas.update", $idea->id) }}" method="post">
                @csrf

                @method("put")

                <div class="row">
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                        @error("content")
                            <span class="fs-6 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type='submit' class="btn btn-dark"> Update </button>
                    </div>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif

        <div class="d-flex justify-content-between">
            @include("ideas.shared.like-button")
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{-- another option method for date "toDateString()" --}}
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include("shared.comments-box")
    </div>
</div>
