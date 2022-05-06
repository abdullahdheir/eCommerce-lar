<div>
    @if ($paginator->hasPages())
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : ($this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1))

        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">

            <div class="wrap-pagination-info" style="margin: 0; padding:5px; width:100%;">
                <div>
                    <ul class="page-numbers">
                        <li>
                            @if (!$paginator->onFirstPage())
                                <button wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                                    class="page-number-item">
                                    {!! __('pagination.previous') !!}
                                </button>
                            @endif
                        </li>
                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <li
                                        wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page" class="page-number-item current">
                                                {{-- class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 select-none" --}}
                                                {{ $page }}
                                            </span>
                                        @else
                                            <button {{-- relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 --}}
                                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                class="page-number-item"
                                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        @endforeach

                        <li>
                            @if ($paginator->hasMorePages())
                                <button wire:click="nextPage"
                                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                                    class="page-number-item">
                                    {!! __('pagination.next') !!}
                                </button>
                            @endif
                        </li>
                    </ul>
                    <p class="result-count">
                        <span>{!! __('Showing') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('to') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('of') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div>
            </div>
        </nav>
    @endif
</div>
