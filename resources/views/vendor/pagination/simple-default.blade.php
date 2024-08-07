@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>Page précédente </span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Page précédente </a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Page suivante</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>Page suivante</span></li>
            @endif
        </ul>
    </nav>
@endif
