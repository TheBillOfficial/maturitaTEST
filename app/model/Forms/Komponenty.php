<?php

class Komponenty extends Nette\Application\UI\Form {

    public function __construct($parent, $name) {
        parent::__construct();
        $this->setAction($parent->link('Komponenty:success'));
        
        $this->setMethod("POST");
        
        $this->addText('name', 'Název komponentu')
                ->setRequired('Prosíme, popište potřebnou komponentu');
    
        $this->addEmail('email', 'Váš email')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::EMAIL, 'Tato adresa není platná');
        
        $this->addText('number', 'Počet kusů')->setRequired('Napište počet kusů')
                ->addRule(\Nette\Forms\Form::INTEGER, 'Zapište počet kusů pouze čísly');
        
        $this->addRadioList('type', 'Typ komponentu', array('RAM'=>'paměť RAM', 'HDD'=>'HDD', 'SSD'=>'SSD'));
        
        $this->addCheckboxList('Doprava', 'Způsob dopravy', array('Osobne'=>'Osobní odběr', 'PostaDR'=>'Česká Pošta balik do ruky', 'PostaNP'=>'Česká Pošta balík na poštu','Zasilkovna'=>'Zásilkovna', 'DopravaPPL'=>'dopravce PPL','dopravceGEIS'=> 'dopravce GEIS'));
        
        $this->addTextArea('detaily', 'Upřesnění objednávky', 40, 6);
        
        $this->addSelect('Platba', 'Vyberte možnosti platby', array('karta'=>'Platba kartou', 'hotove'=>'Platba hotově'));
        
        $this->addUpload('Upload');
        
        $this->addPassword('password', 'Vaše heslo')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::MIN_LENGTH, 'Více než 6 znaků', 6);
        
        $this->addPassword('password2', 'Vaše heslo znovu')
                ->setRequired(TRUE)
                ->addRule(\Nette\Forms\Form::EQUAL, 'Heslo nesouhlasí', $this['password']);
        
        $this->addSubmit('send', 'Odeslat');
        
    }

}
