<ul class="sub-menu">
    @foreach($childs as $child)
        <li class="nav-item start {{ Request::is('admin/'.$category->shortLink.'*') ? 'active' : '' }}">

            <a href="{{ url('/'.$child->link)  }}" class="nav-link ">
                <i class="{{ $child->icon }}"></i>
                <span class="title">  {{ $child['name_'.$locale] }} </span>
                <span class="selected"></span>
            </a>

            @if(count($child->childs))
                @include('admin.sidebar.manageChild',['childs' => $child->childs])
            @endif


        </li>
    @endforeach
</ul>