<x-admin>
    @section('title')
        {{ 'Theatre' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Theatre Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.theatre.create') }}" class="btn btn-sm btn-primary">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="theatreTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Number of rows</th>
                        <th>Number of columns</th>
                        <th>Capacity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $theatre)
                        <tr>
                            <td>{{ $theatre->name }}</td>
                            <td>{{ $theatre->location}}</td>
                            <td>{{ $theatre->number_of_rows }}</td>
                            <td>{{ $theatre->number_of_columns }}</td>
                            <td>{{ $theatre->number_of_columns * $theatre->number_of_rows}}</td>
                            <td>
                                <a href="{{ route('admin.theatre.edit', encrypt($theatre->id)) }}"
                                    class="btn btn-sm btn-secondary">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.theatre.destroy', encrypt($theatre->id)) }}"
                                    method="POST" onclick="confirm('Are you sure')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
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
                $('#theatreTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
