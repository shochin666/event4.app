@if ($paginator->hasPages())
    <div class="fixed mt-20 lg:static xl:static lg:left-80 xl:left-80 bottom-0 w-screen">
        <div class="flex mb-16 bg-white shadow-md w-min mx-auto">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-16 lg:px-8 xl:px-8 py-10 lg:py-4 xl:py-4 text-indigo-400 rounded-l rounded-sm border border-brand-light cursor-not-allowed no-underline text-4xl">&laquo;</span>
            @else
                <a class="text-indigo-400 hover:text-white lg:hover:bg-indigo-100
                xl:hover:bg-indigo-100  rounded-l rounded-sm border-t border-b border-l border-brand-light text-brand-dark hover:bg-brand-light no-underline px-16 lg:px-8 xl:px-8 py-10 lg:py-4 xl:py-4 text-4xl"
                    href="{{ $paginator->previousPageUrl() }}"
                    rel="prev">
                    &laquo;
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="border-t border-b border-l border-brand-light cursor-not-allowed no-underline px-16 lg:px-8 xl:px-8 py-10 lg:py-4 xl:py-4 text-4xl lg:text-2xl xl:text-2xl">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="text-indigo-200 border-t border-b border-l border-brand-light bg-brand-light no-underline px-16 lg:px-8 xl:px-8 py-10 lg:py-6 xl:py-6 text-4xl lg:text-2xl xl:text-2xl">{{ $page }}</span>
                        @else
                            <a class="border-t border-b border-l border-brand-light hover:bg-brand-light text-brand-dark no-underline px-16 lg:px-8 xl:px-8 py-10 lg:py-6 xl:py-6 text-4xl lg:text-2xl xl:text-2xl" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="text-indigo-400 hover:text-white lg:hover:bg-indigo-100
                xl:hover:bg-indigo-100  rounded-l rounded-sm border-t border-b border-l border-brand-light text-brand-dark hover:bg-brand-light no-underline px-16 lg:px-8 xl:px-8 py-10 lg:py-4 xl:py-4 text-4xl" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span class=" px-16 lg:px-8 xl:px-8 py-10 lg:py-4 xl:py-4 text-indigo-400  rounded-l rounded-sm border border-brand-light cursor-not-allowed no-underline text-4xl">&raquo;</span>
            @endif
        </div>
    </div>
@endif