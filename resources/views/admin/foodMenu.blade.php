<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.includes.admincss')
  </head>
  <style>
      label:hover {
          color: #fb5849
      }
      .table-2 {
          background-color: #2a2a2a
      }
      .table-2 tr th {
        padding: 30px;
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


        <div style="position: relative; top: 60px; right:-150px">
            <form action="{{ url('/uploadFood') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="text-2xl mr-2">Title :</label>
                    <input
                        id="title"
                        type="text"
                        class="mb-2 text-2xl"
                        name="title"
                        style="color: black;
                        border-radius:5px;
                        outline:none;
                        border:none;
                        width:450px;"
                        placeholder="Write a title" required>
                </div>

                <div>
                    <label for="price" class="text-2xl mr-2">Price :</label>
                    <input
                        id="price"
                        type="number"
                        class="mb-2 text-2xl"
                        name="price"
                        style="color: black;
                        border-radius:5px;
                        outline:none;
                        border:none;
                        width:450px"
                        placeholder="Price" required>
                </div>

                <div>
                    <label for="image" class="text-2xl mr-2">Image :</label>
                    <input
                        id="image"
                        type="file"
                        class="mb-2 text-2xl"
                        name="image" required>
                </div>

                <div>
                    <label for="description" class="text-2xl mr-2">Description :</label>
                    <input
                        id="description"
                        type="text"
                        class="mb-7 text-2xl"
                        name="description"
                        style="color: black;
                        border-radius:5px;
                        outline:none;
                        border:none;
                        width:450px;"
                        placeholder="Desciption" required><br>
                </div>

                <div>
                    <input
                        type="submit"
                        value="Save" required
                        style="width:100px;
                        background-color: #fb5849;
                        padding: 15px;
                        color: black;
                        font-size: 20px;
                        border-radius:5px;
                        font-weight:bold;
                        margin-bottom:20px">
                </div>
            </form>

            <div>
                <table class="table-2">
                    <tr>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->description }}</td>
                            <td>
                                <img src="/foodImage/{{ $data->image }}">
                            </td>
                            <td><a href="{{ url('/deleteMenu', $data->id) }}">Delete</a></td>
                            <td><a href="{{ url('/updateView', $data->id) }}">Update</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>



    </div>

    @include('admin.includes.adminscripts')
  </body>
</html>
