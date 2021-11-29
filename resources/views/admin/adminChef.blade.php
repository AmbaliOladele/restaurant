<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.includes.admincss')
  </head>
  <style>
      .form {
          position: relative;
          top: 20px;
          right: -30px;
      }
      .form .form-div label {
          color:#fb5849;
          font-size: 25px;
          margin-top: 10px;
      }
      .form .form-div input[type='text'] {
        color: #fb5849;
        width: 550px;
        font-size: 20px;
        outline: none;
        border: none;
        border-bottom: 2px solid #fb5849;
        background: transparent;
        margin-top: 8px;
        margin-bottom: 10px;
      }
      .form .form-div input[type='text']:focus {
        outline: none;
      }
      .form .form-div input[type='file'] {
        font-size: 20px;
        color: gray;
        margin-top: 20px;
        margin-bottom: 10px;
      }
      .form .form-div input[type='submit'] {
        color: white;
        background: #2a2a2a;
        width: 200px;
        height: 50px;
        font-size: 20px;
        border-radius: 5px;
      }
      .form .form-div input[type='submit']:hover {
        background-color: #fb5849;
        color: black;
      }
      .table-div {
          margin-top: 40px;
          margin-left: 30px;
      }
      .table-2 tr th {
        font-size: 18px;
        padding: 20px;
        border-bottom: 2px solid #fb5849
      }
      .table-2 tr th:hover {
        color: #fb5849
      }
      .table-2 tr td:hover {
        color: #fb5849
      }
      .table-2 tr td {
        padding: 20px;
        text-align: center;
        border-bottom: 2px solid #fb5849;
      }
      .table-2 tr td img {
        width: 200px;
        height: 200px;
        border-radius: 5px;
      }
      .table-2 tr td a {
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
    }
    .table-2 tr td a:hover {
        color: #fb5849;
        cursor: pointer;
    }
  </style>
  <body>

    <div class="container-scroller">

        @include('admin.includes.navbar')

        <form class="form" action="{{ url('/uploadChef') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-div">
                <label for="name">Name:</label><br>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Enter name" required><br>
            </div>

            <div class="form-div">
                <label for="specialty">Specialty:</label><br>
                <input
                    type="text"
                    name="specialty"
                    id="specialty" required
                    placeholder="Enter your specialty"><br>
            </div>

            <div class="form-div">
                <input
                    type="file"
                    name="image"
                    required
                   ><br>
            </div>

            <div class="form-div">
                <input
                    type="submit"
                    value="Save">
            </div>

        </form>

        <div class="table-div">
            <table class="table-2">
                <tr>
                    <th>Chef Name</th>
                    <th>Specialty</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->specialty }}</td>
                    <td>
                        <img src="/chefimage/{{ $data->image }}" alt="">
                    </td>
                    <td>
                        <a style="color: green" href="{{ url('/updateChef',$data->id) }}">Update</a>
                        <a style="color: red" href="{{ url('/deleteChef',$data->id) }}">Delete</a>
                    </td>
                </tr>
               @endforeach
            </table>
        </div>

    </div>

    @include('admin.includes.adminscripts')
  </body>
</html>
