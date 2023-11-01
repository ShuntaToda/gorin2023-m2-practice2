
@include("header", ["title" => "show user"])
<div class="container mt-5">
  <div class="border p-3 rounded c-login-form m-auto">
    <h2>Show User</h2>
    
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>role</th>
          <th>isActive</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
          <td>{{ $user->is_active }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@include("footer")