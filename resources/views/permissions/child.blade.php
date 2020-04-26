    @if( $category['category']->parent_id=='#')
        {{--<tr data-toggle="collapse" data-target=".{{$category['category']->id}}">--}}
        <tr data-id="{{$category['category']->id}}" data-parent="">

    @else
        {{--@if(isset($i))--}}
            {{--<tr class="{{$category['category']->parent_id}} collapse {{$category['category']->parent_id}}" data-target=".{{$category['category']->id}}">--}}
        {{--@else--}}
        <tr data-id="{{$category['category']->id}}" data-parent="{{$category['category']->parent_id}}">

{{--        <tr class="collapse {{$category['category']->parent_id}}" data-target=".{{$category['category']->id}}">--}}
        {{--@endif--}}
    @endif

        {{--<tr>--}}
        <td>
            {{ str_repeat(' ｜', isset($i) ? $i++ : 0) . $category['category']->display_name }}
        </td>
        <td>{{ $category['category']->description }}</td>
        <td class="text-center">
            @if( $category['category']->status == 1)
                <span class="text-navy">Показывать</span>
            @else
                <span class="text-dnager">Не показывать</span>
            @endif
        </td>
        <td>
            @permission('permission-show')
            <a class="btn btn-info" href="{{ route('permissions.show', $category['category']->id) }}">Просмотр</a>
            @endpermission
            @permission('permission-edit')
            <a class="btn btn-primary" href="{{ route('permissions.edit', $category['category']->id) }}">Редактировать</a>
            @endpermission
            @permission('permission-status')
            @if( $category['category']->status == 0)
                <a class="btn btn-success"
                   href="{{ route('permissions.status',[1, $category['category']->id]) }}">Включить</a>
            @else
                <a class="btn btn-warning"
                   href="{{ route('permissions.status',[0, $category['category']->id]) }}">Отключить</a>
            @endif
            @endpermission
        </td>
    </tr>
    @if(count($category['childs'])>0)
        @foreach($category['childs'] as $category)
            @include('permissions.child', ['category' => $category, 'i' => isset($i) ? $i : 1])
        @endforeach
    @endif
