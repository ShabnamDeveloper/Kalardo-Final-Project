@foreach ($categories as $category)
    <tr >
        <td>
            <input type="checkbox" name="" id="" />
        </td>

        <td>
            <img src="{{$category->image}}">
        </td>

        <td>
            <span>
                {{$category->name}}
            </span>
        </td>

        <td>
            <a href="{{route('category.edit',$category->id)}}">
                <i ></i>
                <span >{{__('general.edit')}}</span>
            </a>
            <form action="{{route('category.destroy',$category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i></i>
                    <span>{{__('general.remove')}}</span>
                </button>
            </form>
        </td>

        @if ($category->children->count())
            @include('admin.category.subcategory',['categories' => $category->children])
        @endif
    </tr>
@endforeach