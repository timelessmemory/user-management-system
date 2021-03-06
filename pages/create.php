<header class="nav-top">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand">User Management System</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#/list"><i class="glyphicon glyphicon-th-list"></i> User List</a></li>
        <li><a href="#/create"><i class="glyphicon glyphicon-file"></i> Create User</a></li>
        <li><a href='#/' ng-click="logout()"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
        <li><a>Welcome, <?php session_start(); echo $_SESSION['username']; ?></a></li>
      </ul>
    </div>
  </nav>
</header>

<form class="top-div">
  <div class="form-group">
    <label for="inputUserName">Username:</label>
    <input type="text" class="form-control" id="inputUserName" ng-model="user.name" required autofocus />
  </div>
  <div class="form-group">
    <label for="inputPassword">Password:</label>
    <input type="text" class="form-control" id="inputPassword" ng-model="user.password" required />
  </div>
  <div class="form-group">
    <label for="inputDescription">Description:</label>
    <textarea class="form-control" id="inputDescription" rows="5" ng-model="user.description" required></textarea>
  </div>
  <button class="btn btn-info" ng-click="cancel()">Cancel</button>
  <button type="submit" class="btn btn-success" ng-click="create()">Create</button>
</form>