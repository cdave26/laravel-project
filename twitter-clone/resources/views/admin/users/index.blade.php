@extends("layout.layout")
@section("title", "Users Admin Dashboard")
@section("content-section")
    <div class="row">
        <div class="col-3">
            @include("admin.shared.left-sidebar")
        </div>
        <div class="col-9">
            <h1>Users </h1>

            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Permission</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin }}</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route("user.show", $user) }}">View</a>
                                <a href="{{ route("user.edit", $user) }}">Edit</a>
                                <a href="{{ route("user.edit", $user) }}">Delete</a>
                                @if ($user->is_admin)
                                    <a href="{{ route("user.show", $user) }}">Make as Normal User</a>
                                @else
                                    <form action="{{ route("admin.makeAdmin", $user) }}" method="POST">
                                        @csrf
                                        @method("POST")
                                        <a href="#"
                                            onclick="event.preventDefault(); this.closest('form').submit();">Make as
                                            admin</a>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
