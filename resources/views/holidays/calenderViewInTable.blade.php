@extends('layouts.app')

@section('content')
<style>
th {
  border: 1px solid black;
  border-radius: 10px;
}
</style>
    <h1>Public Holidays in India </h1>
    <a href="{{ route('insertHolidays') }}" class="">Create Data On Table</a>
    <a href="{{ route('displayPage') }}" class="">View Calender</a>
    <table style="">
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($holidays as $holiday)
            <tr>
                <td>{{ $holiday->date->iso }}</td>
                <td>{{ $holiday->name }}</td>
                <td>{{ $holiday->type[0] }}</td>
                <td>{{ $holiday->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
