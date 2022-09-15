@extends('layouts.app')
<title>{{ $course->title }}</title>

@section('css')
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="container-fluid">
                <h1 class="text-center mt-2">{{ $course->title }}</h1>
            </div>
            <div class=" d-flex mt-5 justify-content-end mb-5">
                <a href="#starter-kit" class="btn btn-primary" data-toggle="modal" data-target="#addNewCourse">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-plus-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16">
                            </line>
                            <line x1="8" y1="12" x2="16" y2="12">
                            </line>
                        </svg>
                        <span>Add new Section</span>
                    </div>

                </a>

            </div>




            {{-- add sectoin modal --}}

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="addNewCourse"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Add new Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('instructor.add_section', $course->id) }}" class="form" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control">
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
            {{-- end add section --}}


            {{-- edit section --}}
            @foreach ($sections as $section)
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    id="editSection-{{ $section->id }}" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Add new Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('instructor.update_section', [$section->id]) }}" class="form"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" value="{{ $section->title }}"
                                            class="form-control">
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
                {{-- end edit section --}}
            @endforeach

            <div id="sections">

                @foreach ($sections as $section)
                    <div class="card" data-key="{{ $section->id }}">
                        <div class="card-header bg-primary " id="...">
                            <section class="mb-0 mt-0">
                                <div role="menu" class="collapsed text-light d-flex justify-content-between"
                                    data-toggle="collapse" data-target="#defaultAccordion-{{ $loop->index }}"
                                    aria-expanded="true" aria-controls="defaultAccordion-{{ $loop->index }}">
                                    {{ $section->title }}
                                    <div class="">
                                        <button class="btn btn-success" data-toggle="modal"
                                            data-target="#editSection-{{ $section->id }}">Edit</button>
                                        <button class="btn btn-danger">delete</button>
                                    </div>
                                </div>
                            </section>
                        </div>

                        {{-- add lesson modal --}}
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                            id="addLessonModal-{{ $section->id }}" aria-labelledby="myLargeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Add new lesson</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('instructor.upload_lesson') }}" class="form"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control">
                                            </div>

                                            <div class="form-group d-flex m-auto">
                                                <label for="" class="label mr-2">Preview</label>
                                                <label class="switch s-icons s-outline s-outline-primary mr-2">
                                                    <input type="checkbox" name="is_preview">
                                                    <span class="slider"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" value="{{ $section->id }}" name="section_id">
                                            <input type="hidden" value="{{ $course->id }}" name="course_id">

                                            <div class="form-group" id="form">
                                                <label for="">Video</label>
                                                <input type="file" class="form-control file-upload" name="video">
                                            </div>
                                            <div class="progress br-30">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-title">%</div>
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i
                                                        class="flaticon-cancel-12"></i>
                                                    Discard</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end lesson modal --}}

                        <div id="{{ $loop->index }}" class="" aria-labelledby="..."
                            data-parent="#toggleAccordion">
                            <div class="card-header m-2 d-flex justify-content-end">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#addLessonModal-{{ $section->id }}">Add
                                    Lesson</button>
                            </div>

                            <div class="card-body" id="lessons-{{ $section->id }}">
                                @foreach ($section->lessons->sortBy('order') as $lesson)
                                    <div class="card" data-key="{{ $lesson->id }}">
                                        <div class="card-body">
                                            {{ $lesson->title }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('assets/js/components/ui-accordions.js') }}"></script>
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script type="text/javascript">
        var SITEURL = "{{ URL('instructor/courses/course/') }}";
        $(function() {
            $(document).ready(function() {
                var bar = $('.progress-bar');
                var percent = $('.progress-title');
                $('form').ajaxForm({
                    beforeSend: function() {
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete - 5 + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                        // alert('File Has Been Uploaded Successfully');
                        window.location.href = SITEURL + "/" + {{ $course->id }};
                    }
                });
            });
        });
    </script>
    <script>
        var sortable = new Sortable(sections, {
            onEnd: function(e) {
                var items = e.to.children;
                var result = [];
                for (var i = 0; i < items.length; i++) {
                    result.push($(items[i]).data('key'));
                }

                $.ajax({

                    type: 'GET',

                    url: "{{ route('instructor.reorder_sections') }}",

                    data: {
                        ordering: result,

                    },
                    success: function() {
                        console.log('done');
                    },
                    error: function() {
                        console.log('error');
                    }

                });

            }
        });
        var sectionsId = [
            @foreach ($sections as $i)
                [{{ $i->id }}],
            @endforeach
        ];


        sectionsId.forEach(function(id) {



            new Sortable.create(document.getElementById(''.concat('lessons-', id)), {
                onEnd: function(e) {
                    var items = e.to.children;
                    console.log(items);
                    var result = [];
                    for (var i = 0; i < items.length; i++) {
                        result.push($(items[i]).data('key'));
                    }
                    $.ajax({

                        type: 'GET',

                        url: "{{ route('instructor.reorder_lessons') }}",

                        data: {
                            ordering: result,

                        },
                        success: function() {
                            console.log('done');
                        },
                        error: function() {
                            console.log('error');
                        }

                    });

                }
            });
        });
    </script>
@endsection
