
@include("header", ["title" => "login"])
<div class="container mt-5">
  <div class="border p-3 rounded c-login-form m-auto">
    <h1>Login</h1>
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <span class="input-group-text c-login-form__span">Name</span>
          <input class="form-control" type="text" name="name">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text c-login-form__span">Password</span>
          <input class="form-control" type="password" name="password">
        </div>
        @if(session("message"))
        <div>
          <div class="text-danger">{{ session("message") }}</div>
        </div>
        @endIf
        <button type="submit" class="btn btn-outline-primary">Submit</button>
      </form>
  </div>
</div>

@include("footer")