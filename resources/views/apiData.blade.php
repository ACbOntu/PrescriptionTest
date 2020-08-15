@extends('layouts.app')
@section('title') Prescription | Api Data @endsection
@section('content')
<table border = "1">
  <tr>
<td> nlmDisclaimer </td>
<td> {{ $response->nlmDisclaimer }} </td>
  </tr>
  <tr>
<td> SourceName </td>
<td> {{$response->interactionTypeGroup[0]->sourceName}} </td>
  </tr>
<h2>  </h2>
</table>
@endsection
