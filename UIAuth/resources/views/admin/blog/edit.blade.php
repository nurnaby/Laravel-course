<div class="panel panel-flat">
    <div class="panel-heading">
        <div class="panel-body mt-5">
            <form class="form-horizontal" action="{{ route('blog.update', $blogInfo->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset class="content-group mt-10">

                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="userName">Category</label>
                        <div class="col-lg-10">
                            <select name="category" id="" class="form-control">
                                <option value="">Select Status</option>
                                @foreach ($blogCategories as $blogCategoy)
                                    <option value="{{ $blogCategoy->id }}"
                                        @if ($blogCategoy->id == $blogInfo->category) selected @endif>{{ $blogCategoy->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="title">Title</label>
                        <div class="col-lg-10">
                            <input type="text" id="title" class="form-control" name="title"
                                value="{{ $blogInfo->title }}">
                        </div>
                    </div>

                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="subTitle">Description</label>
                        <div class="col-lg-10">
                            <input type="text" id="subTitle" class="form-control" name="description"
                                value="{{ $blogInfo->description }}">
                        </div>
                    </div>
                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="subTitle">Thumbnail</label>
                        <div class="col-lg-10">
                            <input type="file" id="subTitle" class="form-control" name="thumbnail"
                                value="{{ $blogInfo->thumbnail }}">
                            <img class="img-fluid" height="120px" width="150px"
                                src="{{ asset('upload/blogTham/' . $blogInfo->thumbnail) }}" alt="">
                        </div>
                    </div>

                    <div class="form-group mt-10">
                        <label class="control-label col-lg-2" for="userName">Status</label>
                        <div class="col-lg-10">
                            <select name="valid" id="" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1" @if ($blogInfo->valid == 1) selected @endif>Active</option>
                                <option value="0" @if ($blogInfo->valid == 0) selected @endif>in Active
                                </option>

                            </select>
                        </div>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
</div>
