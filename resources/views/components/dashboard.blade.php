<div class="row">
    @role('admin')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $user }}</h3>
                    <p>Total Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $show }}</h3>
                    <p>Total Shows</p>
                </div>
                <div class="icon">
                    <i class="fas fa-microphone"></i>
                </div>
                <a href="{{ route('admin.show.index') }}" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $theatre }}</h3>
                    <p>Total Theatres</p>
                </div>
                <div class="icon">
                    <i class="fas fas fa-theater-masks"></i>
                </div>
                <a href="{{ route('admin.theatre.index') }}" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $collection }}</h3>
                    <p>Total Collections</p>
                </div>
                <div class="icon">
                    <i class="fas fas fa-file-pdf"></i>
                </div>
                <a href="" class="small-box-footer">View <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div> -->
        </div>
    @endrole
</div>
