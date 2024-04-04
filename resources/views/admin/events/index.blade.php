<x-admin>
    @section('title')
        {{ 'Events' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sub Events</h3>
            <div class="card-tools">
                <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="eventsTable">
                <thead>
                    <tr>
                        <th>Show Image</th>
                        <th>Show</th>
                        <th>Theatre</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $showtime)
                        <tr>
                            <td><img src="{{ $showtime->show->show_image }}" alt="" style="width: 80%; height:60px;"></td>
                            <td>{{ $showtime->show->name }}</td>
                            <td>{{ $showtime->theatre->name}}</td>
                            <td>{{ $showtime->date}}</td>
                            <td>{{ $showtime->time}}</td>
                            <td><a href="{{ route('admin.events.edit', encrypt($showtime->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.events.destroy', encrypt($showtime->id)) }}"
                                    method="POST" onsubmit="return confirm('Are sure want to delete?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#eventsTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>