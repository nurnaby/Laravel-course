<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"> Create blog category</h5>

        <div class="panel-body mt-5">
            <form class="form-horizontal" action="{{ route('blogCategory.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="content-group mt-10">

                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="userName">Category Name</label>
                        <div class="col-lg-10">
                            <input type="text" id="userName" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="userName">Status</label>
                        <div class="col-lg-10">
                            <select name="valid" id="" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">in Active</option>

                            </select>
                        </div>
                    </div>

                </fieldset>
                {{-- <div class="text-right">
                    <button type="submit" class="btn btn-primary" name="saveBanner">Submit</button>
                    <a href="{{ route('blogCategory.index') }}" class="btn btn-default ml-5">Back to List</a>
                </div> --}}
            </form>
        </div>

    </div>



</div>
