let curr = null;
let allow = false;
let className = "menu shadow";
let childName = "content";

function changeColor(_curr, color) {
    let dots = _curr.getElementsByClassName("dot");
    for (let i = 0, len = dots.length; i < len; i++) {
        dots[i].style.fill = color;
    }
}

function dropDown(_curr) {
    if (curr != null) return;

    curr = _curr;
    let x = curr.getElementsByClassName("menu")[0];
    if (x.className === className) {
        x.className += " show";
    }
    allow = false;
}

// Dropdown menu auto-close
(function () {
    // Get click position
    window.onclick = function (e) {
        if (curr == null) return;
        if (!allow) {
            allow = true;
            return;
        }

        let x = curr.getElementsByClassName("menu")[0];

        e = e || window.event;
        let target = e.target;
        let text = target.className;

        if (
            text !== childName &&
            text !== className + " show" &&
            x.className === className + " show"
        ) {
            x.className = className;
            curr = null;
        }
    };
})();
