<script src="{{asset('js/app.js')}}"></script>
@if (Route::is('pages.edit') || Route::is('pages.add') || Route::is('posting.add')|| Route::is('posting.edit'))
  <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
@endif
<script>
    $(document).ready(function() {
      $('[data-toggle=tooltip]').tooltip();
  }); 
</script>