@extends('admin_table')

@section('form')
    <form action="" method="POST">
        {{ csrf_field() }}
        <p>Редактируйте элемент {{ $id }}</p>
        <textarea name="edit_name"></textarea>
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="submit" value="Изменить">
    </form>
@endsection







