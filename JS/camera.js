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

function base64toBlob(base64Data, contentType) {
    contentType = contentType || '';
    let sliceSize = 1024;
    let byteCharacters = atob(base64Data);
    let bytesLength = byteCharacters.length;
    let slicesCount = Math.ceil(bytesLength / sliceSize);
    let byteArrays = new Array(slicesCount);

    for (let sliceIndex = 0; sliceIndex < slicesCount; ++sliceIndex) {
        let begin = sliceIndex * sliceSize;
        let end = Math.min(begin + sliceSize, bytesLength);

        let bytes = new Array(end - begin);
        for (let offset = begin, i = 0; offset < end; ++i, ++offset) {
            bytes[i] = byteCharacters[offset].charCodeAt(0);
        }
        byteArrays[sliceIndex] = new Uint8Array(bytes);
    }
    return new Blob(byteArrays, { type: contentType });
}

function takeAPicture() {
    document.getElementById("btnReTakePic").style.visibility="visible";
    document.getElementById("btnTakePic").style.visibility="hidden";
    document.getElementById("btnSubmit").style.visibility="visible";
    picture = webcam.snap();

    console.log(picture)

    // let b64Str = picture.slice(22)
    // let blob = base64toBlob(b64Str, 'image/png')
    // console.log(blob)

    // document.getElementById('picture').value = blob;
    document.getElementById('picture').value = picture;


    // console.log(picture);
    // sessionStorage.setItem("picture", picture);
    // document.querySelector("a").href = picture;
}

function setPicture(){
    console.log(picture)
    document.getElementById('picture').value = picture;
    // document.getElementById('testImg').src = picture;
    // document.getElementById('submitPicture').click();

    // let formData = new FormData();
    // formData.append("pictureJS", picture);
    // let xhr = new XMLHttpRequest();
    // xhr.open('POST', "../registration.php", true);
    // xhr.send(formData);

    // window.location.href = 'registration.php';
}



