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
    document.getElementById("btnTakePic").style.visibility="visible";
    document.getElementById("btnReTakePic").style.visibility="hidden";
    document.getElementById("btnSubmit").style.visibility="hidden";
    const context = document.getElementById("canvas").getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);
}

function takeAPicture() {
    document.getElementById("btnReTakePic").style.visibility="visible";
    document.getElementById("btnTakePic").style.visibility="hidden";
    document.getElementById("btnSubmit").style.visibility="visible";
    picture = webcam.snap();
    console.log(picture);
    sessionStorage.setItem("picture", picture);
    // document.querySelector("a").href = picture;
}

function uploadPicture(){
    let formData = new FormData();
    formData.append("pictureJS", picture);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "../registration.php", true);
    xhr.send(formData);
}



