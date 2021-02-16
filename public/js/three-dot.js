let isClose = true;
let active_element;

function changeColor(curr, color) {
    let dots = curr.getElementsByClassName("dot");
    for (let i = 0, len = dots.length; i < len; i++) {
        dots[i].style.fill = color;
    }
}

function openOrClose(curr) {
    active_element = isClose
        ? curr.getElementsByClassName("options-menu")
        : active_element;

    active_element[0].style.display = isClose ? "block" : "none";

    isClose = !isClose;
}
