@if($user==null)
Invalid User ID
@endif
@if($user!=null)
<div>
    <h1>{{$user->id}}{{" "}}{{$user->name}}{{" "}}{{$user->email}}</h1>
</div>
<h1> Roles: </h1>
<table class="table table-bordered">
@foreach ($roles as $Customer) <tr>
    <td>{{ $Customer->id }}</td>
    <td>{{ $Customer->name }}</td>
  </tr>
@endforeach
</table>
@endif