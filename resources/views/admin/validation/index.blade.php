<x-admin>
    @section('title'){{ 'Validate Ticket' }} @endsection
    <section class="content">
        <!-- Default box -->
        <div class="d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Validation</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.role.store') }}" method="POST"
                        class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Enter Transaction ID</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            required="" value="{{ old('name') }}">
                                            @error('name')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        <div class="invalid-feedback">Role name field is required.</div>
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

        <div class="container mt-5 col-lg-6 card">
            <div class="ticket-validation-container">
              <!-- Customer Info Section -->
              <div class="info-section" id="customerInfo">
                <h4 class="text-center">Customer Information</h4>
                <p><strong>Name:</strong> <span id="customerName"></span></p>
                <p><strong>Number of Seats Reserved:</strong> <span id="seatsReserved"></span></p>
                <p><strong>Seat Names:</strong> <span id="seatNames"></span></p>
              </div>
            </div>
          </div>

    </section>
</x-admin>