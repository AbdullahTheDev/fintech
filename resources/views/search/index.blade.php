<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <title>Search PDFs</title>
    <style>
        .search-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            background: white;
        }
        .card-header {
            background: #007bff;
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
            border-color: #007bff;
        }
        body {
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-container">
            <div class="card">
                <div class="card-header text-center py-3">
                    <h4 class="mb-0">PDF Search</h4>
                </div>
                <div class="card-body">
                    <form id="searchForm" action="{{ route('search.pdf') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="search_id" class="form-label">Enter ID</label>
                            <input type="text" class="form-control" value="{{ $id ?? '' }}" id="search_id" name="customID" required 
                                   placeholder="Enter the ID to search">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-search me-2"></i>Search PDF
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    
    <script>
        $(document).ready(function() {
            // Configure toastr options
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            // Handle form submission
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                // alert("sf");
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.url) {
                            window.location.href = response.url;
                        }else{
                            toastr.warning(response.error);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        toastr.warning('PDF not found or an error occurred');
                    }
                });
            });

            @if(session('error'))
                toastr.error('{{ session('error') }}');
            @endif
        });
    </script>
</body>
</html>