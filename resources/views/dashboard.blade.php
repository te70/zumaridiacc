<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="" style="margin-left: 150px; margin-bottom:30px; margin-right: 150px;">
            <div class="row" style="margin-top: 30px;">          
              <div class="col-sm-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">2</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Live Connections</p>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">2</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Active Campaign</p>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">2</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Users</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">2</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Views</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</x-app-layout>
