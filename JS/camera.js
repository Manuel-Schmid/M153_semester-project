//Creating the camera Object
const webcamElement = document.getElementById('webcam');
const canvasElement = document.getElementById('canvas');
const snapSoundElement = document.getElementById('snapSound');
const webcam = new Webcam(webcamElement, 'user', canvasElement, snapSoundElement);
let picture

//Starting the camera
try{
    webcam.start();
    console.log("camera started");
}
catch (error){
    console.log(error);
}

function takeAPicture() {
    picture = webcam.snap();
    console.log(picture);
    document.querySelector("a").href = picture;
}

function reshoot(){
    document.getElementById("canvas").set(null);
}

function stop(){
    webcam.stop();
}



