<div class="pro-pagination-style text-center mt-25">
    <ul>
        <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>

        @for($page = 1; $page <= $subjects->lastPage(); $page++)
            @if($page == $subjects->currentPage())
                <li><a class="active" href="#">{{ $page }}</a></li>
            @else
                <li><a href="{{ $subjects->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
    </ul>
</div>
