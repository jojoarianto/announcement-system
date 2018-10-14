<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pengumuman</title>
    <meta name=description content="Pengumuman">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <style>
    .table-responsive{
        border: none !important;
    } 

    #nav {
        background-color: #337ab7;
    }

    .navbar-brand {
        color: #FFF !important;
    }

</style>
</head>
<body>
    <header class="navbar navbar-inverse navbar-fixed-top" id="nav" role="banner">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Pengumuman {{ $title }}</a>
            </div>
        </div>
    </header>

    <div class="container" style="margin-top: 70px;">
        <div class="table-responsive" >
            <table class="table table-bordered table-condensed table-striped datatable mdl-data-table dataTable" id="table">
                <thead class="thead-dark">
                    <tr> 
                        <th>No</th>
                        <th>Nomer Peserta</th>
                        <th>Nama Peserta</th>
                        <th>Sekolah</th>
                        <th>Region</th>
                        <th>Nilai</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    


    <!-- script code -->
    <script>
      $(document).ready(function() {
        $('#table').DataTable({
            pageLength: 25,
            order: [[ 1, "asc" ]],
            processing: true,
            serverSide: true,
            ajax: "{{ route('get-data') }}",
            columnDeft: [
            {
                targets: [1,2,3,4,5,6],
                className: "mdl-data-table"
            },
            ],
        });

    } );
</script>
</body>
</html>
