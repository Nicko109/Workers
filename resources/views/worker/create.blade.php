@extends('layout.main')
@section('content')
<div>
    <hr>
    <div>
        <form action="{{ route('workers.store') }}" method="Post">
            @csrf
            <div style="margin-bottom: 15px;"><input type="text" name="name" placeholder="name" value="{{ old('name')}}">
                @error('name')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;"><input type="text" name="surname" placeholder="surname" value="{{ old('surname')}}">
                @error('surname')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;"><input type="email" name="email" placeholder="email" value="{{ old('surname')}}"}>
                @error('email')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;"><input type="number" name="age" placeholder="age" value="{{ old('age')}}">
                @error('age')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;"><textarea name="description" placeholder="description">
                    {{ old('description')}}
                </textarea>
                @error('description')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;">
                <input
                    {{ old('isMarried') == ' on' ? ' checked' : '' }}
                    id="isMarried" type="checkbox" name="is_married">
                <label for="isMarried">Is married</label>
                @error('is_married')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div style="margin-bottom: 15px;"><input type="submit" value="Добавить"></div>


        </form>
    </div>
</div>
@endsection
