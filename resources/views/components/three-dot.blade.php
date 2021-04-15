<span id="dropdown" class="absolute right-0 cursor-pointer w-10 h-10
            flex justify-center items-center dot-span"
      onmouseenter="changeColor(this, '#1da1f2')"
      onmouseleave="changeColor(this, '#000000')"
      onclick="dropDown(this)"
>

    <div class="menu shadow">
        <form id='delete-tweet' method="POST" action="{{ route('delete-tweet', $tweet) }}">
            @csrf
            @method('DELETE')
            <button class="content w-full" type="submit">
                <svg viewBox="0 0 24 24" class="option-icon">
                    <g>
                        <path
                            d="M12 22.75C6.072 22.75 1.25 17.928 1.25 12S6.072 1.25 12 1.25 22.75 6.072 22.75 12 17.928 22.75 12 22.75zm0-20C6.9 2.75 2.75 6.9 2.75 12S6.9 21.25 12 21.25s9.25-4.15 9.25-9.25S17.1 2.75 12 2.75z"></path>
                        <path
                            d="M12 13.415c1.892 0 3.633.95 4.656 2.544.224.348.123.81-.226 1.035-.348.226-.812.124-1.036-.226-.747-1.162-2.016-1.855-3.395-1.855s-2.648.693-3.396 1.854c-.224.35-.688.45-1.036.225-.35-.224-.45-.688-.226-1.036 1.025-1.594 2.766-2.545 4.658-2.545zm4.216-3.957c0 .816-.662 1.478-1.478 1.478s-1.478-.66-1.478-1.478c0-.817.662-1.478 1.478-1.478s1.478.66 1.478 1.478zm-5.476 0c0 .816-.662 1.478-1.478 1.478s-1.478-.66-1.478-1.478c0-.817.662-1.478 1.478-1.478.817 0 1.478.66 1.478 1.478z">
                        </path>
                    </g>
                </svg>
                <p>Delete tweet</p>
             </button>
        </form>
    </div>

    <div class="relative dot-div">
        <svg viewBox="0 0 24 24" class="w-5 h-5">
            <g>
                <circle class="dot" cx="5" cy="12" r="2"></circle>
                <circle class="dot" cx="12" cy="12" r="2"></circle>
                <circle class="dot" cx="19" cy="12" r="2"></circle>
            </g>
        </svg>
    </div>
</span>
