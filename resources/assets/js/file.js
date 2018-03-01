
Dropzone.options.uploadWidget = {
    paramName: 'file',
    maxFilesize: 2, // MB
    maxFiles: 1,
    dictDefaultMessage: 'Drag an image here to upload, or click to select one',
    headers: {
        'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
    },
    acceptedFiles: 'image/*',
    init: function () {
        this.hiddenFileInput.removeAttribute('multiple');

        this.on('success', function (file, resp) {
            console.log(file);
            console.log(resp);
        });

        this.on('addedfile', function (file) {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]);
            }
        });
    },
    accept: function (file, done) {
        file.acceptDimensions = done;
        file.rejectDimensions = function () {
            done('The image must be at least 640 x 480px')
        };
    }
};

