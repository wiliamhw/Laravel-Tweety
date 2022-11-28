function disableScroll() {
    // Get the current page scroll position
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    (scrollLeft = window.pageXOffset || document.documentElement.scrollLeft),
        // if any scroll is attempted, set this to the previous value
        (window.onscroll = function () {
            window.scrollTo(scrollLeft, scrollTop);
        });
}

function enableScroll() {
    window.onscroll = function () {};
}

function on(tweet_id) {
    document.getElementById(tweet_id).style.display = "block";
    disableScroll();
}

function off(tweet_id) {
    document.getElementById(tweet_id).style.display = "none";
    enableScroll();
}

function onPreview() {
    document.getElementById(0).style.display = "block";
    disableScroll();

    let input = document.getElementById("output-image");
    let output = document.getElementById("preview-image");
    output.src = input.src;
}

function offPreview() {
    document.getElementById(0).style.display = "none";
    enableScroll();
    document.getElementById("preview-image").src = "";
}
