<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.includes.admincss')
  </head>
  <style>
    .table-div {
        margin-top: 30px;
        margin-left: 30px;
        width: 1200px;
        border: 1px solid #fb5849;
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
</style>
  <body>

    <div class="container-scroller">

        @include('admin.includes.navbar')

        <div class="table-div">
            <table class="table-2" border="1px">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Guest</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                </tr>

                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->guest }}</td>
                    <td>{{ $data->date }}</td>
                    <td>{{ $data->time }}</td>
                    <td>{{ $data->message }}</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

    @include('admin.includes.adminscripts')
  </body>
</html>
