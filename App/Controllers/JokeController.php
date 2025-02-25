<?php
/**
 * Joke Management Controller
 *
 * Filename:        JokeController.php
 * Location:        /App/Controllers
 * Project:         demo-mvc-jokes
 * Date Created:    6/09/2024
 *
 * Author:          Tadiwanashe Gukwa <20095319@tafe.wa.edu.au>
 *
 */

namespace App\Controllers;

use Framework\Authorisation;
use Framework\Database;
use Framework\Session;
use Framework\Validation;
class JokeController

    // TODO: Create a protected db variable
{
    /* Properties */

    /**
     * @var Database
     */
    protected $db;

    /**
     * JokeController Constructor
     *
     * Instantiate the database connection for use in this class
     * storing the connection in the protected <code>$db</code>
     * property.
     *
     * @throws \Exception
     */

    // TODO: Create the  __construct method
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    // TODO: Create the index method
    public function index()
    {
        $sql = "SELECT * FROM jokes ORDER BY joke, category_id, tags, author_id";

        $jokes = $this->db->query($sql)->fetchAll();


        loadView('jokes/index', [
            'jokes' => $jokes
        ]);
    }

    // TODO: Create the show method
    /**
     * Show a specific joke by ID.
     *
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public function show($params)
    {
        $id = $params['id'] ?? '';

        $params = ['id' => $id];

        $sql = 'SELECT * FROM jokes WHERE id = :id';
        $joke = $this->db->query($sql, $params)->fetch();

        // Check if joke exists
        if (!$joke) {
            ErrorController::notFound('Joke not found');
            return;
        }

        loadView('jokes/show', [
            'joke' => $joke
        ]);
    }

    public function search()
    {
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';

        $query = "SELECT * FROM jokes 
                  WHERE joke LIKE :keywords 
                     OR tags LIKE :keywords
                  OR author_id LIKE :keywords
                  ORDER BY joke, tags, author_id";

        $params = [
            'keywords' => "%{$keywords}%"
        ];
        $jokes = $this->db->query($query, $params)->fetchAll();

        loadView('jokes/index', [
            'jokes' => $jokes,
            'keywords' => $keywords,
        ]);
    }
    // TODO: Create the create method
    /**
     * Shows the joke creation page.
     *
     * @return void
     */
    public function create()
    {
        loadView('jokes/create');
    }


    // TODO: Create the store
    public function store()
    {
        $allowedFields = ['joke', 'tags'];

        $newJokeData = array_intersect_key($_POST, array_flip($allowedFields));
        $newJokeData = array_map('sanitize', $newJokeData);

        $newJokeData['author_id'] = Session::get('user')['id'];

        $requiredFields = ['joke', 'tags'];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newJokeData[$field]) || !Validation::string($newJokeData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            loadView('jokes/create', [
                'errors' => $errors,
                'joke' => $newJokeData
            ]);
            exit();
        }

        $fields = implode(', ', array_keys($newJokeData));
        $values = implode(', ', array_map(function ($field) {
            return ":{$field}";
        }, array_keys($newJokeData)));

        foreach ($newJokeData as $field => $value) {
            if ($value === '') {
                $newJokeData[$field] = null;
            }
        }

        $insertQuery = "INSERT INTO jokes ({$fields}) VALUES ({$values})";
        $this->db->query($insertQuery, $newJokeData);

        Session::setFlashMessage('success_message', 'Joke added successfully');
        redirect('/jokes');
    }


    // TODO: Create the edit
    /**
     * Show the joke edit page.
     *
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public function edit($params)
    {
        $id = $params['id'] ?? '';

        $params = ['id' => $id];

        $joke = $this->db->query('SELECT * FROM jokes WHERE id = :id', $params)->fetch();

        if (!$joke) {
            ErrorController::notFound('Joke not found');
            exit();
        }

        if ($joke->author_id !== Session::get('user')['id']) {
            Session::setFlashMessage('error_message', 'You are not authorized to edit this joke');
            return redirect('/jokes/' . $id);
        }

        loadView('jokes/edit', [
            'joke' => $joke
        ]);
    }

    // TODO: Create the update
    /**
     * Update a joke in the database.
     *
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public function update($params)
    {
        $id = $params['id'] ?? '';

        $params = ['id' => $id];

        $joke = $this->db->query('SELECT * FROM jokes WHERE id = :id', $params)->fetch();

        if (!$joke) {
            ErrorController::notFound('Joke not found');
            exit();
        }

        if ($joke->author_id !== Session::get('user')['id']) {
            Session::setFlashMessage('error_message', 'You are not authorized to update this joke');
            return redirect('/jokes/' . $id);
        }

        $allowedFields = ['joke', 'tags'];
        $updateValues = array_intersect_key($_POST, array_flip($allowedFields)) ?? [];
        $updateValues = array_map('sanitize', $updateValues);

        $requiredFields = ['joke', 'tags'];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            loadView('jokes/edit', [
                'joke' => $updateValues,
                'errors' => $errors
            ]);
            exit();
        }

        $updateValues['updated_at'] = date('Y-m-d H:i:s');
        $updateFields = implode(', ', array_map(function ($field) {
            return "{$field} = :{$field}";
        }, array_keys($updateValues)));

        $updateQuery = "UPDATE jokes SET $updateFields WHERE id = :id";
        $updateValues['id'] = $id;

        $this->db->query($updateQuery, $updateValues);

        Session::setFlashMessage('success_message', 'Joke updated successfully');
        redirect('/jokes/' . $id);
    }

    // TODO: Create the destroy method

    /**
     * Delete a joke from the database.
     *
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public function destroy($params)
    {
        $id = $params['id'] ?? '';

        $params = ['id' => $id];

        $joke = $this->db->query('SELECT * FROM jokes WHERE id = :id', $params)->fetch();


        if (!$joke) {
            ErrorController::notFound('Joke not found');
            exit();
        }

        if ($joke->author_id !== Session::get('user')['id']) {
            Session::setFlashMessage('error_message', 'You are not authorized to delete this joke');
            return redirect('/jokes/' . $id);
        }

        $this->db->query('DELETE FROM jokes WHERE id = :id', $params);

        Session::setFlashMessage('success_message', 'Joke deleted successfully');
        redirect('/jokes');
    }
}
