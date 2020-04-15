<?php

namespace App\Presenters;

class KomponentyPresenter extends BasePresenter
{
    public function createComponentKomponenty($name) {
        return new \Komponenty($this, $name);
    }

    public function actionSuccess(){
        $params = $this->getRequest();
        $this->template->params = $params->post;
    }
}
