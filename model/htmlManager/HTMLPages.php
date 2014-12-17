<?php

namespace Cartao\model\htmlManager;

class HTMLPages extends HTMLStructure {

    protected $DataMap;
    protected $values;

    public function __construct($objectDataMap) {
        $this->DataMap = $objectDataMap;
    }

    protected function pageDefault() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'default');
        $this->valuesToReplace['dataForContent'] = $this->values;
        return $this->setContentHTML('home');
    }

    protected function pageHome() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'home');
        $this->valuesToReplace['dataForContent'] = $this->values;
        return $this->setContentHTML('home');
    }

    protected function pageSignUp() {
        $this->valuesToReplace['css'] = $this->DataMap->get('css', 'style');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'signUp');
        $this->valuesToReplace['dataForContent'] = $this->values;
        return $this->setContentHTML('signUpPage');
    }

    protected function pageEdit() {
        $this->valuesToReplace['css'] .= $this->DataMap->get('css', 'style');
        $this->valuesToReplace['css'] .= $this->DataMap->get('css', 'editOnPage');
        $this->valuesToReplace['js'] .= $this->DataMap->get('js', 'jQuery');
        $this->valuesToReplace['js'] .= $this->DataMap->get('js', 'jQuery');
        $this->valuesToReplace['js'] .= $this->DataMap->get('js', 'configJeditable');
        $this->valuesToReplace['js'] .= $this->DataMap->get('js', 'editOnPage');
        $this->valuesToReplace['js'] .= $this->DataMap->get('js', 'jeditable');
        $this->valuesToReplace['js'] .= $this->DataMap->get('js', 'scripts');
        $this->valuesToReplace['title'] = $this->DataMap->get('title', 'edit');
        $this->valuesToReplace['dataForContent'] = $this->makeListOfCardsToPageEdit();
        return $this->setContentHTML('editePage');
    }

    private function makeListOfCardsToPageEdit() {
        $htmlReturn = '';
        for ($i = 0; sizeof($this->values) > $i; $i++) {
            $htmlReturn .= $this->formatListCardsToPageEdit($i);
        }
        return $htmlReturn;
    }

    private function formatListCardsToPageEdit($indice) {
        $html = "<tr><td><input type='checkbox' name='arrayExcluir[]' value='{$this->values[$indice]['IDScheduleSend']}'></td>
                <td class='dblclick' id='rm:ml-{$this->values[$indice]['IDFromEmail']}' >{$this->values[$indice]['emailFromEmail']}</td>
                <td class='dblclick' id='rm:nm-{$this->values[$indice]['IDFromEmail']}'>{$this->values[$indice]['nameFromEmail']}</td>
                <td class='dblclick' id='dn:ml-{$this->values[$indice]['IDToEmail']}'>{$this->values[$indice]['emailToEmail']}</td>
                <td class='dblclick' id='dn:nm-{$this->values[$indice]['IDToEmail']}'>{$this->values[$indice]['nameToEmail']}</td>
                <td class='dblclick' id='mn:mn-{$this->values[$indice]['IDMessage']}'>{$this->values[$indice]['message']}</td>
                <td>{$this->values[$indice]['createDate']}</td>
                <td>{$this->values[$indice]['dateToSend']}</td></tr>";
        return $html;
    }

    private function limitarTamanho($string, $tamanho, $finalString) {
        if (strlen($string) > $tamanho) {
            $final = substr($string, 0, $tamanho) . $finalString;
        } else {
            $final = $string;
        }
        return $final;
    }

}
