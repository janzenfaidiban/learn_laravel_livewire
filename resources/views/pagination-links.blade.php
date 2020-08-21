@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- first -->
            @if ($paginator->onFirstPage())
            <li class="page-item disabled"  ><a class="page-link">Previous</a> </li>
            @else 
            <li class="page-item page-link"  style="cursor: pointer;" wire:click="previousPage">Previous</li>
            @endif
            <!-- end first -->

            <!-- numbers -->
            @foreach($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item page-link" wire:click="gotoPage({{ $page }})" style="cursor: pointer;background-color:#0984e3;color:#fff;">{{ $page }} </li>
                        @else
                            <li class="page-item page-link" wire:click="gotoPage({{ $page }})" style="cursor: pointer;" >{{ $page }}</li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <!-- end numbers -->

            <!-- next -->
            @if ($paginator->hasMorePages())
            <li class="page-item page-link"  style="cursor: pointer;"  wire:click="nextPage">Next</li>
            @else
            <li class="page-item disabled"  ><a class="page-link">Next</a> </li>
            @endif
            <!-- end next -->
        </ul>
    </nav>
@endif