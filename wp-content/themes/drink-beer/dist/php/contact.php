<section class="contact">
    <div class="header">
        <h3>CONTATO</h3>
        <h4>FALE COM A <b>Drink Beer</b></h4>
    </div>

    <form action="">

        <div class="block-name">
            <label for="name">Nome Completo</label>
            <input type="text" id="name" />
        </div>

        <div class="block-mail">
            <label for="email">E-mail</label>
            <input type="email" id="mail" />
        </div>

        <div class="block-phone">
            <label for="phone">Telefone</label>
            <input type="tel" pattern="^\d{2}-\d{5}-\d{4}$" id="phone" />
        </div>

        <div class="form-container">

            <label for="select">Assunto</label>
            <div class="subject">
                <select>
                        <option value="" selected>Selecione um Assunto</option>
                        <option value="1">Reclamação</option>
                        <option value="2">Sugestão</option>
                        <option value="3">Outros</option>
                </select>
                <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/dist/img/chevron down.png" alt="Imagem da seta">
            </div>
        </div>

        <div class="block-msg">
            <label for="msg">Mensagem</label>
            <textarea id="msg"></textarea>
        </div>

        <div class="sent">
            <span>ENVIAR</span>
        </div>
    </form>

    <div class="main-text">
        <div class="admin">
            <h4>ADMINISTRAÇÃO CENTRAL</h4>
        </div>
        <div class="information">
            <span class="email">Email:</span>
            <span class="email-Drink">Drinkbier@Drinkbier.com.br</span>
            <span class="telefone">Telefone:</span>
            <span class="telefone-Drink">51 3378-3000</span>
            <span class="endereço">Endereço:</span>
            <span class="endereço-Drink">Avenida Túlio de Rose, 80<br>
            CEP 91340001 Porto Alegre<br>
            Rio Grande do Sul - Brasil
            </span>
        </div>

        <div class="google-maps-watch">
            <span>VER NO GOOGLE MAPS</span>
        </div>
    </div>
</section>