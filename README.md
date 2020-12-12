# shopping_list_api
 
Este é um projeto Modelo para a implementação de models de aplicações laravel com seu comportamento todo separado em pastas e um pouco de princípios SOLID.

Para utilizar este conceito em outros projetos seguir os passos.

1 - Copiar a pasta BusinessRules e Base para o novo projeto
2 - Copiar o arquivo phpunit.xml
3 - Criar o arquivo .env.testing no novo projeto
4 - Adicionar os services providers no arquivo config/app.php do novo projeto
5 - Adicionar as rotas no arquivo app/Providers/RouteServiceProvider.php
6 - Adicionar ao arquivo app/Console/Kernel.php o load dos comandos da pasta base
    -  $this->load(__DIR__.'/BusinessRules/Base/Commands');
7 - executar as migrations
8 - executar o comando "php artisan test" e garantir que tudo está funcionando
