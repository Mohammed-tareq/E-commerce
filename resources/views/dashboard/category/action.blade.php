<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a href="{{ route('dashboard.categories.edit', $category->id) }}"
       class="btn btn-outline-success">{{ __('dashboard.edit') }}</a>
    <a href="#" class="btn btn-outline-info">{{ __('dashboard.change_status') }}</a>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop2" type="button" class="btn btn-outline-danger dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ __('dashboard.delete') }}
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
            <a class="dropdown-item delete-btn" href="javascript:void(0);" data-id="{{$category->id}}">{{ __('dashboard.delete') }}</a>
            <a class="dropdown-item" href="#">Dropdown link</a>
        </div>
    </div>

    <form id="delete_{{$category->id}}"  action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post" style="display: none;">
        @csrf
        @method('delete')
    </form>
</div>
