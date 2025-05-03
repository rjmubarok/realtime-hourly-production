<ul class="nav nav-treeview">
    @foreach($childs as $child)
    <li class="nav-item">
        <a href="{{route($child->url)}}" class="{{ $child->childs->count() > 0 ? 'nav-link' : 'sub_menu'}}">
            <p>
                <i class="fas fa-arrow-right"></i>
                {{$child->title ?? ''}}
                @if($child->childs->count()>0)
                    <i class="right fas fa-angle-left"></i>
                @endif
            </p>
        </a>
        @include('partials.manage_chaild_menu', ['childs'=>$child->childs])
    </li>
    @endforeach
</ul>
