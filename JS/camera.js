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

function button_clicked(){
    document.getElementById("btn_retake").innerHTML = '<button onclick="">Erneut aufnehmen</button>';
}

function start(){
    //some other html/css shit here
    takeAPicture();
}

