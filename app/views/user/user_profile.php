<?php include VIEW . 'layouts/header.php' ?>

<div class="container">
  <div class=".col-xs-4 .col-md-offset-2">

    <div class="panel panel-default panel-info Profile">
      <div class="display-4"> My Profile </div>

      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Oops!</strong> Profile not saved. Try later.
      </div>

      <div class="panel-body">
        <div class="form-horizontal">
                    <form>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Name</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="Name"
                                    placeholder=" Name" ng-model="me.Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="email"
                                    placeholder="Email" ng-model="me.email">
                            </div>
                        </div>
            <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="address"
                                    placeholder="Address" ng-model="me.email">
                            </div>
                        </div>
            <div class="form-group">
                            <label class="col-sm-2 control-label">Postal Code</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="Postal Code"
                                    placeholder="Postal Code" ng-model="me.email">
                            </div>
                        </div>

            <div class="form-group">
                            <label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="phone"
                                    placeholder="xxx-xxx-xxxx" ng-model="me.email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-dark text-light" ng-click="updateMe()">Update</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end form-horizontal -->
      </div> <!-- end panel-body -->

    </div> <!-- end panel -->


  </div> <!-- end size -->
</div> <!-- end container-fluid -->

<?php include VIEW . 'layouts/footer.php' ?>