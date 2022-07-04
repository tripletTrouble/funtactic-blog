@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center gap-5">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-slate-800 dark:text-white border border-sky-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-sky-500 bg-white dark:bg-slate-800 border border-sky-300 leading-5 rounded-md hover:text-sky-500 focus:outline-none focus:ring ring-sky-300 focus:border-blue-300 active:bg-sky-100 active:text-sky-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-sky-500 bg-white dark:bg-slate-800 border border-sky-300 leading-5 rounded-md hover:text-sky-500 focus:outline-none focus:ring ring-sky-300 focus:bg-blue-300 active:bg-sky-100 active:text-sky-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white dark:bg-slate-800 dark:text-white border border-sky-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
