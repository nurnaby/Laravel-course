<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Blog Category updadte</h5>

        <div class="panel-body mt-5">
            <form class="form-horizontal" action="{{ route('blogCategory.update', $blogCategoryInfo->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset class="content-group mt-10">

                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="userName">User Name</label>
                        <div class="col-lg-10">
                            <input type="text" id="userName" class="form-control" name="name"
                                value="{{ $blogCategoryInfo->name }}">
                        </div>
                    </div>

                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="userName">Status</label>
                        <div class="col-lg-10">
                            <select name="valid" id="" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1" @if ($blogCategoryInfo->valid == 1) selected @endif>Active</option>
                                <option value="0" @if ($blogCategoryInfo->valid == 0) selected @endif>in Active
                                </option>

                            </select>
                        </div>
                    </div>

                </fieldset>

            </form>
        </div>

    </div>



</div>
