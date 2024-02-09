<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropzone Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>

<body>
    <div class="container">
        <div style="display: grid; justify-content: center;">
            <div class="card my-5">
                <div class="card-header">Dropzone Example</div>
                <div class="card-body">
                    <form id="upload-form" class="dropzone" action="{{ route('upload') }}" style="border: none;">
                        @csrf
                        <!-- this is were the previews should be shown. -->

                        <!-- Now setup your input fields -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" />
                        </div>
                        <div class="dropzone-drag-area form-control my-5" id="previews">
                            <div class="dz-message text-muted opacity-50 dropzoneClick" data-dz-message>
                                <span>Drag file here to upload</span>
                            </div>
                            <div class="d-none" id="dzPreviewContainer">
                                <div class="dz-preview dz-file-preview">
                                    <div class="dz-photo dz-detail">
                                        <div class="dz-thumbnail">
                                            <img data-dz-thumbnail src="">
                                            <div class="dz-success-mark"></div>
                                            <div class="dz-error-mark"></div>
                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                            <div class="progress my-2">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                    aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                        <div class="dz-success-mark"></div>
                                        <div class="dz-error-mark"></div>
                                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                    </div>
                                    <div class="dz-filename" data-dz-name></div>
                                    <div class="dz-size" data-dz-size></div>
                                </div>
                            </div>
                        </div>
                        <div class="invalid-feedback fw-bold">Please upload an image.</div>
                        <div class="form-group py-4">
                            <button class="btn btn-primary" type="submit">Submit data and files!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.uploadForm = { // The camelized version of the ID of the form element

            // The configuration we've talked about above
            previewTemplate: $('#dzPreviewContainer').html(),
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            acceptedFiles: '.jpeg, .jpg, .png, .gif',
            thumbnailWidth: 200,
            thumbnailHeight: 200,
            clickable: '.dropzoneClick',
            previewsContainer: "#previews",


            // The setting up of the dropzone
            init: function() {
                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("sendingmultiple", function() {
                    // Gets triggered when the form is actually being sent.
                    // Hide the success button or the complete form.
                });
                this.on("successmultiple", function(files, response) {
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                });
                this.on("errormultiple", function(files, response) {
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                });
            }

        }
    </script>

</body>

</html>
