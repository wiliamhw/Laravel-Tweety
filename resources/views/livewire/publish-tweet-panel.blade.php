<div>
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
                              class="hide-scrollbar outline-none bg-transparent text-gray-400 font-normal text-lg leading-5 font-sans w-full"
                              rows="2" cols="50" placeholder="What's happening?" spellcheck="false"
                              oninput="resize(this)"
                    ></textarea>
                </div>
            </div>
            <p id="body-info" class="text-red-500 text-xs pl-16" style="display: none;"></p>
            <x-image-preview/>

            <!-- Upload button section -->
            <div class="flex">
                <div class="w-10"></div>
                <div class="w-16 px-2">
                    <div class="flex items-center">
                        <div class="flex-1 text-center px-1 py-1 m-2">
                            <label for="image_tweet" class="cursor-pointer mt-1 group flex items-center text-blue-400 px-2
                            py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300">
                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </label>
                            <input onchange="openPreview('image_tweet', 'output-image', 'close-btn')"
                                   id="image_tweet" name="image_tweet" accept="image/*" type="file" class="hidden"/>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <button id="tweet-submit-btn"
                            class="bg-blue-400 hover:bg-blue-500 mt-5 text-white font-bold py-2 px-8 rounded-full
                                mr-8 float-right"
                    >
                        Tweet
                    </button>
                </div>
            </div>
        </form>
        @error('image_tweet')
            <p class="text-red-500 text-xs mb-4 pl-16">{{ $message }}</p>
        @enderror

        @error('body')
            <p class="text-red-500 text-xs mb-4 pl-16">{{ $message }}</p>
        @enderror
        <script src="{{ asset('js/publish-tweet.js') }}" defer></script>
    </div>
    <hr class="border-gray-800 border-4"/>
</div>
