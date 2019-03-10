<ul>
    
    
    @foreach($childs as $child)
        <li class="nav-item  ">
                <div style="margin: 10px;">
                        <div style="float: left;">  <a href="{{ action('Admin\MenuController@delmenu' , $child->id) }}" >
                                        <i class="fa fa-times"></i> </a></div>
                        <div style="float: left;">  <a href="{{ action('Admin\MenuController@edit' ,  $child->id) }}" >
                                        <i class="fa fa-pencil"></i> </a></div>

            {{ $child->name_ar }}
            @if(count($child->childs))
                @include('admin.menu.manageChild',['childs' => $child->childs])
            @endif


                </div>
        </li>
    @endforeach
</ul>