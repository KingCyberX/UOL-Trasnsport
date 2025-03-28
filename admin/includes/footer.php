<!-- footer start -->
<ul class="nav justify-content-center " style="background-color: #7AAB55;">
    <p class="noob">Copyright © 2023 University Of Lahore. All rights reserved.</p>
</ul>
</div>

</div>




</body>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });

        // DataTable initialization with buttons
        let table = $('#myTable').DataTable({
            dom: 'Bfrtip', // Add the buttons to the DOM
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ]
        });
    });
</script>
</html>