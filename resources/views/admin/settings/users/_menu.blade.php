<div class="field is-grouped">
    <div class="control">
        <a class="button" href="{{ route('admin.users.edit', [$item->id]) }}">
            Edit
        </a>
    </div>

    <div class="control">
        <a class="button is-danger deletable" data-confirm="Are you sure to delete this item?">
            Delete
        </a>
    </div>
</div>