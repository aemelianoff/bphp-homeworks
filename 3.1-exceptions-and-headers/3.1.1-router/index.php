<?php
/**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
$availableLinks = include './availableLinks.php';
include './Router.php';
class BadRequest extends Exception{}
class NotFound extends Exception{}

function router($get, $links) {
    if (isset($get['page']) == false) {
        throw new BadRequest('Ошибка запроса');
    }
    
    if (isset($get['page'])) {
        $router = new Router($links);
        $bool = $router->isAvailablePage($get['page']);
        if ($bool == true) {
            echo 'Вы находитесь на странице' . '<b>' . ' ' . $get['page'] . '</b>';
        } else {
            throw new NotFound('Страницы не существует');  
        }
    }
}

try {
    router($_GET, $availableLinks);
} catch (BadRequest $e) {
    header('Location: error.php', true, 400);
} catch (NotFound $e) {
    header('Location: 404.php', true, 404);
}


