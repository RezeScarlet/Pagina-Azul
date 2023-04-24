<div align="center">
    <a href="https://github.com/DarkEyeBr/Pagina-Azul">
        <img width="135" src="./assets/img/logos/Logo.png">
    </a>
    <h1>Página Azul</h1>
    <p>TCC do curso técnico em Informática para Internet Integrado ao Ensino Médio da ETEC Francisco Garcia no ano de 2022.</p>
</div>

# Sobre

Plataforma de busca e anúncio de serviços, empresas e microempreendedores.

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

3. Instale as dependências

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
