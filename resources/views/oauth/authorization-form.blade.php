@extends('layouts.app')

@section('content')

    <h2>{{$client->getName()}}</h2>
    <form method="post" action="{{route('oauth.authorize.post', $params)}}">
        {{ csrf_field() }}
        <input type="hidden" name="client_id" value="{{$params['client_id']}}">
        <input type="hidden" name="redirect_uri" value="{{$params['redirect_uri']}}">
        <input type="hidden" name="response_type" value="{{$params['response_type']}}">
        <input type="hidden" name="state" value="{{$params['state']}}">
        <input type="hidden" name="scope" value="{{$params['scope']}}">

        <button type="submit" name="approve" value="1">Approve</button>
        <button type="submit" name="deny" value="1">Deny</button>
    </form>

@endsection