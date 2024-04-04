<x-admin>
<div class="row">
    @role('admin')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>40</h3>
                    <p>Ticket Sold Yesterday</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
            
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>100</h3>
                    <p>Tickes Sold Last Week</p>
                </div>
                <div class="icon">
                    <i class="fas fa-list-alt"></i>
                </div>
          
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>360</h3>
                    <p>Tickes Sold last Month</p>
                </div>
                <div class="icon">
                    <i class="fas fas fa-th"></i>
                </div>
    
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>1000</h3>
                    <p>Total Tickets Sold within 6 months</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                
            </div>
        </div>
    @endrole
</div>

</x-admin>
