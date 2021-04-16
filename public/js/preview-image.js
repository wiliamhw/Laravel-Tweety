let input = document.getElementById("image_tweet");
let output = document.getElementById("output-image");

input.addEventListener("change", function () {
    let reader = new FileReader();
    reader.onload = function () {
        output.src = reader.result;
    };
    output.style.display = "block";
    reader.readAsDataURL(input.files[0]);
});
