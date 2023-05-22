import './bootstrap';
import * as bootstrap from 'bootstrap';
import '~resources/scss/app.scss';
import.meta.glob([
    '../img/**'
])
/* Mostra anteprima download */
const imageInputBox= document.getElementById('image-input-box');
const imageInput = document.getElementById('image');
const setImageInput = document.getElementById('set_image');

imageInput.addEventListener('change', showPreview);
setImageInput.addEventListener('change', function(){
    if(setImageInput.checked){
        imageInputBox.classList.remove('d-none');
        imageInputBox.classList.add('d-block');
    } else {
        imageInputBox.classList.remove('d-block');
        imageInputBox.classList.add('d-none');
    }
});

function showPreview(event) {
    if (event.target.files.length > 0) {
        const src = URL.createObjectURL(event.target.files[0]);
        const preview = document.getElementById('file-image-preview');
        preview.src = src;
        preview.style.display = "block";
    }
}
