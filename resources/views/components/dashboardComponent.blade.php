<!-- Transactions -->
<div class="col-lg-12">
  <div class="card">
      <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">Transactions</h5>
          </div>
          {{-- <p class="mt-3"><span class="fw-medium">Total 48.5% growth</span> 😎 this month</p> --}}
      </div>
      <div class="card-body">
          <div class="row g-3">
              <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                      <div class="avatar">
                          <div class="avatar-initial bg-primary rounded shadow">
                              <i class="mdi mdi-trending-up mdi-24px"></i>
                          </div>
                      </div>
                      <div class="ms-3">
                          <div class="small mb-1">Sales</div>
                          <h5 class="mb-0">245k</h5>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                      <div class="avatar">
                          <div class="avatar-initial bg-success rounded shadow">
                              <i class="mdi mdi-account-outline mdi-24px"></i>
                          </div>
                      </div>
                      <div class="ms-3">
                          <div class="small mb-1">Customers</div>
                          <h5 class="mb-0">12.5k</h5>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                      <div class="avatar">
                          <div class="avatar-initial bg-warning rounded shadow">
                              <i class="mdi mdi-cellphone-link mdi-24px"></i>
                          </div>
                      </div>
                      <div class="ms-3">
                          <div class="small mb-1">Product</div>
                          <h5 class="mb-0">1.54k</h5>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                      <div class="avatar">
                          <div class="avatar-initial bg-info rounded shadow">
                              <i class="mdi mdi-currency-usd mdi-24px"></i>
                          </div>
                      </div>
                      <div class="ms-3">
                          <div class="small mb-1">Revenue</div>
                          <h5 class="mb-0">$88k</h5>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ Transactions -->
<!-- Weekly Overview Chart -->
<div class="col-xl-12 col-md-12">
  <div class="card">
      <div class="card-header">
          <div class="d-flex justify-content-between">
              <h5 class="mb-1">Weekly Overview</h5>
          </div>
      </div>
      <div class="card-body">
          <div id="chartPengeluaran"></div>
      </div>
  </div>
</div>
<!--/ Weekly Overview Chart -->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            chart: {
                type: 'bar',
                height: 400,
                stacked: false
            },
            series: @json($series),
            xaxis: {
                categories: @json($labels)
            },
            colors: [
                '#FF4560', '#00E396', '#008FFB', '#FEB019', '#775DD0',
                '#3F51B5', '#546E7A', '#D4526E', '#8D5B4C', '#F86624'
            ]
        };

        var chart = new ApexCharts(document.querySelector("#chartPengeluaran"), options);
        chart.render();
    });
</script>
