<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Explorer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">File Explorer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/"><i class="fa fa-folder" aria-hidden="true"></i> Folders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-brands fa-github"></i> GitHub</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container md-12">
    <h1 class="text-center"></h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table" id="file-explorer-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Is. Root</th>
                    <th>Num. of files</th>
                    <th>Num. of folders</th>
                    <th>Preview</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($folders as $folder)
                    <tr>
                        <td>{{ $folder->id }}</td>
                        <td>{{ $folder->name }}</td>
                        <td>{{ ($folder->parent_id) ? 'No' : 'Yes'}}</td>
                        <td>{{ $folder->files->count() }}</td>
                        <td>{{ $folder->children->count() }}</td>
                        <td>
                            <a href="{{ route('show', ['id' => $folder->id]) }}" target="_blank">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#file-explorer-table').DataTable();
    });
</script>
</body>
</html>
