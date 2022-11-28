let max_char = 280;

function resize(element = document.getElementById("profile_text")) {
    let info = document.getElementById(element.id + "-info");
    if (info) {
        let len = element.value.length;
        if (len === 0) {
            info.style.display = "none";
        } else {
            if (len > max_char) {
                element.value = element.value.substring(0, max_char);
                len = element.value.length;
            }
            info.style.display = "block";
            info.innerText = "Remaining characters: " + (max_char - len);
        }
    }
    element.style.height = "";
    element.style.height = element.scrollHeight + "px";
}
