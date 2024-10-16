@section('navbarBrand')          
  <a class="navbar-brand" href="{{ url('dashboard') }}">Dashboard</a>
  <a class="navbar-brand active" href="#" >My Title</a>
@endsection

@section('content')

    <div class="py-4">
        <div class="container">
            <div class="row">

                @if (session('message'))
                    <h5>{{ session('message') }}</h5>
                @endif

                <div class="col-md-12">
                  <div class="titleList">
                    <h4><i class="material-icons">brightness_auto</i>My Title
                        <a href="#" class="btn btn-primary float-right">Button</a>
                    </h4><br><br> 
                    <div class="container">
                        <h4>Empty Page</h4>
                        <br><br> 

                </div>
                  </div>
                      
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "886498d0-9f7c-4355-8483-65df4c4b2d31",
    });
  });
</script>
@endsection