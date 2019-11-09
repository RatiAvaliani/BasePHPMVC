<?php
namespace traits;

trait nav {
    public $navTemplates = [
        'nav' => 'base/nav.php'
    ];
    public $navLinks = [
        'home' => '',
        'login' => 'user/login'
    ];

    public function setNav () {
        $this->setLoginNav();
        $this->setAdminNav();
        $this->loadViews($this->navTemplates['nav']);
    }

    private function setLoginNav () {
        if ($this->getSession('userID')) {
            $this->navLinks = [
                'home' => '',
                'logout' => 'user/logout',
                'apply' => 'application/send'
            ];
        }
    }
    private function setAdminNav () {
        if ($this->getSession('userType') == 2) {
            unset($this->navLinks['apply']);
            $this->navLinks['applications'] = 'application/list';
        }
    }
}