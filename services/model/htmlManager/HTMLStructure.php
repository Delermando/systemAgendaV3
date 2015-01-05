<?php namespace Cartao\model\htmlManager;

class HTMLStructure {

    private $page;
    protected $flags = array('[:linksCSS:]', '[:linksJS:]', '[:message:]', '[:dataForContent:]', '[:title:]');
    protected $valuesToReplace = array('css' => '', 'js' => '', 'message' => '', 'dataForContent' => '', 'title' => '');

    public function pageRender() {
        echo $this->page;
    }

    public function setPage($functionNameReferToPage) {
        $this->page = $this->constructPage($functionNameReferToPage);
    }

    public function setMessageFeedBack($message, $status) {
        if($status){
            $messageToSet = "<div class='error'><div class='errorMensage messageSucessBackground'><h2>{$message}</h2></div></div>";
        }else{
            $messageToSet = "<div class='error'><div class='errorMensage messageFailedBackground'><h2>{$message}</h2></div></div>";
        }
        $this->valuesToReplace['message'] = $messageToSet;
    }

    public function setContent($content = '') {
        $this->values = $content;
    }

    protected function setContentHTML($htmlNameForContent) {
        return $this->getHeader().$this->getContent($htmlNameForContent).$this->getFooter();
    }

    private function constructPage($functionNameReferToPage) {
        $html = $this->$functionNameReferToPage();
        return $this->replaceFlag($this->valuesToReplace, $html);
    }

    private function getHTML($pathFile) {
        return file_get_contents($pathFile);
    }

    private function getHeader() {
        return $this->getHTML($this->DataMap->get('html', 'header'));
    }

    private function getContent($content) {
        return $this->getHTML($this->DataMap->get('html', $content));
    }

    private function getFooter() {
        return $this->getHTML($this->DataMap->get('html', 'footer'));
    }

    private function constructMessage($message) {
        return sprintf("<div class='message %s'>%s</div>", $message);
    }

    private function replaceFlag($valuesToFlags, $html) {
        return str_replace($this->flags, $valuesToFlags, $html);
    }

}
