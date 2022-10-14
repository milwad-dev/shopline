<div class="col-xl-12">
    <div class="review-title">
        <h4 class="fw-500">Add a review</h4>
    </div>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
        <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">
        <div class="row g-4">
            <div class="col-12">
                <div class="form-floating theme-form-floating">
                    <textarea class="form-control @error('body') is-invalid @enderror"
                              placeholder="Leave a comment here"
                              id="body"
                              name="body"
                              style="height: 150px"
                    ></textarea>
                    <label for="body">Write Your Comment</label>
                    <x-share-error name="body"></x-share-error>
                </div>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-success border-1px-solid">Save</button>
            </div>
        </div>
    </form>
</div>
