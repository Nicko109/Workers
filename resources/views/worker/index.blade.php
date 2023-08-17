@extends('layout.main')
@section('content')
    <div>
    <hr>
    <div>
        @can('create', \App\Models\Worker::class)
        <a href="{{ route('workers.create') }}">Добавить</a>
    </div>
        @endcan
    <hr>
    <div>
        <form action="{{ route('workers.index') }}">
            <input type="text" name="name" placeholder="name" value="{{ request()-> get('name')}}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()-> get('surname')}}">
            <input type="text" name="email" placeholder="email" value="{{ request()-> get('email')}}">
            <input type="number" name="from" placeholder="from" value="{{ request()-> get('from')}}">
            <input type="number" name="to" placeholder="to" value="{{ request()-> get('to')}}">
            <input type="text" name="description" placeholder="description" value="{{ request()-> get('description')}}">
            <input type="checkbox" name="is_married" id="Is_Married"
                {{ request()-> get('is_married') == 'on' ? ' checked' : ''}}
            >
            <label for="Is_Married">Is married</label>
            <input type="submit">
            <a href="{{ route('workers.index') }}">Сбросить</a>
        </form>
    </div>
    <hr>
    @foreach($workers as $worker)
              <div>
              <div>Name: {{ $worker->name }}</div>
              <div>Surname: {{ $worker->surname}}</div>
              <div>Email: {{ $worker->email}}</div>
              <div>Age: {{ $worker->age}}</div>
              <div>Description: {{ $worker->description}}</div>
              <div>Is_married: {{ $worker->is_married}}</div>

                  <a href="{{ route('workers.show', $worker->id) }}">Просмотреть</a>
                  @can('update', $worker)
                  <div>
                  <a href="{{ route('workers.edit', $worker->id) }}">Редактировать</a>
                  </div>
                  @endcan
                  @can('delete', $worker)
                  <div style="margin-top: 15px;">
                      <form action="{{ route('workers.destroy', $worker->id) }}" method="post">
                          @csrf
                          @method('Delete')
                          <input type="submit" value="Удалить">
                      </form>
                  </div>
                  @endcan
              </div>
        <hr>
          @endforeach
    <div class="my-nav">
        {{ $workers->withQueryString()->links() }}
    </div>
    </div>
@endsection
