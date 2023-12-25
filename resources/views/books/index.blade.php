<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
</head>
<body>
    <h2>Data Buku Perpustakaan</h2>
    <br>

    @if (session('status'))
        <h4>{{session('status')}}</h4>
    @endif

    <br>
    <form name="book-save-form" id="book-save-form" action="{{url('/books/save-book')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><input type="text" name="id" id="id" readonly></td>

            </tr>
            <tr>
                <td>Book Name</td>
                <td>:</td>
                <td><input type="text" name="book_name" id="book-name"></td>

            </tr>
            <tr>
                <td>Author</td>
                <td>:</td>
                {{-- <td><input type="text" name="author" id="author"></td> --}}
                <td>
                    <select name="author_id" id="author">
                        <option value="">-- Pilih Author --</option>
                        @foreach ($dataAuthor as $a)
                        <option value="{{ $a['author_id'] }}">{{ $a['author_name'] }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Save</button>
                    <button type="button" id="button-reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <table>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Published Date</th>
            <th colspan="2">Action</th>
        </tr>
        @php($num = 1)
        @foreach ($data as $b)
        <tr class="row-data">
            <td>{{ $num++ }}</td>
            <td>{{ $b['id'] }}</td>
            <td>{{ $b['book_name'] }}</td>
            <td>{{ $b['author_name'] }}</td>
            <td>{{ $b['published_at'] }}</td>
            <td>
                <button id="button-edit" class="button-edit"
                    data-id="{{ $b['id'] }}"
                    data-name="{{ $b['book_name'] }}"
                    data-author="{{ $b['author_id'] }}">Edit</button>
            </td>
            <td>
                <form action="{{ url('/books/delete-book?id=').$b['id'] }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <script>
        var button = $('.button-edit')

        $(document).ready(function() {
            clearForm()
        });

        button.each(function(index) {
                $(this).on('click', function(){
                    var id = $(this).data('id')
                    var name = $(this).data('name')
                    var author = $(this).data('author')

                    $('#id').val(id)
                    $('#book-name').val(name)
                    $('#author').val(author)
                });
            });

        $('#button-reset').on('click', function () {
            clearForm()
        })

        function clearForm(){
            $('#id').val('')
            $('#book-name').val('')
            $('#author').val('')
        }

    </script>
</body>
</html>
