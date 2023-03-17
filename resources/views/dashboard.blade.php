<x-app-layout>
    <div class="m-3">
        <div class="container">
            <div class="row ms-auto me-auto" style="">          
              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">{{$winesRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Wines revenue</p>
                  </div>
                </div>
              </div>
              
              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">{{$barRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Bar revenue</p>
                  </div>
                </div>
              </div>
              
              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">{{$psRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Playstation revenue</p>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">{{$ibRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Inbet revenue</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="btn-group mr-2 pt-8" style="margin-left: 250px;">
            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: {!! json_encode($labels) !!},
          datasets: [{
            label: 'Number of products',
            data: {!! json_encode($data) !!},
            backgroundColor: ['rgb(132, 174, 242)',],
            borderColor: ['rgb(59, 130, 236)',],
            borderWidth: 2
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
</x-app-layout>
