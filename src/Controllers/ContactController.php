<?php

namespace src\Controllers;

use src\Helpers\CSRFHelper;
use src\Helpers\EmailHelper;
use src\Helpers\FlashMessagesHelper;
use src\Views\ContactView;

class ContactController {
    public function enviaEmail() {   
        $key = array_key_first($_POST);
        CSRFHelper::compareTokens($key, $_POST[$key]);

        if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
            $assunto = $_POST['assunto'];
        }
        if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
            $mensagem = $_POST['mensagem'];
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $remetente = $_POST['email'];
        }
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        }
        
        return new EmailHelper($mensagem, $assunto, $nome, $remetente);
    }

    public function show() {             
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
              $this->enviaEmail();
              break;
    
            case 'GET':
              FlashMessagesHelper::getMessage();
              $v = new ContactView();
              $v->render();
              break;
            
            default:
              $NotFound = new NotFoundController();
              $NotFound->show();
              break;
          }
    }
}