@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="container-fluid">
                <h1 class="text-center mt-2">{{ $lesson->title }}</h1>
            </div>
            <div class=" d-flex mt-3 justify-content-end mb-5">
                <a href="#starter-kit" class="btn btn-primary" data-toggle="modal" data-target="#editLesson">
                    <div class="">
                        <span>edit lesson</span>
                    </div>
                </a>

            </div>



            <div class="text-center">

                <iframe id="Geeks3" width="1280" height="720"
                    src="https://coursea.s3.amazonaws.com/{{ $lesson->media->name }}" frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
















    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="editLesson"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit lesson</h5>
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
                    <form action="{{ route('instructor.update_lesson', [$lesson->id]) }}" class="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $lesson->title }}" class="form-control">
                        </div>

                        <div class="form-group d-flex m-auto">
                            <label for="" class="label mr-2">Preview</label>
                            <label class="switch s-icons s-outline s-outline-primary mr-2">
                                <input type="checkbox" name="is_preview" @if ($lesson->is_preview) checked @endif>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Discard</button>
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
