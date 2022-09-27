@extends('layouts.app')
<title>{{ $course->title }}</title>

@section('css')
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="container-fluid">
                <h1 class="text-center mt-2">{{ $course->title }}</h1>
            </div>


            <div id="sections">

                @foreach ($sections as $section)
                    <div class="card" data-key="{{ $section->id }}">
                        <div class="card-header bg-primary " id="...">
                            <section class="mb-0 mt-0">
                                <div role="menu" class="collapsed text-light d-flex justify-content-between"
                                    data-toggle="collapse" data-target="#defaultAccordion-{{ $loop->index }}"
                                    aria-expanded="true" aria-controls="defaultAccordion-{{ $loop->index }}">

                                    <h4 class="text-light">
                                        {{ $section->title }}
                                    </h4>
                                </div>
                            </section>
                        </div>


                        <div id="defaultAccordion-{{ $loop->index }}" class="collapse" aria-labelledby="..."
                            data-parent="#sections">


                            <div class="card-body" id="lessons-{{ $section->id }}">
                                @foreach ($section->lessons->sortBy('order') as $lesson)
                                    <div class="card d-flex" data-key="{{ $lesson->id }}">
                                        <div class="card-body d-flex justify-content-between">
                                            <span>
                                                {{ $lesson->title }}
                                            </span>

                                            <div class="">
                                                <a class="btn btn-success" href="" data-toggle="modal"
                                                    data-target="#modal-{{ $lesson->media->id }}">view</a>
                                            </div>
                                        </div>

                                    </div>

                                    @include('student.lessonModal')
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
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
    <script>
        var player = videojs('video', {
                    autoplay: 'muted',
                    videojs('laybackRates: [0.5, 1, 1.5, 2]

                    });
    </script>
@endsection
