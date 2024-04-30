   <!-- Bootstrap JS -->
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
   <!--plugins-->

   <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
   <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
   <script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
   <script src="{{ asset('assets/js/index.js') }}"></script>

   <!--app JS-->
   <script src="{{ asset('assets/js/app.js') }}"></script>
   <script src="https://developercodez.com/developerCorner/parsley/parsley.min.js"></script>
   <script src="{{ asset('snackbar/dist/js-snackbar.js') }}"></script>
   <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>


   <script>
       $(document).ready(function() {
           $("#show_hide_password a").on('click', function(event) {
               event.preventDefault();
               if ($('#show_hide_password input').attr("type") == "text") {
                   $('#show_hide_password input').attr('type', 'password');
                   $('#show_hide_password i').addClass("bx-hide");
                   $('#show_hide_password i').removeClass("bx-show");
               } else if ($('#show_hide_password input').attr("type") == "password") {
                   $('#show_hide_password input').attr('type', 'text');
                   $('#show_hide_password i').removeClass("bx-hide");
                   $('#show_hide_password i').addClass("bx-show");
               }
           });
       });
   </script>

   <script>
       $(document).ready(function(e) {
           $("#formSubmit").on('submit', function(f) {
               if ($(this).parsley().validate()) {
                   f.preventDefault();
                   var formData = new FormData(this);
                   var html =
                       '<button class="btn btn-primary" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...';
                   var html1 =
                       ' <input type="submit" id="submitButton" class="btn btn-primary px-4" value = "Save" / > ';
                   $('#submitButton').html(html);
                   $.ajax({
                       type: 'POST',
                       url: $(this).attr('action'),
                       data: formData,
                       cache: false,
                       contentType: false,
                       processData: false,

                       success: function(result) {
                           //    console.log(result);
                           if (result.status === 'Success') {
                               SnackBar({
                                   status: result.status,
                                   message: result.message,
                                   position: "br"
                               });
                               console.log(result.status);
                               $('#submitButton').html(html1);
                               if (result.data.reload) {
                                   window.location.href = window.location.href;
                               }
                           } else {
                               SnackBar({
                                   status: result.status,
                                   message: result.message,
                                   position: "br"
                               });
                               $('#submitButton').html(html1);
                           }
                       }
                   });

               }
           });
       });
   </script>

   <script>
       $(document).ready(function() {
           $('#example').DataTable();
       });
   </script>
   <script>
       $(document).ready(function() {
           var table = $('#example2').DataTable({
               lengthChange: false,
               buttons: ['copy', 'excel', 'pdf', 'print']
           });

           table.buttons().container()
               .appendTo('#example2_wrapper .col-md-6:eq(0)');
       });
   </script>

   <script>
       function deleteData(id, table) {
           if (confirm("Confirm to delete!") == true) {
               $.ajax({
                   type: 'GET',
                   url: "{{ url('admin/deleteData') }}/" + id + "/" + table + "",
                   data: '',
                   cache: false,
                   contentType: false,
                   processData: false,

                   success: function(result) {
                       //    console.log(result);
                       if (result.status === 'Success') {
                           SnackBar({
                               status: result.status,
                               message: result.message,
                               position: "br"
                           });
                           console.log(result.status);

                           if (result.data.reload) {
                               window.location.href = window.location.href;
                           }
                       } else {
                           SnackBar({
                               status: result.status,
                               message: result.message,
                               position: "br"
                           });
                           $('#submitButton').html(html1);
                       }
                   }
               });
           }

       }
   </script>
