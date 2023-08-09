@props(['subjects'])

<div class="pro-pagination-style text-center mt-25">
    <ul>
        @if($subjects->onFirstPage())
            <li class="disabled"><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
        @else
            <li><a class="prev" href="{{ $subjects->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>
        @endif

        @for($page = 1; $page <= $subjects->lastPage(); $page++)
            @if($page == $subjects->currentPage())
                <li><a class="active" href="#">{{ $page }}</a></li>
            @else
                <li><a href="{{ $subjects->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        @if($subjects->hasMorePages())
            <li><a class="next" href="{{ $subjects->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
        @else
            <li class="disabled"><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
        @endif
    </ul>
</div>
