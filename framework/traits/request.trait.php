<?php
namespace traits;

trait request {
    /**
     * @param string $action
     * @return request
     * tests incoming request responds(POST, GET) appropriately.
     */
    public function loadAction (string $action): self {
        $request = $_SERVER['REQUEST_METHOD'];
        if ($request == 'GET') {
            $action = $action . 'Action';
            if (!method_exists($this, $action)) return $this->error404();
            $this->$action($_GET);
        } elseif ($request == "POST") {
            $action = $action . 'PostAction';
            if (!method_exists($this, $action)) return $this->error404();
            $this->$action($_POST);
        }

        return $this;
    }
}