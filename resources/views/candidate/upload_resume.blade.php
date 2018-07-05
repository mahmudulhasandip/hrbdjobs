@extends('candidate.layout.app')

@section('title', 'HRBDJobs | Candidate Dashboard')

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(/images/top-bg.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Welcome {{ Auth::user()->fname.' '. Auth::user()->lname}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container">
                 <div class="row no-gape">
                    <aside class="col-lg-3 column border-right">
                        <div class="widget" id="sidebar">
                            @include('candidate.layout.sidebar')
                        </div>
                        
                    </aside>
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <div class="border-title"><h3>My Resume</h3></div>
                                    <section>
                                        <form class="cv-upload" method="post" action="{{ route('candidate.resume.upload') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div id="file-upload-form" class="uploader">
                                                <input id="file-upload" type="file" name="resume" />

                                                <label for="file-upload" id="file-drag">
                                                    <div id="file-image" alt="Preview" class=""></div>
                                                    <div id="start">
                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                    <div>Select your CV or drag here</div>
                                                    <div id="notimage" class="hidden">Please select your CV</div>
                                                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                                    </div>
                                                    <div id="response" class="hidden">
                                                    <div id="messages"></div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="text-center btn">Upload</button>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('input[type=file]').change(function() {
                //console.log(this.files);
                var f = this.files;
                var el = $(this).parent();
                if (f.length > 1) {
                        console.log(this.files, 1);
                        el.text('Sorry, multiple files are not allowed');
                        return;
                }
                // el.removeClass('focus');
                $('#messages').html(f[0].name + '<br>' +
                        '<span class="sml">' +
                        'Type: ' + f[0].type + ', ' +
                        Math.round(f[0].size / 1024) + ' KB</span>');
        });

        $('input[type=file]').on('focus', function() {
                $(this).parent().addClass('focus');
        });

        $('input[type=file]').on('blur', function() {
                $(this).parent().removeClass('focus');
        });

    });

    function ekUpload(){
        function Init() {

            // console.log("Upload Initialised");

            var fileSelect    = document.getElementById('file-upload'),
                fileDrag      = document.getElementById('file-drag'),
                submitButton  = document.getElementById('submit-button');

            fileSelect.addEventListener('change', fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
              // File Drop
              fileDrag.addEventListener('dragover', fileDragHover, false);
              fileDrag.addEventListener('dragleave', fileDragHover, false);
              fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; f = files[i]; i++) {
              parseFile(f);
              //uploadFile(f);
            }
        }

        // Output
        function output(msg) {
            // Response
            var m = document.getElementById('messages');
            m.innerHTML = msg;
        }

        function parseFile(file) {

            console.log(file.name);
            output(
              '<strong>' + encodeURI(file.name) + '</strong>'
            );
            
            // var fileType = file.type;
            // console.log(fileType);
            var imageName = file.name;

            var isGood = (/\.(?=pdf|doc)/gi).test(imageName);
            if (isGood) {
              document.getElementById('start').classList.add("hidden");
              document.getElementById('response').classList.remove("hidden");
              document.getElementById('notimage').classList.add("hidden");
              // Thumbnail Preview
              document.getElementById('file-image').classList.remove("hidden");
              document.getElementById('file-image').src = URL.createObjectURL(file);
            }
            else {
              document.getElementById('file-image').classList.add("hidden");
              document.getElementById('notimage').classList.remove("hidden");
              document.getElementById('start').classList.remove("hidden");
              document.getElementById('response').classList.add("hidden");
              document.getElementById("file-upload-form").reset();
            }  
               
            $('#messages').html(file.name + '<br>' +
                        '<span class="sml">' +
                        'Type: ' + file.type + ', ' +
                        Math.round(file.size / 1024) + ' KB</span>');
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
              pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
              pBar.value = e.loaded;
            }
        }



        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    }
    ekUpload();
</script>

@endpush
