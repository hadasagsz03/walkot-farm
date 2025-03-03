@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    <ul class="pagination">
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <a class="page-link" aria-label="Next">
            <i class="fas fa-angle-left"></i> 
        </a> 
    </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Next">
                <i class="fas fa-angle-left"></i> 
            </a> 
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item disabled">
                <span aria-current="page">
                    <a class="page-link" href="#">{{ $element }}</a>
                </span>
            </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="page-item active disabled">
                    <span aria-current="page">
                        <a class="page-link" href="#">{{ $page }}</a>
                    </span>
                </li>
                @else
                <li class="page-item">
                    <a href="{{ $url }}" class="page-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                        {{ $page }}
                    </a>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <i class="fas fa-angle-right"></i> 
            </a> 
        </li>
    @else
        <li class="page-item disabled">
            <a class="page-link" aria-label="Next">
                <i class="fas fa-angle-right"></i> 
            </a> 
        </li>
    @endif
    </ul>
@endif
