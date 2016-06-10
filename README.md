# SeboLinhaRepo
Projeto para disciplina de Banco de Dados 2016.1

### Começando

Para usar o Laravel, o [composer](https://getcomposer.org/) é necessário.

```sh
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('SHA384', 'composer-setup.php') === '070854512ef404f16bac87071a6db9fd9721da1684cd4589b1196c3faf71b9a2682e2311b36a5079825e155ac7ce150d') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
$ php -r "unlink('composer-setup.php');"
```
Depois, adicione o composer ao seu $PATH
```sh
$ export PATH="$PATH:$HOME/.composer/vendor/bin"
```

Clone o projeto, e dentro da pasta, execute o servidor usando 
```sh
$ php artisan serve
```

Edite o arquivo .env na pasta principal e coloque seus dados para acessar o banco de dados.

Migre o banco de dados:
```sh
$ php artisan migrate
```

use o [nvm](https://github.com/creationix/nvm) para instalar o node.js mais recente, e caso necessário, o [elixir/gulp](https://laravel.com/docs/5.0/elixir).



