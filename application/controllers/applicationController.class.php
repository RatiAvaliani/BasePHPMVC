<?php
use Controller\Controller;
use traits\nav;
use traits\session;
use traits\notifications;

class applicationController extends Controller {
    use nav;
    use session;
    use notifications;

    public $templates = [
        'applicationSend' => 'application/send.php',
        'applicationEdit' => 'application/edit.php',
        'applicationAdminList' => 'application/adminList.php'
    ];

    public function __construct ($model, $action) {
        parent::__construct($model, $action);
    }

    public function sendAction () {
        if (!$this->getSession('userID')) {
            $this->model->redirect('/user/login');
        }
        return $this->loadViews($this->templates['applicationSend']);
    }

    public function sendPostAction () {
        if (!$this->getSession('userID')) {
            $this->model->redirect('/user/login');
        }
        $this->model->saveApplication($_POST);
        $this->model->redirect('/application/send');
    }

    public function listAction () {
        if ($this->getSession('userType') != 2 && !isset($_GET['id'])) {
            $this->model->redirect('/');
        }

        return $this->loadViews($this->templates['applicationAdminList']);
    }

    public function deleteAction () {
        if ($this->getSession('userType') != 2 && !isset($_GET['id'])) {
            $this->model->redirect('/');
        }

        $this->model->deleteApplication($_GET['id']);
        $this->model->redirect('/application/list');
    }

    public function editAction () {
        if ($this->getSession('userType') != 2 && !isset($_GET['id'])) {
            $this->model->redirect('/');
        }

        $this->model->application = $this->model->applications->getByID($_GET['id']);
        return $this->loadViews($this->templates['applicationEdit']);
    }

    public function editPostAction () {
        if ($this->getSession('userType') != 2 && !isset($_POST['applicationID'])) {
            $this->model->redirect('/');
        }

        $this->model->updateApplication($_POST);
        $this->model->redirect('/application/edit&id=' . $_POST['applicationID']);
    }
    public function approveAction () {
        if ($this->getSession('userType') != 2 && !isset($_GET['id'])) {
            $this->model->redirect('/');
        }

        $this->model->approveApplication($_GET['id']);
        $this->model->redirect('/application/list');
    }
    public function deleteImageAction () {
        if ($this->getSession('userType') != 2 && !isset($_GET['id'])) {
            $this->model->redirect('/');
        }

        $this->model->deleteImageApplication($_GET['id']);
        $this->model->redirect('/application/edit&id='.$_GET['id']);
    }
}