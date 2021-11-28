<div class="card" id="-edit">
    <div class="card-header d-flex justify-content-center">
        <h2>Add </h2>
    </div>
    <form id="updateForm" enctype="multipart/form-data">@csrf  @method('put')
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name"   class="form-control"><br>
                <span id="Ername" class="text-danger"><i></i></span>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="image" class="form-control"><br>
                <span id="Erimage" class="text-danger"><i></i></span>
                <div id="img">

                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" id="address"  class="form-control"><br>
                <span id="Eraddress" class="text-danger"><i></i></span>
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="mobile" id="mobile"   class="form-control"><br>
                <span id="Ermobile" class="text-danger"><i></i></span>
            </div>
            <input type="text" id="id" name="id">
        </div>
        <div class="card-footer">
            <div class="form-group d-flex justify-content-center">

                <button  type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</div>
