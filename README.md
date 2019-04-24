# PHP - Tarefas App

## Installation

Use the composer to install this library

```bash
composer require epicsweb/php-tarefaspp
```

## Usage

Get you **SECRET API KEY**: https://tarefas.app/tarefas.app/companies/edit

Import the vendor library **Epicsweb/PhpTarefasApp** and call the function

## Tasks API

### Add new task

```php
$data = [
    'api_token'             => (string)  'a1b2c2',          // req | length:32
    'name'                  => (string)  'Task Name',       // req | maxlength:200
    'tasklists_id'          => (int)     1,                 // def: default projetct of company
    'description'           => (string)  'Text or Html',    // req
    'expiration'            => (string)  '2019-01-31',      // def: NULL | format: Y-m-d
    'time_estimated'        => (string)  '02:00',           // req | format: H:i (00:00)
    'priority'              => (int)     1,                 // def: 1 | min:1 | max:3
    'level_cool'            => (int)     1,                 // def: 1 | min:1 | max:5
    'level_pain'            => (boolean) 1,                 // def: 0 | min:0 | max:0
    'profiles_email'        => (string)  'email@email.com', // req | formar: email
    'for_profiles_email'    => (string)  'email@email.com', // def: profiles_email value
];

$task = new Epicsweb\PhpTarefasApp;
$task->tasks_add( $data, 'put' ); //ALLOW "put" && "get"
 ```

#### Array Data Label
```php
req => 'required value'
def => 'have a default value, and is not required'

* dont use html_entities, urlencode, json_encode, and other in the array key or values
```

### License
This project is licensed under the MIT License - see the [LICENSE.md](https://github.com/epicsweb/mensagens-php/blob/master/LICENSE) file for details