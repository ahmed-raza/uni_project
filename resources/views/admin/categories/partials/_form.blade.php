<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="categoryModalLabel">{{ $title }}</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="recipient-name" class="control-label">Name:</label>
          <input type="text" class="form-control" id="category-name" name="name" value="{{ $edit ? $cattegory->name : '' }}" required=true>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="{{ $title }}">
      </div>
    </div>
  </div>
</div>
