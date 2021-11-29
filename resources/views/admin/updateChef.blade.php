<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        <base href="/public">
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
    .form .form-div img {
        color: #fb5849;
    }
</style>
  <body>

    <div class="container-scroller">

        @include('admin.includes.navbar')

        <form class="form" action="{{ url('/updateFoodChef', $data->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-div">
                <label for="name">Name:</label><br>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ $data->name }}"><br>
            </div>

            <div class="form-div">
                <label for="specialty">Specialty:</label><br>
                <input
                    type="text"
                    name="specialty"
                    id="specialty"
                    value="{{ $data->specialty }}"><br>
            </div>

            <div class="form-div">
                <label for="image" class="text-2xl mr-2">Old Image :</label>
                <img width="200" height="300px" src="/chefimage/{{ $data->image }}">
            </div>

            <div class="form-div">
                <label for="New image">New Image:</label>
                <input
                    type="file"
                    name="image"
                    id="New image"
                   >
            </div>

            <div class="form-div">
                <input
                    type="submit"
                    value="update chef">
            </div>

        </form>

    </div>

    @include('admin.includes.adminscripts')
  </body>
</html>
