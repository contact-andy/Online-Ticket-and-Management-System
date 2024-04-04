<x-admin>
    @section('title')
        {{ 'Reservation' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Show Reservation</h3>
            <div class="card-tools">
                <a href="{{ route('admin.reservation.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="reservationTable">
                <thead>
                    <tr>
                        <th>Show Image</th>
                        <th>Title</th>
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
                            <td><img src="{{ $showtime->show->show_image }}" alt="" style="width: 50%; height:80px;"></td>
                            <td>{{ $showtime->show->name }}</td>
                            <td>{{$showtime->theatre->name}}</td>
                            <td>{{ $showtime->date}}</td>
                            <td>{{ $showtime->time}}</td>
                            <td><a href="{{ route('admin.reservation.show', encrypt($showtime->id)) }}"
                                    class="btn btn-sm btn-primary">Show reservation</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @section('js')
        <script>
            $(function() {
                $('#reservationTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
