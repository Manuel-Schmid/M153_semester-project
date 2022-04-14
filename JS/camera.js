const webcamElement = document.getElementById('webcam');
const canvasElement = document.getElementById('canvas');
const webcam = new Webcam(webcamElement, 'user', canvasElement);
webcam.start();

function takeAPicture() {
    let picture = webcam.snap();
    console.log(picture);
    console.log("works");
    document.querySelector("a").href = picture;
}

