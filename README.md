# CobreOnline

## Como testar:
O sistema Cobre online está hospedado no link: https://cobreonline.onrender.com.
Para testá-lo basta acessar clickar no URL acima e preencher os campos do formulário.

## Testar o sistema localmente:
    Para testar localmente é necessário:
    1. Configurar um servidor local. Recomendação: usar o **XAMPP**.
    2. Clonar o repositório na pasta htdocs do XAMPP.
    3. Criar o banco de dados localmente. Acesse o phpMyAdmin e crie a tabela onde os dados vão ser armazenados.
    4. Alterar as variáveis do arquivo database.php de acordo com as informações do seu banco de dados.
    5. Alterar o URL no arquivo indeex.html para o URL local da API.
    6. Iniciar o servidor do XAMPP para a API.
    7. Iniciar um servidor local para acessar a página. Utilize o comando php -S localhost:5050 na pasta onde está o arquivo index.html.
    Pronto! Agora é só acessar localhost:5050 que o sistema estará executando localmente.
