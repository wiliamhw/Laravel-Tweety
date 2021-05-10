<div>
    <!-- Image preview section -->
    <div class="ml-10">
        <div class="relative">
            <div id="close-btn"
                 class="hidden absolute cursor-pointer w-10 h-10 flex justify-center items-center">
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
             class="hidden w-full h-full cursor-pointer mt-4 border border-cool-gray-600 outline-none rounded-lg object-cover"
             style="height: 337px"
        />
    </div>
    <!-- Image preview overlay section -->
    <div id="0" class="overlay" onclick="offPreview()" style="display: none;">
        <div id="overlay-img">
            <img id="preview-image"/>
        </div>
    </div>
</div>
