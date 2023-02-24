<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard Koordinator - KP Sistem Informasi</title>
    <link rel="icon" href="/assets/img/logo.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/sweetalert2/sweetalert2.scss">
    <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    

    <div class="container-fluid">

        @yield('content')

        <!-- General JS Scripts -->
        <script src="/assets/modules/jquery.min.js"></script>
        <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="/assets/modules/datatables/datatables.min.js"></script>
        <script src="/assets/modules/popper/popper.min.js"></script>
        <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/modules/moment.min.js"></script>
        <script src="/assets/js/stisla.js"></script>

        <!-- JS Libraies -->
        <script src="/assets/modules/sweetalert2/sweetalert2.min.js"></script>
        <script src="/assets/modules/summernote/summernote-bs4.js"></script>
        <script src="/js/bootstrap.js"></script>

        <script>
            $('#table1').css('display', 'table');
            $('#table1').DataTable();

            $(".treeview").click(function () {
                $('.media').collapse('show');
            });

        </script>

        <script>
            $('#table2').css('display', 'table');
            $('#table2').DataTable();

            $(".treeview").click(function () {
                $('.media').collapse('show');
            });

        </script>

        <!-- Template JS File -->
        <script src="/assets/js/scripts.js"></script>
        <script src="/assets/js/custom.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#select1').select2();
            });

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#select2').select2();
            });

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#select3').select2();
            });

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#select4').select2();
            });

        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#select5').select2();
            });

        </script>

    </div>
</body>

</html>
