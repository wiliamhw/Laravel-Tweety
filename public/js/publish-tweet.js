(function () {
    let x = document.getElementById("tweet-submit-btn");
    let body = document.getElementById("body");
    let image_tweet = document.getElementById("image_tweet");

    if (x) {
        x.onclick = function () {
            body.required = body.value === "" && image_tweet.value === "";
        };
    }
})();
