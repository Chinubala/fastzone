@extends("layouts.default")
@section("title", "create")

@section("content")
<div class="bg-dark py-3">
    <h3 class="text-white text-center "></h3>
</div>

<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-5">
            <div class="card-header bg-dark">
                        <h3 class="text-white">Create Event</h3>
                    </div>               
                     <div class="card-body">
                    <form method="post" action="{{route('events.store')}}">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label h5">Title</label>
                        <input type="text" value="{{old('eventtitle')}}" class="@error("eventtitle") is-invalid @enderror form-control form-control-lg" placeholder=" Event Title" name="eventtitle"/>
                     @error('eventtitle')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label h5">Description</label>
                        <input type="text" value="{{old('description')}}" class="@error("description") is-invalid @enderror form-control form-control-lg" placeholder="Event Description" name="description"/>
                        @error('description')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label h5">Event Date</label>
                        <input type="date" value="{{old('eventdate')}}"class="@error("eventdate") is-invalid @enderror form-control form-control-lg" placeholder="date" name="eventdate"/>
                        @error('eventdate')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5">Event Time</label>
                        <input type="time" value="{{old('eventtime')}}" class="@error("eventtime") is-invalid @enderror form-control form-control-lg" placeholder="Title" name="eventtime"/>
                        @error('eventtime')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5">Venue</label>
                        <input type="text" value="{{old('venue')}}" class="@error("venue") is-invalid @enderror form-control form-control-lg" placeholder="venue" name="venue"/>
                        @error('venue')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5 ">Seat</label>
                        <input type="text" value="{{old('seat')}}" class=" @error("seat") is-invalid @enderror form-control form-control-lg" placeholder="seat" name="seat"/>
                        @error('seat')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label h5">Price</label>
                        <input type="number" value="{{old('price')}}" class="@error("price") is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price"/>
                        @error('price')
                     <p class="invalid-feedback">{{ $message}}</p>
                     @enderror
                    </div>
                    <div class="d-grid mb-3">
                        <button class="btn btn-lg btn-primary">Submit</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection