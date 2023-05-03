<div align="center">
    <a href="https://github.com/DarkEyeBr/Pagina-Azul">
        <img width="135" alt="Página Azul's logo" src="https://user-images.githubusercontent.com/99801948/236017601-1df13f5b-a86f-4020-88d9-0d8006b790a7.png">
    </a>
    <h1>Página Azul</h1>
    <p><i>TCC do curso técnico em Informática para Internet Integrado ao Ensino Médio da ETEC Francisco Garcia no ano de 2022</i></p>
</div>

# Sobre

Plataforma de busca e anúncio de serviços, empresas e microempreendedores

![Página Azul's homepage](https://user-images.githubusercontent.com/99801948/236017296-7894bc15-4af9-4515-99e2-b6074d69ea02.png)

# Instalação e Configuração

1. Instale as tecnologias necessárias

   - [PHP](https://www.php.net/)
   - Qualquer ambiente de desenvolvimento PHP (Recomendado: [XAMPP](https://www.apachefriends.org/pt_br/index.html)) \*
   - [Composer](https://getcomposer.org/)

   <font size="2">(A raíz do servidor deve apontar para a raíz do projeto. [Isto pode ser configurado no arquivo `httpd.conf` do Apache](https://www.devmedia.com.br/forum/como-mudar-o-diretorio-raiz-do-xampp/570638))</font>

2. Clone o repositório

```
git clone https://github.com/DarkEyeBr/Pagina-Azul.git
```

3. No diretório do projeto, instale as dependências

```
composer install
```

4. Carregue o banco de dados disponível em `sql/localhost.sql`

5. Copie o arquivo `config-template.php` e cole na raíz do projeto, renomeando para `config.php`

6. Preencha ou substitua as configurações necessárias no novo arquivo `config.php`

# Autores

- Guilherme de Souza Dionisio Rosseti
- Guilherme Flavio da Silva
- Matheus Henrique Leoncio Brando
- Thiago Fukuyama Marcilli
