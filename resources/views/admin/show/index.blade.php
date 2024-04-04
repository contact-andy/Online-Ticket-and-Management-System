<x-admin>
    @section('title')
        {{ 'Shows' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Shows Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.show.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="showTable">
                <thead>
                    <tr>
                        <th>Show image</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Description</th>
                        <th>Production Year</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $show)
                        <tr>
                            <td><img src="{{ $show->show_image }}" alt="" style="width: 80%; height:60px;"></td>
                            <td>{{$show->name }}</td>
                            <td>{{$show->genre}}</td>
                            <td>{{$show->description}}</td>
                            <td>{{$show->production_year}}</td>
                            <td><a href="{{ route('admin.show.edit', encrypt($show->id)) }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.show.destroy', encrypt($show->id)) }}" method="POST"
                                    onsubmit="return confirm('Are sure want to delete?')">
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
                $('#showTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "responsive": true,
                });
            });
        </script>
    @endsection
</x-admin>
