<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>TODO APP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            /* background-color: red */
        }
        .container {
            /* background-color: rgb(255, 255, 255); */
            padding: 2%;
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            font-style: normal;
        }
        .logo {
            margin-bottom: 30px;
            color: white;
            font-weight: bold;
            font-size: 50px;
        }
        .form {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 2%;
            margin-bottom: 25px;
            background-color: white;
        }
        .form .formInput {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .main {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 3%;
            background-color: rgb(255, 255, 255);
            max-height: 300px; /* Atur sesuai kebutuhan */
            overflow-y: auto;
        }
        .main::-webkit-scrollbar{
            width: 1px;
            
        }
        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .main-header > p {
            color: rgb(124, 124, 124);
            margin: 0;
        }
        .form-control {
            width: 100%;
            border-radius: 20px;
            border: none;
        }
        .form-control:focus {
            box-shadow: none;
        }
        button {
            /* padding: 10px 20px; */
            border: none;
            border-radius: 5px;
            color: rgb(119, 119, 119);
            cursor: pointer;
            background-color: white;
        }
        .clearButton{
            /* background-color: red; */
        }
        .table {
            width: 100%;
            /* border-collapse: collapse; */
        }
        .table td {
            /* background-color: #ffffff; */
            padding: 10px; /* Atur padding sesuai kebutuhan */
        }
        .table thead {
            position: sticky;
            top: 0;
            background-color: #f9f9f9;
            z-index: 1;
        }
        .flex-container {
            display: flex;
            align-items: center; /* Untuk memastikan elemen tetap sejajar secara vertikal */
        }
        .iteration {
            flex-shrink: 0; /* Mencegah elemen ini mengecil */
            margin-right: 10px; /* Menambahkan sedikit jarak di sebelah kanan */
        }
        .task {
            flex-grow: 1; /* Membuat elemen ini mengambil sisa ruang yang tersedia */
            min-width: 0; /* Membiarkan elemen mengecil */
            text-align: left;
        }
        .actions {
            flex-shrink: 0; /* Mencegah elemen ini mengecil */
            margin-left: 20px; /* Menambahkan sedikit jarak di sebelah kiri */
        }
        .submitButton {
            margin-left: 5px;
        }

        .background-gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to left, #6E69FF, #FF92F0);
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="background-gradient"></div>
    <div class="container col-sm-5">
        <div class="header">
            <h1 class="logo">TO DO</h1>
            <form action="/todoApp" method="POST" class="form">
                @csrf
                <div class="formInput">
                    <input class="form-control" name="task" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add a new task">
                    <button class="submitButton" name="submit">ADD</button>
                </div>
            </form>
        </div>
        <!-- Modal -->
        @foreach ($tasks as $task)
            <div class="modal fade" id="exampleModalCenter{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update', $task->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="task{{ $task->id }}" class="form-label">Enter new task</label>
                                    <input type="text" class="form-control" id="task{{ $task->id }}" name="updatedTask" value="{{ $task->task }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="main">
            <div class="main-header">
                <p class="col-sm-6">Remaining tasks: {{$tasks->count()}}</p>
                <form action="{{ route('deleteAll')}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="clearButton" >Clear Task</button>
                </form>
            </div>
            <div class="tasks container-fluid table-responsive">
                <table class="table">
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="flex-container">
                                <td class="iteration">{{ $loop->iteration }}</td>
                                <td class="task">{{ $task->task }}</td>
                                <td class="actions">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $task->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('delete', $task->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="bi bi-x-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
