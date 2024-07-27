@extends("layout.layout")
@section("title", "Admin Dashboard User")
@section("content-section")
    <div class="row">
        <div class="col-3">
            @include("admin.shared.left-sidebar")
        </div>
        <div class="col-9">
            <h1>Admin Dashboard</h1>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    @include("shared.widgets", [
                        "title" => "Total Users",
                        "icon" => "fa fa-users",
                        "data" => $totalUsers,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include("shared.widgets", [
                        "title" => "Total Ideas",
                        "icon" => "fa fa-lightbulb",
                        "data" => $totalIdea,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include("shared.widgets", [
                        "title" => "Total Comments",
                        "icon" => "fa fa-comment",
                        "data" => $totalComments,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
