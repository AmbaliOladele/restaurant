<x-app-layout>

</x-app-layout> 

<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.includes.admincss')
  </head>
  <body>
    <div class="container-scroller">

    @include('admin.includes.navbar')

    
    <div style="position: relative; top: 60px; right: -150px">
        <table class="bg-gray-500 text-gray-50 border-4 w-4/5">
            <tr>
                <th class="p-4">Name</th>
                <th class="p-4">Email</th>
                <th class="p-4">Action</th>
            </tr>

            @foreach ($data as $data)
              <tr align="center">
                <td class="p-3 border-b border-gray-300">{{ $data->name }}</td>
                <td class="p-3 border-b border-gray-300">{{ $data->email }}</td>
                 
                @if ($data->usertype == '0')
                  <td class="p-3 border-b border-gray-300">
                    <a href="{{url('/deleteuser', $data->id)}}">Delete</a>
                  </td> 
                @else
                  <td class="p-3 border-b border-gray-300">Not Allowed</td> 
                @endif
                
              </tr>
            @endforeach
            
        </table>
    </div>

    </div>

    @include('admin.includes.adminscripts')
  </body>
</html>
