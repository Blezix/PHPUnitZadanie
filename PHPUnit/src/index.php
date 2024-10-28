<?php
class PageRedirect {
    private $id;
    private $lesson;
    private $class;

    public function __construct($id, $lesson, $class) {
        $this->id = $id;
        $this->lesson = $lesson;
        $this->class = $class;
        $this->validate();
    }

    private function validate() {
        $lessons = [
            'wi' => [1, 2, 3, 4, 5],
            'ai' => [1, 2, 3, 4, 6, 7, 8, 9, 10],
            'tida' => [1, 2, 3, 4, 5, 6, 8, 9, 11],
        ];

        $units = [
            'wi' => ['1tp', '2tp'],
            'ai' => ['3td', '3tf', '3tp', '4tf', '4tp'],
            'tida' => ['3tf', '3tp', '4tf', '4tp'],
        ];

        if (!isset($lessons[$this->id]) || !in_array($this->lesson, $lessons[$this->id])) {
            throw new Exception("Invalid lesson for subject {$this->id}");
        }

        if (!isset($units[$this->id]) || !in_array($this->class, $units[$this->id])) {
            throw new Exception("Invalid class for subject {$this->id}");
        }
    }

    public function getRedirectUrl() {
        return "https://edu.gplweb.pl/?svc=courses&id={$this->id}&lesson={$this->lesson}&class={$this->class}";
    }
}