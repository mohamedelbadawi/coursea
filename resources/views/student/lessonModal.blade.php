<div class="modal fade" id="modal-{{ $lesson->media->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $lesson->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <video id="video" class="video-js vjs-big-play-centered" controls preload="auto"
                    width="1100" height="650" poster="{{ asset('images/courses/' . $course->header_image) }}"
                    data-setup="{}">
                    <source src="https://coursea.s3.amazonaws.com/{{ $lesson->media->name }}" type="video/mp4" />
                </video>


            </div>
            <div class="modal-footer">
                <button class="btn bg-danger text-light" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
        </div>
    </div>
</div>
