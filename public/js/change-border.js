function changeBorder(id, status) {
    let target = document.getElementById(id);
    if (status === "in") {
        target.classList.remove("border-gray-800");
        target.classList.add("border-blue-600");
        target.style.boxShadow = "rgb(29 161 242) 0 0 0 1px";
    } else {
        target.classList.remove("border-blue-600");
        target.classList.add("border-gray-800");
        target.style.boxShadow = "";
    }
}
