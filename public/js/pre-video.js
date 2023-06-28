function previewVideo() {
    const video = document.querySelector('#video');
    const videoPreview = document.querySelector('.video-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(video.files[0]);

    oFReader.onload = function(oFREvent) {
        videoPreview.src = oFREvent.target.result;
    }
}