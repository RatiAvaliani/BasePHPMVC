<?php
namespace traits;

trait notifications {
    public $notificationTemplates = [
        'display' => 'base/notification.php'
    ];
    public $notification;

    public function setNotification (string $val) {
        setcookie("notification", $val, time()+360);
    }

    public function getNotifications () {
        if (!isset($_COOKIE['notification'])) {
            return null;
        }
        $this->notification = $_COOKIE['notification'];
        $this->loadViews($this->notificationTemplates['display']);
        $this->unsetNotifications();
    }

    public function unsetNotifications () {
        setcookie("notification", '', time()-360);
    }
}