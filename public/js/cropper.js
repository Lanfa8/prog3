
const image = document.getElementById('img-crop');
const cropper = new Cropper(image, {
  crop(event) {

  },
});

document.querySelector("#cortar").addEventListener("submit", function(e){
    e.preventDefault();
    let dados = cropper.getCroppedCanvas().toDataURL('image/jpeg');
    document.querySelector("#img").value = dados
       
    this.submit()
});