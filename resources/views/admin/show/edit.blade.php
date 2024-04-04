<x-admin>
    @section('title')
        {{ 'Edit Show' }}
    @endsection
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit show</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.show.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.show.update',$data) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <div>
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter show name" required value="{{$data->name}}">
                                            </div>
                                <div class="row">
                                    <div class="col-6">
                                            <label for="category">Category</label>
                                            <select id="category" class="form-control"  name="category" value="{{$data->category}}">
                                            <option selected>Drama</option>
                                            <option>Music</option>
                                            </select>
                                    </div>
                                        <div class="col-6">
                                            <label for="genre">Genre</label>
                                            <select id="genre" class="form-control"  name="genre">
                                            <option selected>{{$data->genre}}</option>
                                            <option>Comedy</option>
                                            <option>Drama</option>
                                            <option>Thriller</option>
                                            </select>
                                        </div>
                                </div>
                                    <br>
                                    <div class="mb-3">
                                       <label for="image">Show Image</label>
                                       <input class="form-control" type="file" id="image" name="image">
                                       </div>

                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" value="{{$data->description}}"></textarea>

                                    <label for="name">Production year</label>
                                    <input type="text" class="form-control" id="productionyear" name="productionyear"
                                    placeholder="Enter production year" required value="{{$data->production_year}}">  
                                </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
