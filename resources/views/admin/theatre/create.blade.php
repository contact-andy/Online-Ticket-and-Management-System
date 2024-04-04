<x-admin>
    @section('title'){{ 'Create theatre' }} @endsection
    <section class="content">
        <!-- Default box -->
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Theatre</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.theatre.index') }}"
                                class="btn btn-sm btn-dark">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.theatre.store') }}" method="POST"
                        class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Theatre Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            required="" value="{{ old('name') }}">
                                            @error('name')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        <div class="invalid-feedback">Theatre name field is required.</div>

                                        <label for="location" class="form-label">Theatre location</label>
                                        <input type="text" class="form-control" name="location" id="location"
                                            required="" value="{{ old('location') }}">
                                            <div class="invalid-feedback">Theatre location field is required.</div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="seats" class="form-label">Total number of seats</label>
                                                    <input type="number" class="form-control" name="seats" id="seats"
                                                    required="" value="{{ old('seats') }}">
                                                    <div class="invalid-feedback">Total number of seats field is required.</div>
                                                </div>

                                                <div class="col-6">
                                                    <label for="vseats" class="form-label">Total number of VIP seats</label>
                                                    <input type="number" class="form-control" name="vseats" id="vseats"
                                                    required="" value="{{ old('vseats') }}">
                                                    <div class="invalid-feedback">Total number of VIP seats field is required.</div>
                                                </div>
                                            </div>
                                                    <label for="columns" class="form-label">Number of columns</label>
                                                    <input type="number" class="form-control" name="columns" id="columns"
                                                    required="" value="{{ old('columns') }}">
                                                    <div class="invalid-feedback">Number of columns field is required.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-end float-right">
                            <button type="submit" id="submit"
                                class="btn btn-primary float-end float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
</x-admin>
