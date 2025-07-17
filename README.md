# CobreOnline

<h2>Como testar:</h2>
<p>O sistema Cobre online está hospedado no link: <strong>https://cobreonline.onrender.com</strong>.</p>
<p>Para testá-lo basta acessar clickar no URL acima e preencher os campos do formulário.</p>

<h3>Testar o sistema localmente:</h3>
<p>
    Para testar localmente é necessário o uso de um servidor local. A recomendação é o XAMPP, que foi o servidor Apache utilizdo para o desenvolvimento do sistema.
  	É necessário que o repositório seja clonado na pasta htdocs do xampp. Além disso, deve-se criar a tabela em MySQL no phpMyAdmin e alterar as informações do arquivo database.php com as informações do seu banco de dados.
   	 Após a configuração local da API, deve-se alterar o url do arquivo index.html para onde são enviadas as requisições HTTP. O servidor Apache usará o url do local host, esse url será o ponto para onde as requisições deverão ir. Feito isso, precisa iniciar um servidor local para abrir a página, para isso use o comando <strong>php -S localhost:5050</strong> e use este URL no seu navegador.
    Pronto! Agora você está rodando o sistema localmente.</p>
