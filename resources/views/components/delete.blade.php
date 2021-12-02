<form action="{{$url}}" method="POST" class="d-inline-block mt-2 mt-lg-0">
    @csrf
    @method('delete')
    <input type="submit" value="{{$value}}" class="btn btn-danger">
    </form>
