<x-layout>
  <x-slot name="title">Dashboard</x-slot>
  <x-slot name="breadcrumb_active">Dashboard</x-slot>
  <x-slot name="card_footer">@CoLearn</x-slot>

  <div class="card-body">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <div class="col-md-3">
          <div class="info-box bg-primary">
            <div class="icon">
              <i class="fa-solid fa-users"></i>
            </div>
            <div class="details">
              <h3 style="visibility: hidden;">Transparent</h3>
              <p>Data</p>
              <a href="#">More Info</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info-box bg-success">
            <div class="icon">
              <i class="fa-solid fa-circle-stop"></i>
            </div>
            <div class="details">
              <h3>{{ $totalServices ?? 'null'}}</h3>
              <p>Data</p>
              <a href="#">More Info</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info-box bg-warning">
            <div class="icon">
              <i class="fa-solid fa-person-circle-check"></i>
            </div>
            <div class="details">
              <h3>{{  $userOrdersCount ?? 'null'}}</h3>
              <p>Your Discuss</p>
              <a href="#" class="text-dark">More Info</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info-box bg-danger">
            <div class="icon">
              <i class="fa-solid fa-person-circle-check"></i>
            </div>
            <div class="details">
              <h3 style="visibility: hidden;">Transparent</h3>
              <a href="#" class="text-white"><strong>MATCH NOW !</strong></a>
              <p style="visibility: hidden;">More Info</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-between">
    <div class="card-body card-dashboard">
      <fieldset>
        @auth
        @if (Auth::check())
        <legend style="color: black; font-weight: bold;">Hi, {{ ucwords(Auth::user()->name) }}!</legend>
        <article style="text-align: justify; color: black;">
          <span style="font-size: 150%;">L</span>orem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, labore vel enim similique qui voluptate magnam. Molestias labore recusandae dolore at, iure dolorum deleniti doloribus dicta quasi reiciendis consequatur official Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, corporis omnis? Numquam impedit ducimus asperiores sapiente repudiandae molestiae non possimus eius velit quod temporibus sed aliquid, iure necessitatibus iste debitis!
        </article>
        @endif
        @endauth
      </fieldset>
    </div>

    <div class="card-body card-dashboard" id="current-time-card">
      <h4 class="pb-2" style="font-weight: bold; text-align: center;">

        <p class="btn btn-outline-info" style="font-weight: bold;">Current Time</p>
      </h4>
      <p id="current-time" style="font-size: 1.2em; color: black; font-weight: bold; text-align: center;"></p>
    </div>
  </div>

</x-layout>

<script>
  function updateTime() {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
    const now = new Date();
    document.getElementById('current-time').textContent = now.toLocaleString('en-US', options);
  }

  updateTime();
  setInterval(updateTime, 1000);
</script>