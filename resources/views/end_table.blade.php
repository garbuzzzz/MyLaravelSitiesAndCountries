@extends('layouts.admin_layout')


смысл понятен, лень делать последнюю геморную таблицу
@section('title')
    Описания достопримечательностей
@endsection

<table style="border: 1px solid black">
    <tr>
        <th>Name</th><th>Delete</th><th>Edit</th>
    </tr>
    @foreach($descriptions as $description)
        <tr >
            <td>{{ $description->name }}</td>
            <td>
                <form action="">
                    <input type="submit" value="Удалить id № {{ $description->id }}">
                    <input type="hidden" name="delete" value="{{ $description->id }}">

            </td>
            <td>
                <input type="submit" name="edit" value="Редактировать">
                <input type="hidden" name="id" value="{{ $description->id }}">
            </td>
                </form>
        </tr>
    @endforeach
</table>

