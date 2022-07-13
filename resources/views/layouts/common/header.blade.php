<header>
  <!-- Header Start -->
 <div class="header-area">
      <div class="main-header ">
          <div class="header-mid d-none d-md-block">
             <div class="container">
                  <div class="row d-flex align-items-center">
                      <!-- Logo -->
                      <div class="col-xl-3 col-lg-3 col-md-3 offset-5">
                          <div class="logo">
                              <a href="{{ url('/') }}"><img src="{{ url('assets/img/logo/logo.png') }}" alt=""></a>
                          </div>
                      </div>

                      <div class="col-xl-4 col-lg-4 col-md-4">
                          <div class="row d-flex justify-content-between align-items-center">
                              <div class="header-info-left">
                                  <ul>
                                      <li> <span id="temp"></span>ºc, <span id="descr"></span> </li>
                                      <li>{{ date('D-M-y') }} </li>
                                  </ul>
                              </div>
                          </div>
                     </div>

                  </div>
             </div>
          </div>
         <div class="header-bottom header-sticky">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                          <!-- sticky -->
                              <div class="sticky-logo">
                                  <a href="{{ url('/') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                              </div>
                          <!-- Main-menu -->
                          <div class="main-menu d-none d-md-block">
                              <nav>
                                  <ul id="navigation">
                                      <li><a href="{{ url('/') }}">Home</a></li>
                                      <li><a href="{{ url('news/entertainment/all') }}">Entertainment</a></li>
                                      <li><a href="{{ url('news/sports/all') }}">Sports</a></li>
                                      <li><a href="{{ url('news/international/all') }}">International</a></li>
                                      <li><a href="{{ url('login') }}">Admin Login</a></li>
                                  </ul>
                              </nav>
                          </div>
                       </div>
                      </div>

                      <!-- Mobile Menu -->
                      <div class="col-12">
                          <div class="mobile_menu d-block d-md-none"></div>
                      </div>
                  </div>
              </div>
         </div>
      </div>
 </div>
</header>

<script>
  window.onload = () => {
      getCurrentLocationData()
  }

  const getCurrentLocationData = () => {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(position => {
          let latitude = position.coords.latitude
          let longitude =  position.coords.longitude
          getWeatherData(latitude, longitude)
      })
  }

  const getWeatherData = (latitude, longitude) => {
      const apiKey = "f8382423584df1d2d4f575765ec32fe6";
      let apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=imperial&appid=${apiKey}`
      return fetch(apiUrl)
          .then(resp => resp.json())
          .then(data => {
              const description =  data.weather[0].main;
              const temperature =  data.main.temp;
              const celcius = Math.floor(((temperature - 32) * 5)/9)
              document.getElementById('temp').innerText = celcius;
              document.getElementById('descr').innerText = description;
          })
  }
}

</script>
