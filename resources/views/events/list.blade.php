<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center"></h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('events.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>    
            @endif            
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Events</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Evt Date</th>
                                <th>Evt Time</th>
                                <th>Venue</th>
                                <th>Seat</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            @if ($Events->isNotEmpty())
                            @foreach ($Events as $Event)
                            <tr>
                                <td>{{ $Event->id }}</td>
                                <td>{{ $Event->eventtitle }}</td>
                                <td>{{ $Event->description }}</td>
                                <td>{{ $Event->eventdate }}</td>
                                <td>{{ $Event->eventtime }}</td>
                                <td>{{ $Event->venue }}</td>
                                <td>{{ $Event->seat }}</td>
                                <td>${{ $Event->price }}</td>
                                <td>
                                    <a href="{{ route('events.edit',$Event->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="#" onclick="deleteEvent({{ $Event->id  }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-event-from-{{ $Event->id  }}" action="{{ route('events.destroy',$Event->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>   
                            @endforeach
                            
                            @endif
                            
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>

<script>
    function deleteEvent(id) {
        if (confirm("Are you sure you want to delete events?")) {
            document.getElementById("delete-event-from-"+id).submit();
        }
    }
</script>