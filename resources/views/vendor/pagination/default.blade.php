@if ($paginator->hasPages())
    <div class="fixed mt-20 lg:fixed xl:fixed lg:left-72 xl:left-72 bottom-0 w-screen">
        <div class="flex mb-16 bg-white shadow-md w-min mx-auto">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class=" text-indigo-400  rounded-l rounded-sm border border-brand-light px-3 py-2 cursor-not-allowed no-underline">&laquo;</span>
            @else
                <a
                    class="text-indigo-400 hover:text-white lg:hover:bg-indigo-100
                xl:hover:bg-indigo-100  rounded-l rounded-sm border-t border-b border-l border-brand-light px-3 py-2 text-brand-dark hover:bg-brand-light no-underline"
                    href="{{ $paginator->previousPageUrl() }}"
                    rel="prev"
                >
                    &laquo;
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="border-t border-b border-l border-brand-light px-3 py-2 cursor-not-allowed no-underline">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="text-indigo-200 border-t border-b border-l border-brand-light px-3 py-2 bg-brand-light no-underline">{{ $page }}</span>
                        @else
                            <a class="border-t border-b border-l border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="text-indigo-400 hover:text-white lg:hover:bg-indigo-100
                xl:hover:bg-indigo-100 rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span class="rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline cursor-not-allowed text-indigo-400">&raquo;</span>
            @endif
        </div>
    </div>
@endif