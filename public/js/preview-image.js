let input, button, output;
let temp = null;

function initialize(inputId, outputId, buttonId = null) {
    input = document.getElementById(inputId);
    if (buttonId) button = document.getElementById(buttonId);
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

function displayChange(
    inputId,
    backgroundID,
    buttonId = null,
    isBackground = true
) {
    initialize(inputId, backgroundID, buttonId);
    let reader = new FileReader();
    reader.onload = function () {
        if (isBackground) {
            if (!temp) temp = output.style.backgroundImage;
            output.style.backgroundImage = "url(" + reader.result + ")";
        } else output.src = reader.result;
    };
    if (button) button.style.display = "block";
    reader.readAsDataURL(input.files[0]);
}

function rollBackChange(inputId, backgroundID, buttonId) {
    initialize(inputId, backgroundID, buttonId);
    button.style.display = "none";
    output.style.backgroundImage = temp;
    temp = null;
    input.value = "";
}
