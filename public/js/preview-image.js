let input, button, output;

function initialize() {
    input = document.getElementById("image_tweet");
    button = document.getElementById("close-btn");
    output = document.getElementById("output-image");
}

function openPreview() {
    initialize();
    let reader = new FileReader();
    reader.onload = function () {
        output.src = reader.result;
    };
    button.style.display = "block";
    output.style.display = "block";
    reader.readAsDataURL(input.files[0]);
}

function closePreview() {
    input.value = "";
    output.src = "";
    button.style.display = "none";
    output.style.display = "none";
}
