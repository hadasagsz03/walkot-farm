<ul class="pagination">
    @if($berita_paginate['pagination']['current_page'] >= 2)
        <li class="page-item"><a class="page-link" href="{{ asset('/berita') }}?page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
        <li class="page-item"><a class="page-link" href="{{ asset('/berita') }}?page={{ $berita_paginate['pagination']['current_page']-1 }}"><i class="fa fa-angle-left"></i></a></li>
    @else
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
    @endif
    
    @if($berita_paginate['pagination']['current_page'] != 1 && $berita_paginate['pagination']['current_page'] != 2)
        <li class="page-item "><a class="page-link" href="{{ asset('/berita') }}?page={{ $berita_paginate['pagination']['current_page']-2 }}">{{ $berita_paginate['pagination']['current_page']-2 }}</a></li>
    @endif
    @if($berita_paginate['pagination']['current_page'] >= 2)
        <li class="page-item "><a class="page-link" href="{{ asset('/berita') }}?page={{ $berita_paginate['pagination']['current_page']-1 }}">{{ $berita_paginate['pagination']['current_page']-1 }}</a></li>
    @endif

    <li class="page-item active"><a class="page-link" href="#">{{ $berita_paginate['pagination']['current_page'] }}</a></li>

    @if($berita_paginate['pagination']['current_page'] != $berita_paginate['pagination']['total_pages'])
        <li class="page-item "><a class="page-link" href="{{ asset('/berita') }}?page={{ $berita_paginate['pagination']['current_page']+1 }}">{{ $berita_paginate['pagination']['current_page']+1 }}</a></li>
        @if($berita_paginate['pagination']['current_page']+1 != $berita_paginate['pagination']['total_pages'])
            <li class="page-item "><a class="page-link" href="{{ asset('/berita') }}?page={{ $berita_paginate['pagination']['current_page']+2 }}">{{ $berita_paginate['pagination']['current_page']+2 }}</a></li>
        @endif
        <li class="page-item"><a class="page-link" href="{{ asset('/berita') }}?page={{ $berita_paginate['pagination']['current_page']+1 }}"><i class="fa fa-angle-right"></i></a></li>
        <li class="page-item"><a class="page-link" href="{{ asset('/berita') }}?page={{ $berita_paginate['pagination']['total_pages'] }}"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
    @else
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
    @endif
</ul>