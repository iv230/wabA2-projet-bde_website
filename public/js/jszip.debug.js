function download_images_into_zip() {
    var zip = new JSZip();

// Generate a directory within the Zip file structure
    var imgEvents = zip.folder("imagesEvents");
    var imgUsers = zip.folder('imagesUsers');

// Add a file to the directory, in this case an image with data URI as contents
    imgEvents.file('/img/events');
    imgUsers.file('/img/eventsUser');

// Generate the zip file asynchronously
    zip.generateAsync({type: "blob"})
        .then(function (content) {
            // Force down of the Zip file
            saveAs(content, "images.zip");
        });
}
