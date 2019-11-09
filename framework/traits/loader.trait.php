<?php
namespace traits;

trait loader {
    public function loadViews (string $path): self {
       return $this->load(VIEWS_PATH, $path);
    }

    private function load ($path=null, $fileName=null): self {
        if (is_null($path) && is_null($fileName)) return null;
        include_once($path . $fileName);
        return $this;
    }
}