![ROFF JUMP][roff-logo]
##### [_CREATIVITY & DIGITAL MARKETING_][roff-homepage]

##### REST API
Para a implementação da _REST API_, foram desenvolvidos 3 controladores especificicos para o tratamento de dados. Esta abordagem de routeamento especifico para interacção externa, permite a alocação de recursos (Resource Controllers) dedicados para o efeito, sem interferir com a integridade da aplicação. 
###### TOPICS & ANSWERS
>Route::resource('/rest/api/topics' ,'TopicRestApiController');

Para o tratamento de pedidos externos relacionados com os Tópicos, foi criado um Resource Controller _TopicRestApiController_. Este extende de uma classe RestApiController, de forma a aceder a metodos comuns de toda a plataforma.

Listagem de todos os tópicos existentes (sem paginação, filtros ou pesquisa; só é possível obter a lista completa)
R: http://homestead.app/rest/api/topics/all

Listagem de todos os topicos e respectivas respostas (não pedido no enunciado)
R: http://homestead.app/rest/api/topics/all?answers=true

Obter toda a informação de um tópico específico (incluíndo respostas) a partir da sua ID
R: http://homestead.app/rest/api/topics/1

Criação de um novo tópico
http://homestead.app/rest/api/topics/create?title=This%20is%20a%20topic%20!&author=Im%20an%20author&message=Created%20from%20the%20api

>Route::resource('/rest/api/topic/answer' ,'TopicAnswerRestApiController');

Criação de respostas a um tópico (dado o ID do tópico)
http://homestead.app/rest/api/topic/answer/create?tid=1&author=Hello&message=Well%20this%20could%20be%20an%20answer


[roff-homepage]: http://www.roffconsulting.com/web/portugal/servicos/creativity-digital-marketing-jump

[laravel-web]: https://laravel.com/docs/4.2/homestead

[roff-logo]:logo.png

[project-document-pdf]: Recrutamento-2015-FORUM-v241.pdf
[project-document-odt]: Recrutamento-2015-FORUM-v241.odt
[project-install]: install.md
[project-start]: start.md