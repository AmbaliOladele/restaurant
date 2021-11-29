<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.includes.admincss')
  </head>
  <style>
      .table-div {
          padding: 30px;
          margin-left: 10px;
          height: 120px;
      }
      .table-div h2{
        margin-left: 50px;
      }
      .table {
          margin-top: 20px;
      }
      .table tr th {
          padding: 10px;
          font-size: 18px;
          color: white;
      }
      .table tr td {
        font-size: 15px;
        text-align: center;
      }
      form {
          display: flex;
          justify-content: right;
          margin-right: 40px;
      }
      form input[type="search"] {
          width: 200px;
          border-radius: 5px;
          color: #212121;
      }
      form input[type="submit"] {
          width: 80px;
          margin-left: 2px;
      }
  </style>
  <body>

    <div class="container-scroller">

        @include('admin.includes.navbar')

        <div class="table-div container">
            <h2 class="h2">Customer Orders</h2>
            <form action="{{ url('/search') }}" method="get" class="pull-right">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-info" value="Search">
            </form>
            <table class="table ml-4 mr-4 table-responsive">
                <tr class="table-row">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Foodname</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->phone_number }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->food_name }}</td>
                    <td>{{ $data->price }}$</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->price * $data->quantity }}$</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

    @include('admin.includes.adminscripts')
  </body>
</html>
