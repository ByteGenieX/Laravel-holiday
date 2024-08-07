@extends('layouts.app')

@section('content')
    <h1>Holiday Calendar</h1>
    <form method="POST" action="{{ route('holidays.fetch') }}">
        @csrf
        <div class="form-group">
             <label for="year">Year:</label>
            <input type="text" id="year" name="year" class="form-control" required>
        </div>
        {{-- <div class="form-group">
            <label for="year">Month:</label>
            <input type="text" id="month" name="month" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Day:</label>
            <input type="text" id="day" name="day" class="form-control" required>
        </div> --}}
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Fetch Holidays</button>
    </form>
    <ul class="list-group mt-4">
        @foreach ($holidays as $holiday)
            <li class="list-group-item">{{ $holiday->name }} - {{ $holiday->date }}</li>
        @endforeach
    </ul>
@endsection
