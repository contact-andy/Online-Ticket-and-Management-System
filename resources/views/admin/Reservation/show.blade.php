<x-admin>
    @section('title')
        {{ 'Reservation' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Show Reservation</h3>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="reservationTable">
                <thead>
                    <tr>
                        <th>Show Image</th>
                        <th>Title</th>
                        <th>Theatre</th>
                        <th>VIPSeat Reserved</th>
                        <th>RegularSeat Reserved</th>
                        <th>Total Reserved</th>
                        <th>Total Seats</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($showtime as $st)
                        <tr>
                            <td><img src="{{ $st->show->show_image }}" alt="" style="width: 50%; height:80px;"></td>
                            <td>{{ $st->show->name }}</td>
                            <td>{{$st->theatre->name}}</td>
                            <td>{{ $vipreserved }}</td>
                            <td>{{ $regularReserved}}</td>
                            <td>{{ $totalreserved}}</td>
                            <td>{{$totalseat}}</td>
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
