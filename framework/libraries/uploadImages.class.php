<?php
namespace upload;

class uploadImages {
    private $name;
    private $type;
    private $inputName;
    private $types = ['jpg', 'png', 'jpeg'];

    public function __construct(string $inputName) {
        $this->inputName = $inputName;
        $this->name = basename(UPLOADS_FOLDER_PATH . $_FILES[$this->inputName]['tmp_name']);
        $this->type = pathinfo($_FILES[$this->inputName]['name'], PATHINFO_EXTENSION);
    }

    private function isImage () {
        if (empty($_FILES[$this->inputName]['tmp_name'])) return null;
        return getimagesize($_FILES[$this->inputName]['tmp_name']);
    }

    private function generateName (): int {
        return time() . rand(10, 99);
    }

    public function upload (): string {
        if ($this->isImage() == false || in_array($this->type, $this->types) == false) return false;

        $fileName = $this->generateName() . '.' . $this->type;
        $file = move_uploaded_file($_FILES[$this->inputName]['tmp_name'], UPLOADS_FOLDER_PATH . $fileName);
        return isset($file) ? $fileName : null;
    }
}