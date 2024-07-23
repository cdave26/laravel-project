<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Who to follow</h5>
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{ route("user.show", $user->id) }}"><img height="50px" class="avatar-img rounded-circle"
                            src="{{ $user->getImageUrl() }}" alt=""></a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="{{ route("user.show", $user->id) }}">{{ $user->name }}</a>
                    <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                </div>
                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                        class="fa-solid fa-plus">
                    </i></a>
            </div>
        @endforeach
    </div>
</div>
