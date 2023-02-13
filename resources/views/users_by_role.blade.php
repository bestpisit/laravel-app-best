@if($role==null)
Invalid Role ID
@endif
@if($role!=null)
<div>
    <h1>{{$role->id}}{{" "}}{{$role->name}}</h1>
</div>
<table class="table table-bordered">
  @foreach ($role->users as $Customer) <tr>
      <td>{{ $Customer->id }}</td>
      <td>{{ $Customer->name }}</td>
    </tr>
  @endforeach
  </table>
@endif