<?php

namespace App\Controller;

use GuzzleHttp\Client;

class TodoController extends AbstractController
{

    public function home()
    {
        // Use guzzle call api todo :https://jsonplaceholder.typicode.com/todos
        $client = new Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos');

        $todos = json_decode($response->getBody()->getContents());
        $this->render("todos/viewTodos.phtml", ["todos" => $todos]);
    }

}