<div class="border border-blue-400 rounded-lg py-6 px-8 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea id="body"
                  name="body"
                  class="bg-gray-100 w-full outline-none"
                  placeholder="What's up doc?"
                  autofocus
        ></textarea>

        <hr class="my-4">

        <div class="mb-6">
            <div class="relative left-1/4">
                <input class="border border-gray-400 p-2 w-1/2 cursor-pointer"
                       type="file"
                       id="image_tweet"
                       name="image_tweet"
                       accept="image/*"
                >
            </div>

            @error('image_tweet')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >

            <button
                id="tweet-submit-btn"
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
            >
                Tweet-A-roo!
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    <script>
        (function() {
            let x = document.getElementById('tweet-submit-btn');
            let body = document.getElementById("body");
            let image_tweet = document.getElementById('image_tweet');

            x.onclick = function() {
                body.required = (body.value === '' && image_tweet.value === '');
            }
        })();
    </script>
</div>
