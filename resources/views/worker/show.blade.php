@extends('layout.main')
@section('content')
    <div>
<hr>
<div>
              <div>
              <div>Name: {{ $worker->name }}</div>
              <div>Surname: {{ $worker->surname}}</div>
              <div>Email: {{ $worker->email}}</div>
              <div>Age: {{ $worker->age}}</div>
              <div>Description: {{ $worker->description}}</div>
              <div>Is_married: {{ $worker->is_married}}</div>

                  <a href="{{ route('workers.index') }}">Назад</a>
              </div>
        <hr>

</div>
    </div>
@endsection
