@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">« Previous</span>
        @else
            <button wire:click="previousPage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                « Previous
            </button>
        @endif

        {{-- Page Numbers --}}
        <div class="flex space-x-2">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1 text-gray-500">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 bg-blue-500 text-white rounded">{{ $page }}</span>
                        @else
                            <button wire:click="gotoPage({{ $page }})"
                                class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Next »
            </button>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">Next »</span>
        @endif
    </nav>
@endif