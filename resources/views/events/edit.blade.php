<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="bg-dark py-3">
        <h3 class="text-white text-center"></h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('events.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Edit Event</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('events.update',$Event->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Title</label>
                                <input value="{{ old('eventtitle',$Event->eventtitle) }}" type="text" class="@error('eventtitle') is-invalid @enderror form-control-lg form-control" placeholder="eventtitle" name="eventtitle">
                                @error('eventtitle')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                        <label class="form-label h5">Description</label>
                        <input type="text" value="{{old('description',$Event->description )}}" class="@error("description") is-invalid @enderror form-control form-control-lg" placeholder="Event Description" name="description"/>
                        @error('description')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label h5">Event Date</label>
                        <input type="date" value="{{old('eventdate',$Event->eventdate)}}"class="@error("eventdate") is-invalid @enderror form-control form-control-lg" placeholder="date" name="eventdate"/>
                        @error('eventdate')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5">Event Time</label>
                        <input type="time" value="{{old('eventtime',$Event->eventtime)}}" class="@error("eventtime") is-invalid @enderror form-control form-control-lg" placeholder="Title" name="eventtime"/>
                        @error('eventtime')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5">Venue</label>
                        <input type="text" value="{{old('venue',$Event->venue)}}" class="@error("venue") is-invalid @enderror form-control form-control-lg" placeholder="venue" name="venue"/>
                        @error('venue')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5 ">Seat</label>
                        <input type="text" value="{{old('seat',$Event->seat)}}" class=" @error("seat") is-invalid @enderror form-control form-control-lg" placeholder="seat" name="seat"/>
                        @error('seat')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5">Price</label>
                        <input type="number" value="{{old('price',$Event->price)}}" class="@error("price") is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price"/>
                        @error('price')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                           
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>