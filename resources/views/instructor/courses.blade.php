@extends('layouts.app')
<title>Courses</title>
@section('css')
    <link href="{{ asset('assets/css/apps/notes.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
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



    <div id="content" class="main-content">
        <div class="layout-px-spacing">


            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="page-header mb-4">
                        <nav class="breadcrumb-one">
                            <div class="title">
                                <h3>Courses</h3>
                            </div>

                        </nav>


                    </div>

                    <div class="row app-notes layout-top-spacing" id="cancel-row">
                        <div class="col-lg-12">
                            <div class="app-hamburger-container">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-menu chat-menu d-xl-none">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg></div>
                            </div>

                            <div class="app-container">

                                <div class="app-note-container">

                                    <div class="app-note-overlay"></div>

                                    <div class="tab-title">
                                        <div class="row">


                                        </div>
                                    </div>

                                    <div id="ct" class="note-container note-grid mb-5">
                                        @foreach ($courses as $course)
                                            <div class="card m-2 col-xs-4" style="width: 18rem;">
                                                <img class="card-img-top"
                                                    src="@if (isset($course->header_image)) {{ asset('images/courses/' . $course->header_image) }} @else {{ asset('assets/img/200x200.jpg') }} @endif"
                                                    height="200px" width="200px" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->title }}</h5>
                                                    <p class="card-text">{{ $course->description }}</p>
                                                    <a href="{{ route('instructor.view_course', $course->id) }}"
                                                        class="btn btn-primary">view course</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>

                </div>

            </div>
        @endsection
