@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())

        <nav class="page-section">
            <ul class="pagination">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="page-item">
                    <button class="page-link disabled" href="javascript:void(0)" aria-label="Previous"
                       style="color:#6c757d;">
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                    </button>
                </li>
                @else
                    <li class="page-item">
                        <button class="page-link" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"  aria-label="Previous">
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                        </button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <a class="page-link disabled" href="#">{{ $element }}</a>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active " wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" aria-current="page">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}"><button type="button" class="page-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button class="page-link" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"  aria-label="nextPage">
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                        </button>
                    </li>
                @else
                    <li class="page-item">
                        <button class="page-link disabled" href="javascript:void(0)" aria-label="Next"
                                style="color:#6c757d;">
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                        </button>
                    </li>
                @endif

            </ul>
        </nav>

    @endif
</div>
