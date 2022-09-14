<div class=" d-flex mt-5 justify-content-end">
    <a href="#starter-kit" class="btn btn-primary" data-toggle="modal" data-target="#addNewCourse">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus-circle">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16">
                </line>
                <line x1="8" y1="12" x2="16" y2="12">
                </line>
            </svg>
            <span>Add new Course</span>
        </div>

    </a>

</div>



{{-- add new course --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="addNewCourse"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add new Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('instructor.add_course', auth()->id()) }}" class="form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="form-control" style="resize: none">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for=""> Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>

                    <div class="form-group">
                        <label for=""> Header Image</label>
                        <input type="file" class="form-control" name="header_image">
                    </div>



                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- end new course --}}
