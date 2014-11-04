<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>AtlasDev - Backend login</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
    </head>
    <body class="loadwait">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div id="loader-txt">Logging in..</div>
            <div class="loader-section"></div>
        </div>
        <div class="container-fluid">
            <div class="pane">
                <h2>Admin area</h2>
                <hr />
                <div id="error">test</div>
                <form class="form-horizontal" role="form" id="login">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" style="width: 100%;" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>