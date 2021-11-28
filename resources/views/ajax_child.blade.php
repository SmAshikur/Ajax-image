

<table class="table table-bodered table-striped" >
    <thead>
        <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Image </th>
           <th>Address </th>
           <th>Mobile</th>
           <th >Edit</th>
           <th>Delete</th>
        </tr>
    </thead>
    <tbody >
        @foreach ($data as $dat )
        <tr>
            <td>{{$dat->id}}</td>
            <td>{{$dat->name}}</td>
            <td><img src="{{asset('images/'.$dat->image)}}" height="70px" width="100px"> </td>
            <td>{{$dat->address}} </td>
            <td>{{$dat->mobile}}</td>
            <td><button class="edt-btn btn btn-success" value={{$dat->id}}>Edit</button></td>
            <td><button class="del-btn btn btn-danger" value={{$dat->id}}>Delete</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
