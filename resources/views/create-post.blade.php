@extends('layouts/admin-panel')

@section('content')
    <style>
        h1 {
            font-size: 20px;
            font-weight: bold;
        }

        ul {
            list-style: disc;
            padding-left: 20px;
        }

        ol {
            list-style: decimal;
            padding-left: 20px
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
    <textarea class="border border-blue-200 rounded-lg mx-auto block p-3" name="post_body" id="post_body" cols="30"
        rows="10"></textarea>
    <p class="font-bold mt-5 mb-2 ml-5">Output:</p>
    <div class="p-3 border rounded-lg w-11/12 mx-auto" id="preview"></div>

    <script>
        var postBody = document.getElementById('post_body')
        var converter = new showdown.Converter()


        postBody.addEventListener('keyup', function() {
            var text = postBody.value
            var html = converter.makeHtml(text)
            document.getElementById('preview').innerHTML = html
        })
    </script>
@endsection
