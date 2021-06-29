# jukebox-proficiencia

Para rodar a api do Laravel, seguir os passos:

1. Criar um banco de dados "livros_db" no mysql;
2. No terminal do Laravel digitar o seguinte comando: "php artisan migrate";
3. Servir a aplicacao: "php artisan serve";
4. Abrir o postman, nao esquecer de incluir no header: "accept - application/json", para funcionar a validacao dos dados. Foram criadas as rotas index (retorna todos registros dos livros), show (retorna um registro de livro com base no id), store (adiciona um registro de livro no banco), update (atualiza um regsitro de livro com base no id), delete (exclui um registro de livro com base no id).

Para rodar a aplicacao de Vue, apenas servir a aplicacao. Nao foi utilizada a versao CLI por facilidade na hora de testar o codigo em outra maquina. Pode ser com o proprio live server do VSCode, ou se tiver php instalado na maquina utilizar o seguinte comando no terminal, dentro da pasta do projeto:

1. "php -S localhost:8000" (8000 é a porta, que pode ser alterada se preferir).
