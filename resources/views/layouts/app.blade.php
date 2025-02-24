<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fintech</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: #fff;
            --secondary-color: #16c4bb;
            --accent-color: #16c4bb;
            --background-color: #f8f9fa;
            --card-background: rgba(255, 255, 255, 0.92);
            --heading-font: 'Space Grotesk', sans-serif;
            --body-font: 'Poppins', sans-serif;
        }

        body {
            /* background: linear-gradient(85deg, #072833 0%, #2a2b5f 25%, #32F3E8 100%); */
            color: var(--primary-color);
            position: relative;
            font-family: var(--body-font);
            min-height: 100vh;
            font-size: 15px;
            line-height: 1.6;
            background-position: bottom;
            background-image: url('{{ asset('bg.png') }}');
        }

        body::before {
            content: '';
            position: fixed;
            top: 0%;
            left: 0%;
            /* transform: translate(-50%, -50%); */
            width: 100%;
            height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            opacity: 0.7;
            pointer-events: none;
            z-index: 1000;
            filter: brightness(120%);
            mix-blend-mode: overlay;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--heading-font);
            letter-spacing: -0.02em;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 30px;
            color: white;
            text-align: center;
            font-weight: 700;
            border-bottom: 3px solid var(--secondary-color);
            padding-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        h4 {
            color: var(--primary-color);
            margin-top: 30px;
            margin-bottom: 20px;
            font-weight: 600;
            padding-left: 10px;
            border-left: 4px solid var(--secondary-color);
            font-size: 1.4rem;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            position: relative;
            z-index: 1001;
        }

        .card_header {
            background-color: #04546F;
            border-radius: 6px;
            /* box-shadow: 0 3px 6px rgba(252, 252, 252, 0.299); */
            border: 1px solid #2DF2E6;
            margin-bottom: 45px;
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 8px;
            font-size: 0.95rem;
            letter-spacing: 0.01em;
        }

        .form-control {
            border: 1px solid #2DF2E6;
            border-radius: 6px;
            padding: 10px 15px;
            transition: all 0.3s ease;
            background: #1F4254;
            color: var(--primary-color);
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(250, 103, 55, 0.25);
        }

        .form-check-label {
            font-weight: normal;
            margin-left: 5px;
        }

        .form-check-input:checked {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary {
            font-family: var(--heading-font);
            font-weight: 600;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            font-size: 0.9rem;
            background-color: transparent;
            border: 2px solid #2DF2E6;
            padding: 12px 30px;
            border-radius: 22px;
            transition: all 0.3s ease;
            width: 30%;
            margin: auto;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .section-card {
            background: #154661;
            border-radius: 12px;
            padding: 20px 30px;
            margin-bottom: 45px;
            border: 1px solid #2DF2E6;
            z-index: 1001;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(16, 19, 70, 0.1);
            font-size: 0.95rem;
        }

        .preview {
            margin-top: 15px;
            padding: 20px;
            border: 2px dashed var(--primary-color);
            border-radius: 10px;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
        }

        .preview:hover {
            border-color: var(--secondary-color);
            background: rgba(255, 255, 255, 1);
        }

        .preview img {
            max-width: 300px;
            max-height: 200px;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .preview img:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .preview::before {
            content: '📸 Drop your logo here or click to upload';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--primary-color);
            opacity: 0.7;
            font-size: 1.1rem;
            pointer-events: none;
            transition: opacity 0.3s ease;
            font-family: var(--body-font);
            font-weight: 500;
        }

        .preview.has-image::before {
            opacity: 0;
        }

        input[type="file"] {
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            width: 100%;
            margin-bottom: 10px;
            cursor: pointer;
        }

        input[type="file"]:hover {
            border-color: var(--secondary-color);
        }

        .disclaimer {
            background: rgba(255, 255, 255, 0.9);
            border-left: 4px solid var(--secondary-color);
            padding: 20px;
            margin-top: 30px;
            border-radius: 8px;
            backdrop-filter: blur(5px);
            box-shadow: 0 4px 15px rgba(16, 19, 70, 0.05);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .top-logo {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1002;
            max-width: 220px;
            transition: all 0.3s ease;
        }

        .top-logo img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.2));
        }

        @media (max-width: 768px) {
            .container {
                /* margin: 20px; */
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }

            body {
                background: linear-gradient(165deg, #072833 0%, #2a2b5f 35%, #32F3E8 100%);
            }

            .top-logo {
                position: relative;
                top: 10px;
                left: 10px;
                max-width: 120px;
                margin-bottom: 20px;
            }

            .section-card {
                zoom: 0.8;
                padding: 9px 18px;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>

</head>

<body>
    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif

            @if (session('error'))
                toastr.error('{{ session('error') }}');
            @endif

            @if (session('warning'))
                toastr.warning('{{ session('warning') }}');
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.warning('{{ $error }}');
                @endforeach
            @endif

            toastr.options = {
                "positionClass": "toast-bottom-right",
            };
        });
    </script>
</body>


</html>
