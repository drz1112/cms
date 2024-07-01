@if (session()->has('error'))
<script type="text/javascript">
    Swal.fire({
        title: "Terjadi Kesalahan",
        text: '{{session('error')}}',
        icon: "error"
    });
</script>
@endif
@if (session()->has('success'))
    <script type="text/javascript">
        Swal.fire({
            title: "Berhasil",
            text: '{{session('success')}}',
            icon: "success"
        });
    </script>
@endif