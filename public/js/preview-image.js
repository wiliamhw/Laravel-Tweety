let input, button, output;

function initialize(inputId, buttonId, outputId) {
    input = document.getElementById(inputId);
    button = document.getElementById(buttonId);
    output = document.getElementById(outputId);
}

function openPreview(inputId, buttonId, outputId) {
    initialize(inputId, buttonId, outputId);
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
