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

        blockquote {
            border-left: 5px solid black;
            padding-left: 15px;
            padding-bottom: 8px;
            padding-top: 8px;
            margin-top: 8px;
            margin-bottom: 8px;
            font-style: italic;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
    <button class="p-2 rounded-lg block mx-auto bg-blue-300 mb-3 text-white font-semibold"
        onclick="previewText(this)">Preview</button>
    <button class="p-2 rounded-lg mx-auto bg-blue-300 mb-3 text-white font-semibold hidden"
        onclick="backWriting(this)">Kembali Menulis</button>
    <textarea class="border border-blue-200 rounded-lg mx-auto block p-5 text-sm w-11/12" name="post_body" id="post_body"
        rows="10"></textarea>
    <div class="p-5 border rounded-lg w-11/12 mx-auto hidden text-sm" id="preview"></div>

    <script>
        var postBody = document.getElementById('post_body')
        var preview = document.getElementById('preview')
        var converter = new showdown.Converter()


        postBody.addEventListener('keyup', function() {
            var text = postBody.value
            var html = converter.makeHtml(text)
            document.getElementById('preview').innerHTML = html
        })

        function previewText(event) {
            postBody.classList.add('hidden')
            preview.classList.remove('hidden')
            event.classList.replace('block', 'hidden')
            event.nextElementSibling.classList.replace('hidden', 'block')
        }

        function backWriting(event) {
            postBody.classList.remove('hidden')
            preview.classList.add('hidden')
            event.classList.replace('block', 'hidden')
            event.previousElementSibling.classList.replace('hidden', 'block')
        }
    </script>
@endsection
