<div class="dropdown mo-mb-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @isset($cardRoute)
            <a class="dropdown-item" href="{{$cardRoute}}">Kartu</a>
        @endisset
        @isset($showRoute)
            <a class="dropdown-item" href="{{$showRoute}}">Detail</a>
        @endisset
        @isset($editRoute)
            <a class="dropdown-item" href="{{$editRoute}}">Edit</a>
        @endisset
        @isset($deleteRoute)
        <form action="{{$deleteRoute}}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button type="submit" class="dropdown-item btn btn-danger" onclick="return confirm('Apakah Yakin Menghapus Data???')">Delete</button>
        </form>
        @endisset

       
    </div>
</div>
