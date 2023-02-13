@if ($post != null)
    <h1>{{$post->title}}</h1>
    <h2>{{$post->body}}</h2>
@endif
<table class="table table-bordered">
@if ($comments!="")
@foreach ($comments as $Customer) <tr>
    <td>{{ $Customer->id }}</td>
    <td>{{ $Customer->comment }}</td>
  </tr>
@endforeach
</table>
@endif