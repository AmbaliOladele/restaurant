<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/public">
        @include('admin.includes.admincss')
  </head>
  <style>
      .img1 {
          margin-bottom: 10px;
      }
      .img1 img {
          border-radius: 5px
      }
  </style>
  <body>

    <div class="container-scroller">

        @include('admin.includes.navbar')

        <div style="position: relative; top: 30px; right:-150px">
            <form action="{{ url('/update', $data->id) }}" method="post" enctype="multipart/form-data">
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
                        value="{{ $data->title }}" required>
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
                        value="{{ $data->price }}" required>
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
                        value="{{ $data->description }}" required><br>
                </div>

                <div class="img1">
                    <label for="image" class="text-2xl mr-2">Old Image :</label>
                    <img src="/foodImage/{{ $data->image }}">
                </div>

                <div>
                    <label for="image" class="text-2xl mr-2">New Image :</label>
                    <input
                        id="image"
                        type="file"
                        class="mb-2 text-2xl"
                        name="image" required>
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
        </div>

    </div>

    @include('admin.includes.adminscripts')

    <br>
    <br>
    <br>
  </body>
</html>
