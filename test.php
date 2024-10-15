<?php include('custheader.php'); ?>
<p><button id="start" onclick="start()">start camera!</button></p>

<div>
 <div style="float:left;margin-right:5px;">
  <p><video id="video-tag" width="240" height="180" autoplay=true/></p>
 </div>
 <div style="float:left">
  <p><img id="image-tag" width="240"> </img></p>
 </div>
</div>
  
<div style="width: 240px">
  <p><button onclick="takePhoto()">take photo</button></p>
</div>
<script>
const constraints =  { "video": { width: { exact: 320 }}};
var videoTag = document.getElementById('video-tag');
var imageTag = document.getElementById('image-tag');
var imageCapturer;

function start() {
  navigator.mediaDevices.getUserMedia(constraints)
    .then(gotMedia)
    .catch(e => { console.error('getUserMedia() failed: ', e); });
}

function gotMedia(mediastream) {
  videoTag.srcObject = mediastream;
  document.getElementById('start').disabled = true;
  
  var videoTrack = mediastream.getVideoTracks()[0];
  imageCapturer = new ImageCapture(videoTrack);
  
}

function takePhoto() {
  imageCapturer.takePhoto()
    .then((blob) => {
      console.log("Photo taken: " + blob.type + ", " + blob.size + "B")
      imageTag.src = URL.createObjectURL(blob);
    })
    .catch((err) => { 
      console.error("takePhoto() failed: ", e);
    });
}


</script>
