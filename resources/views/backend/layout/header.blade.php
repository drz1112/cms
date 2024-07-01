<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website resmi S1 Teknologi Informasi Universitas Muhammadiyah Klaten.">
    <meta name="keywords" content="TI Klaten, UMKLA">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" />

    <title>Admin</title>
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    @if (Route::is('pages.edit') || Route::is('pages.add') || Route::is('posting.add')|| Route::is('posting.edit'))
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
        <style src="{{ asset('js/ckeditor5/sample/styles.css')}}"></style>
        <script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
        <style type="text/css">
        .ck-editor__editable {
            min-height: 500px;
        }
        </style>
    @endif
</head>
