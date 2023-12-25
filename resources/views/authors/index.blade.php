<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>
    <h2>Data Author Perpustakaan</h2>
    <br>

    @if (session('status'))
        <h4>{{session('status')}}</h4>
    @endif

    <br>
    <form name="book-save-form" id="book-save-form" action="{{url('/authors/save-authors')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>Author ID</td>
                <td>:</td>
                <td><input type="text" name="author_id" id="author-id" readonly></td>
            </tr>
            <tr>
                <td>Author Name</td>
                <td>:</td>
                <td><input type="text" name="author_name" id="author-name"></td>

            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Save</button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>Author ID</th>
            <th>Author Name</th>
            <th colspan="2">Action</th>
        </tr>
        @php($num = 1)
        @foreach ($data as $b)
        <tr class="row-data">
            <td>{{ $num++ }}</td>
            <td>{{ $b['author_id'] }}</td>
            <td>{{ $b['author_name'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
