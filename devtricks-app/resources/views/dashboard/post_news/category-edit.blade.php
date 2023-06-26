<ul>
    @foreach($childs as $child)
     <li class="list-group">
            @if(in_array($child->id,$cate_index))
             <label><input checked type="checkbox" value="{{ $child->id }}" name="category_id[]" />{{ $child->name }}</label>
            @else
             <label><input type="checkbox" value="{{ $child->id }}" name="category_id[]" />{{ $child->name }}</label>
            @endif
        @if(count($child->children))
            @include('category-edit',['childs' => $child->children,'cate_index'=>$cate_index])
        @endif
     </li>
    @endforeach
</ul>