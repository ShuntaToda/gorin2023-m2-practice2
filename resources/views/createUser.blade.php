
@include("header", ["title" => "create user"])
<div class="container mt-5">
  <div class="border p-3 rounded c-login-form m-auto">
    <h2>Create User</h2>
      <form action="{{ route('admin.createUser') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <span class="input-group-text c-create-user__span">Name</span>
          <input class="form-control" type="text" name="name">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text c-create-user__span">Email</span>
          <input class="form-control" type="email" name="email">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text c-create-user__span">Password</span>
          <input class="form-control" type="password" name="password">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text c-create-user__span">Password Confirmation</span>
          <input class="form-control" type="password" name="password_confirmation">
        </div>
        @if(session("message"))
        <div>
          <div class="text-primary">{{ session("message") }}</div>
        </div>
        <!-- $errorsにはallが必要 -->
        @elseif(isset( $errors->all()[0]))
        <div>
          <div class="text-danger">入力が間違っています</div>
        </div>
        @endIf
        <button type="submit" class="btn btn-outline-primary">Submit</button>
      </form>
  </div>
</div>

@include("footer")