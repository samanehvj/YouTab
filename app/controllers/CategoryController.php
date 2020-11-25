<?php


class CategoryController extends Controller
{
    public function adminList()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {
            $categoryModel = $this->model('Category');
            $categoryData['categories'] = $categoryModel->getAll();

            $this->setView('admin/categoriesList', $categoryData);
            $this->view->pageTitle = SITENAME . " - Category List";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminAdd()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            $this->setView('admin/categoryAdd');
            $this->view->pageTitle = SITENAME . " - Category Add";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDoAdd()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $_SESSION['err'] = 'All fields should be filled';
                $this->go('category', 'adminAdd');
            }

            if ($_FILES['image']['size'] == 0) {
                $_SESSION['err'] = 'Image field should not be empty';
                $this->go('category', 'adminAdd');
            }


            $target_dir = "imgs/";
            $newName =  $_POST['name'];


            // check the extension of the uploaded file
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            //create unique file name for each subscriber image file
            $target_file = $target_dir . $newName . '.' . $ext;

            //set allowed file type to be submit
            $allowFileType = array('png', 'jpg', 'jpeg');

            //if the file extension is not allowed redirect to main
            if (!in_array($ext, $allowFileType)) {
                $_SESSION['err'] = 'Image is not valid only (png, jpg and jpeg)';
                $this->go('category', 'adminAdd');
            }

            //try to move uploaded file to assignment directory and then add data to database
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $categoryModel = $this->model('Category');

                if ($categoryModel->add($_POST['name'], $target_file, $_POST['info'])) {
                    $_SESSION['success'] = true;
                    $this->go('category', 'adminList');
                }
            }

        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminEdit($id = 0)
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && $id > 0) {

            $categoryModel = $this->model('Category');
            $category =  $categoryModel->getById($id);
            $this->setView('admin/categoryEdit', $category);
            $this->view->pageTitle = SITENAME . " - Category Edit";
            $this->view->render();
        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDoEdit()
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin']) {

            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $_SESSION['err'] = 'All fields should be filled';
                $this->go('category', 'adminList');
            }

            $target_file = '';

            if ($_FILES['image']['size'] > 0) {

                $target_dir = "imgs/";
                $newName = $_POST['name'];

                // check the extension of the uploaded file
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                //create unique file name for each subscriber image file
                $target_file = $target_dir . $newName . '.' . $ext;

                //set allowed file type to be submit
                $allowFileType = array('png', 'jpg', 'jpeg');

                //if the file extension is not allowed redirect to main
                if (!in_array($ext, $allowFileType)) {
                    $_SESSION['err'] = 'Image is not valid only (png, jpg and jpeg)';
                    $this->go('category', 'adminList');
                }
            }

            $imgIsUploaded = true;

            //try to move uploaded file to assignment directory and then add data to database
            if (!empty($target_file)) {
                unlink($_POST['currentImage']);
                $imgIsUploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            }

            if ($imgIsUploaded) {
                $categoryModel = $this->model('Category');

                if ($categoryModel->edit($_POST['id'], $_POST['name'], $target_file, $_POST['info'])) {
                    $_SESSION['success'] = true;
                    $this->go('category', 'adminList');
                }
            }

        } else {
            $this->go('home', 'auth');
        }
    }

    public function adminDelete($id = 0)
    {
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] && $id > 0) {

            $categoryModel = $this->model('Category');
            $category =  $categoryModel->getById($id);
            unlink($category->img);
            $categoryModel->delete($id);
            $this->go('category', 'adminList');
        } else {
            $this->go('home', 'auth');
        }
    }

}