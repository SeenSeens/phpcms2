<div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
        <form action="post.php?id=<?= $PostId; ?>" method="post" enctype="multipart/form-data" id="cmt">
            <div class="form-group">
                <label for="commentarea"><span class="FieldInfo">Comment:</span></label>
                <textarea  class="form-control" rows="3" placeholder="Write something here" id="commentarea" name="Comment"></textarea>
            </div>
            <button type="submit" name="comment" id="comment" class="btn btn-primary">Comments</button>
        </form>
    </div>
</div>