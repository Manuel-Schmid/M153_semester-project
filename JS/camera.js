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

function reshoot_pic() {
    const context = document.getElementById("canvas").getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);
}

function reshoot(){
    const context = document.getElementById("canvas").getContext('2d');
    console.log(document.getElementById("canvas"));
    context.clearRect(0, 0, canvas.width, canvas.height);
}

function takeAPicture() {
    picture = webcam.snap();
    console.log(picture);
    // document.querySelector("a").href = picture;
}



