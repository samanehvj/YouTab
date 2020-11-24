<?php

include VIEW . 'admin/layouts/header.php';
include VIEW . 'admin/layouts/sidebar.php';

?>
<div class="container d-flex justify-content-around ">
    <form class="mt-5" method="post" action="/size/adminDoAdd" >
        <div class="form-group">
            <input class="form-control" id="name" name="name" placeholder="Size Name" required/>
        </div>


        <button type="submit" class="btn btn-success mt-3">Save</button>

    </form>
</div>
<?php

include VIEW . 'admin/layouts/footer.php';
