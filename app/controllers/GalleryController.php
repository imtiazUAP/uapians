<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Gallery.php';
require_once BASE_DIR . '/app/config/config.php';

class GalleryController extends BaseController
{
    public function list($queryParams)
    {
        $photos = Gallery::getAllPhotos();

        $data = compact('photos');
        $this->render(
            'gallery/list.php',
            $data
        );
    }

    public function add($queryParams)
    {
        $this->render(
            'gallery/add.php',
            [],
            false
        );
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'photo_caption' => $_POST['photo_caption']
            ];

            $file = $_FILES['file'];

            $success = Gallery::photoSave($data, $file);

            if ($success) {
                header('Location: ' . BASE_URL . '/gallery/add?message=Photo+Saved+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/gallery/add?message=Photo+Save+Failed');
            }
            exit();
        }
    }

    public function deleteConfirm($queryParams) {
        $photo = Gallery::getPhotoByPhotoId($queryParams['photo_id']);
        $this->render(
            'gallery/delete.php',
            compact('photo'),
            false
        );

    }
    

    public function deleteExecute()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'photo_id' => $_POST['photo_id']
            ];

            $success = Gallery::deletePhoto($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/gallery/delete-confirm?CID=' . $data['CID'] . '&message=Photo+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/gallery/delete-confirm?CID=' . $data['CID'] . '&message=Photo+Delete+Failed');
            }
            exit();
        }
    }
}