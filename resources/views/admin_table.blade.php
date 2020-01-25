@extends('layouts.admin_layout')

@section('title')
    {{ $title }}
@endsection

@section('status')
    {{ session('status') }}
@endsection

@section('content')
    <table style="border: 1px solid black">
        <tr>
            <th>Name</th><th>Delete</th><th>Edit</th>
        </tr>
        @foreach($elems as $elem)
            <tr >
                <td><a href="{{ $url }}/{{ $elem->name }}">{{ $elem->name }}</a></td>
                <td>
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" value="Удалить id № {{ $elem->id }}">
                        <input type="hidden" name="delete" value="{{ $elem->id }}">

                </td>
                <td>
                    <input type="submit" name="edit" value="Редактировать">
                    <input type="hidden" name="id" value="{{ $elem->id }}">
                </td>
                </form>
            </tr>
        @endforeach
    </table>
@endsection

@section('form')
    <form action="">
        <p>Если вы хотите добавить элемент, заполните форму ниже</p>
        <textarea name="add_name"></textarea>
        <input type="submit" value="Добавить в таблицу">
    </form>
@endsection

