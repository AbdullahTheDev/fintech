<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h6 style="text-align: right; color: #2c3e50">ID: {{ $customId }}</h6>

    @foreach ($data as $key => $dt)
        @if ($key == 'services')
            <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong></p>
            <ul>
                @foreach ($dt as $service)
                    <li>{{ ucfirst(str_replace('_', ' ', $service)) }}</li>
                @endforeach
            </ul>
            @continue
        @endif
        @php
            $title = str_replace('_', ' ', $key);
        @endphp
        <p>{{ ucfirst($title) }} <strong>{{ $dt }}</strong></p>
    @endforeach

    @if (!empty($filePaths))
        <h4>Reference Logo(s)</h4>
        @foreach ($filePaths as $img)
            <img src="{{ asset($img) }}" style="width: 250px; margin: 10px;" alt="">
        @endforeach
    @endif
    
    <div class="my-3">
        <h4>PDF download URL</h4>
        <a href="{{ route('search.view', $customId) }}">Click here to download your PDF brief</a>
    </div>
</body>

</html>
