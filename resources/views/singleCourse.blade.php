@extends('layouts.front')
@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">{{ $course->title }}</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">{{ $course->title }}</p>
            </div>
            {{-- <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Courses 1</a>
                            <a class="dropdown-item" href="#">Courses 2</a>
                            <a class="dropdown-item" href="#">Courses 3</a>
                        </div>
                    </div>
                    <input type="text" class="form-control border-light" style="padding: 30px 25px;"
                        placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Header End -->


    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Course Detail
                            </h6>
                            <h1 class="display-4">{{ $course->title }}</h1>
                        </div>
                        <img class="img-fluid rounded w-100 mb-4"
                            src="{{ asset('images/courses/' . $course->header_image) }}" alt="Image">
                        <p>{{ $course->description }}</p>
                    </div>
                    <div class="mt-2 mb-2">
                        <h3>Preview lessons</h3>
                        @foreach ($previewedLessons as $lesson)
                            <div class="card p-3 mb-1 bg-primary text-light  ">
                                <div class="chard-body d-flex justify-content-between">
                                    {{ $lesson->title }}
                                    <a href="" data-toggle="modal" data-target="#modal-{{ $lesson->media->id }}">
                                        <i class="fas fa-play text-light"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <h2 class="mb-3">Related Courses</h2>
                    <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="detail.html">
                            <img class="img-fluid" src="img/courses-1.jpg" alt="">
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3">Web design & development courses for
                                    beginners</h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i
                                                class="fa fa-user mr-2"></i>{{ $course->instructor->name }}</span>
                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                            <small>(250)</small></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="detail.html">
                            <img class="img-fluid" src="img/courses-2.jpg" alt="">
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3">Web design & development courses for
                                    beginners</h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                            <small>(250)</small></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="detail.html">
                            <img class="img-fluid" src="img/courses-3.jpg" alt="">
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3">Web design & development courses for
                                    beginners</h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i class="fa fa-user mr-2"></i>Jhon Doe</span>
                                        <span class="text-white"><i class="fa fa-star mr-2"></i>4.5
                                            <small>(250)</small></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Course Features</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Instructor</h6>
                            <h6 class="text-white my-3">{{ $course->instructor->name }}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Rating</h6>
                            <h6 class="text-white my-3">4.5 <small>(250)</small></h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Lectures</h6>
                            <h6 class="text-white my-3">{{ $course->lessons_count }}</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Sections</h6>
                            <h6 class="text-white my-3">{{ $course->sections_count }}</h6>
                        </div>
                        <h5 class="text-white py-3 px-4 m-0">Course Price: {{ $course->price }}</h5>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" data-target="#exampleModal"
                                data-toggle="modal">Enroll
                                Now</a>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h2 class="mb-3">Categories</h2>
                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <a href="" class="text-decoration-none h6 m-0">{{ $category->name }}</a>
                                    <span class="badge badge-primary badge-pill">{{ $category->courses_count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-5">
                        <h2 class="mb-4">Recent Courses</h2>
                        @foreach ($relatedCourses as $course)
                            <a class="d-flex align-items-center text-decoration-none mb-4" href="">
                                <img class="img-fluid rounded" src="img/courses-80x80.jpg" alt="">
                                <div class="pl-3">
                                    <h6>{{ $course->title }}</h6>
                                    <div class="d-flex">
                                        <small class="text-body mr-3"><i
                                                class="fa fa-user text-primary mr-2"></i>{{ $course->instructor->name }}</small>
                                        <small class="text-body"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            (250)
                                        </small>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->


    {{-- payment modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="myform" action="{{ route('payment.credit', $course->id) }}" method="post">
                        @csrf
                        <a href="javascript: submitform()">
                            <img src="{{ asset('assets/img/master.png') }}" alt="" width="200px"
                                height="200px">
                        </a>
                    </form>
                    <a href="">
                        <img src="{{ asset('assets/img/voda-cash.png') }}" alt="" width="200px"
                            height="200px">
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end payment modal --}}




    {{-- video modal --}}
    @foreach ($previewedLessons as $lesson)
        <div class="modal fade" id="modal-{{ $lesson->media->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $lesson->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="Geeks3" width="450" height="350"
                            src="https://coursea.s3.amazonaws.com/{{ $lesson->media->name }}" frameborder="0"
                            allowfullscreen>
                        </iframe>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- end video modal --}}
@endsection

@section('js')
    <script type="text/javascript">
        function submitform() {
            document.myform.submit();
        }
    </script>
@endsection
