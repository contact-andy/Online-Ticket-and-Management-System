<x-admin>
    @section('title')
        {{ 'Edit Event' }}
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Event</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.events.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.events.update',$showtimes) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $showtimes->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="category">Show</label>
                                        <select name="show" id="show" class="form-control" required onchange="showChanged(event)">
                                            <option value="" selected disabled>Select Show</option>
                                            @foreach ($shows as $show)
                                                <option value="{{ $show->id }}">{{ $show->name }}</option>
                                            @endforeach
                                        </select>
                                            @error('shows')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="category">Theatre</label>
                                        <select name="theatre" id="theatre" class="form-control" required onchange="TheatreChanged(event)">
                                            <option value="" selected disabled>Select Theatre</option>
                                            @foreach ($theatres as $theatre)
                                                <option value="{{ $theatre->id }}">{{ $theatre->name }}</option>
                                            @endforeach
                                        </select>
                                            @error('theatres')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image" class="form-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control" required>
                                        @error('image')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Pdf" class="form-label">Time</label>
                                        <input type="time" name="time" id="time" class="form-control" required>
                                        @error('pdf')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                        </div>
                        <input type="hidden" name="selectedShowId" id="selectedShowId">
                        <input type="hidden" name="selectedTheatreId" id="selectedTheatreId">

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
<script>
function showChanged(event) {
        var selectedShowId = event.target.value;
        // Set the value of the hidden input field
        document.getElementById('selectedShowId').value = selectedShowId;

        // Optionally, submit the form programmatically
        document.getElementById('myForm').submit();
    }
    function TheatreChanged(event) {
        var selectedTheatreId = event.target.value;

        // Set the value of the hidden input field
        document.getElementById('selectedTheatreId').value = selectedTheatreId;

        // Optionally, submit the form programmatically
        document.getElementById('myForm').submit();
    }
</script>
