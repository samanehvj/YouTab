<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/color/adminDoAdd" >
        <div class="form-group">
            <input class="form-control" id="name" name="name" placeholder="Color Name" required/>
        </div>
        <div class="form-group">
            <input  class="form-control" id="hex" name="hex" placeholder="Hex Number (4FcategoryEdit.php36A9)" required/>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
