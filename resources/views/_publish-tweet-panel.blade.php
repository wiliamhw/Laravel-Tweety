<div class="border border-y-0 border-b-none border-gray-800 pt-6 pb-1 px-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <!-- Avatar and textarea section -->
        <div class="flex">
            <div class="m-2 w-10 py-1">
                <img class="inline-block h-10 w-10 rounded-full"
                     src="{{ auth()->user()->avatar }}" alt="">
            </div>
            <div class="flex-1 px-2 pt-2 mt-2">
                <textarea id="body" name="body"
                          class="outline-none bg-transparent text-gray-400 font-normal text-lg leading-5 font-sans w-full"
                          rows="2" cols="50" placeholder="What's happening?" spellcheck="false"
                          oninput="resize(this)"
                ></textarea>
            </div>
        </div>

        <!-- Image preview section -->
        <div class="ml-10">
            <div class="relative">
                <div id="close-btn" class="hidden absolute cursor-pointer w-10 h-10 flex justify-center items-center">
                    <div onClick="closePreview()"
                        class="relative w-10 h-10 flex items-center justify-center text-white p-2 leading-6 rounded-full bg-black hover:bg-gray-700"
                        style="right: -5px; bottom: -5px"
                    >
                        <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" stroke="currentColor">
                            <g>
                                <path
                                    d="M13.414 12l5.793-5.793c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0L12 10.586 6.207 4.793c-.39-.39-1.023-.39-1.414 0s-.39 1.023 0 1.414L10.586 12l-5.793 5.793c-.39.39-.39 1.023 0 1.414.195.195.45.293.707.293s.512-.098.707-.293L12 13.414l5.793 5.793c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L13.414 12z"></path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <img id="output-image" onclick="onPreview()"
                class="hidden cursor-pointer mt-4 border border-cool-gray-600 outline-none rounded-lg object-cover"
                style="height: 337px"
            />
        </div>
        <!-- Image preview overlay section -->
        <div id="0" class="overlay" onclick="offPreview()" style="display: none;">
            <div id="overlay-img">
                <img id="preview-image"/>
            </div>
        </div>

        <!-- Upload image section -->
        <div class="flex">
            <div class="w-10"></div>
            <div class="w-16 px-2">
                <div class="flex items-center">
                    <div class="flex-1 text-center px-1 py-1 m-2">
                        <label for="image_tweet" class="cursor-pointer mt-1 group flex items-center text-blue-400 px-2
                            py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300">
                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </label>
                        <input onchange="openPreview()" id="image_tweet" name="image_tweet" accept="image/*" type="file" class="hidden"/>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <button id="tweet-submit-btn" class="bg-blue-400 hover:bg-blue-500 mt-5 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                    Tweet
                </button>
            </div>
        </div>
    </form>

    @error('image_tweet')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror

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
<hr class="border-gray-800 border-4"/>
