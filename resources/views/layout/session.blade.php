<form action="{{ route('change_qty', $id) }}" class="d-flex">
    <button type="submit" value="down" name="change_to" class="btn btn-danger">
        @if($item['quantity'] === 1) - @else - @endif
    </button>
    <input type="number" value="{{ $item['quantity'] }}" disabled>
    <button type="submit" value="up" name="change_to" class="btn btn-info">+</button>
</form>