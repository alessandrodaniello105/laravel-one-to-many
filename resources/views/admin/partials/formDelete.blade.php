<form
  class="d-inline-block"
  method="POST"
  action="{{$route}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-eraser"></i></button>
</form>
