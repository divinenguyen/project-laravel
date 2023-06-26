<ul>
    @foreach($childs as $child)
     <li class="list-group">
        <label><input type="checkbox" value="{{ $child->id }}" name="category_id[]" />{{ $child->name }}</label>
            @if(count($child->children))
            @include('category',['childs' => $child->children])
        @endif
     </li>
    @endforeach
</ul>