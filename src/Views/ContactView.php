<?php

namespace src\Views;

use src\Helpers\CSRFHelper;

class ContactView extends View{
    public function render($args = []){
        echo(' <section class="flex-showcase">
        <form action="/contact" method="post">   '
        . CSRFHelper::getInput()  .'     
        <label for="nome">Nome</label>
        <input type="text" name="nome">   
        <label for="email">Email</label>
        <input type="email" name="email">        
        <label for="assunto">Assunto</label>
        <input type="text" name="assunto">   
        <label for="mensagem">Menssagem:</label>
        <textarea id="mensagem" name="mensagem" rows="4" cols="50"></textarea>
        <button type="submit" name="button-enviar">Enviar</button>
        </form>
        </section>');  
    }
}
