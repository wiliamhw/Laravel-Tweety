@if ($paginator->hasPages())
    <div class="flex flex-col items-center mb-14">
        <div class="flex text-gray-400 justify-center">
            {{-- First Page Link --}}
            <div class="h-8 w-8 mr-1 flex justify-center items-center">
                @if (!$paginator->onFirstpage())
                    <a href="{{ $paginator->url(1) }}"
                       class="w-8 h-8 hover:bg-pink-200 hover:text-gray-200 hover:bg-opacity-25 rounded-full
                            flex justify-center items-center leading-5 transition duration-150 ease-in border-0
                            text-center">
                        <i class="fa fa-chevron-left"></i>
                        <i class="fa fa-chevron-left"></i>
                    </a>
                @endif
            </div>

            {{-- Previous Page Link --}}
            <div class="h-8 w-8 mr-1 flex justify-center items-center">
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="w-8 h-8 hover:bg-pink-200 hover:text-gray-200 hover:bg-opacity-25 rounded-full
                            md:flex justify-center items-center leading-5 transition duration-150 ease-in border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-6 h-6">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                @endif
            </div>
            <div class="flex h-8 font-medium items-center">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @php
                            $temp = $paginator->currentPage() - 3;
                            $start = ($temp) >= 1 ? $temp : 1;
                            $temp = $paginator->currentPage() + 3;
                            $end = ($temp) <= $paginator->lastPage() ? $temp : $paginator->lastPage();
                        @endphp
                        @foreach ($element as $page => $url)
                            @if ($page < $start or $page > $end)
                                @continue
                            @elseif ($page == $paginator->currentPage())
                                <div class="font-bold w-8 h-8 mx-1 md:flex justify-center items-center hidden cursor-pointer leading-5
                                            transition duration-150 ease-in  border-0 rounded-full bg-pink-700 text-gray-200">
                                    {{ $page }}
                                </div>
                            @else
                                <a href="{{ $url }}" class="font-bold md:flex justify-center items-center hidden leading-5 transition
                                        duration-150 ease-in border-0 rounded-full w-8 h-8 mx-1
                                        hover:bg-pink-200 hover:text-gray-200 hover:bg-opacity-25">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            {{-- Next Page Link --}}
            <div class="h-8 w-8 ml-1 flex justify-center items-center">
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="w-8 h-8 hover:bg-pink-200 hover:text-gray-200 hover:bg-opacity-25 rounded-full
                            md:flex justify-center items-center leading-5 transition duration-150 ease-in border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-6 h-6">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                @endif
            </div>

            {{-- Last Page Link --}}
            <div class="h-8 w-8 ml-1 flex justify-center items-center">
                @if ($paginator->currentPage() !== $paginator->lastPage())
                    <a href="{{ $paginator->url($paginator->lastPage()) }}"
                       class="w-8 h-8 hover:bg-pink-200 hover:text-gray-200 hover:bg-opacity-25 rounded-full
                            flex justify-center items-center leading-5 transition duration-150 ease-in border-0
                            text-center">
                        <i class="fa fa-chevron-right"></i>
                        <i class="fa fa-chevron-right"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif
