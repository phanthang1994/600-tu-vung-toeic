<div class="pro-pagination-style text-center mt-25">
    <ul>
        @if($subjects->currentPage() > 1)
            <li class="prev_li"><a class="prev" href="{{ $subjects->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>
        @endif

        @for($page = 1; $page <= $subjects->lastPage(); $page++)
            @if($page == $subjects->currentPage())
                <li><a class="active" href="#">{{ $page }}</a></li>
            @else
                <li><a href="{{ $subjects->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        @if($subjects->hasMorePages())
            <li class="next_li"><a class="next" href="{{ $subjects->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
        @endif
    </ul>
</div>
