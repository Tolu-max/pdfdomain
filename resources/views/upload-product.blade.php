<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            $("#progress").text(percentComplete + '%');
                        }
                    }, false);

                    return xhr;
                },
                type: 'POST',
                url: '/upload-product',
                data: formData,
                contentType: false,
                processData: false,
                var formData = new FormData(this);
formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                success: function (data) {
                    // Handle the success response here
                    alert('File uploaded successfully!');
                },
                error: function (data) {
                    // Handle any errors here
                    alert('Error uploading file.');
                },
            });
        });
    });
</script>

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price (NGN)</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="product_pdf">PDF File</label>
            <input type="file" name="product_pdf" class="form-control-file" required>
        </div>
        <!-- Add more file input fields for other images as needed -->
        <!-- ... -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Upload Product</button>
        </div>
    </form>
    <div id="progress">0%</div>


    <!-- Include jQuery and Axios -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Add AJAX handling for file upload
        $(document).ready(function () {
            $("#upload-form").on("submit", function (
