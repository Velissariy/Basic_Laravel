@extends('main')

@section('content')
    <x-user-list :users="$users" />
@endsection
