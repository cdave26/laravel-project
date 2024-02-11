<h4> Share yours ideas </h4>
<form action="{{route('idea.create')}}" method="post">
    @csrf
    <div class="row">
        <div class="mb-3">
            <textarea name="content" class="form-control" id="idea" rows="3"></textarea>
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </div>
</form>