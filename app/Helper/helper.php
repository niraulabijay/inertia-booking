<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

function add_error($error_msg, $key = 'default') {
    $errors = Session::get('errors', new ViewErrorBag);

    if (! $errors instanceof ViewErrorBag) {
        $errors = new ViewErrorBag;
    }

    $bag = $errors->getBags()['default'] ?? new MessageBag;
    $bag->add($key, $error_msg);

    Session::flash(
        'errors', $errors->put('default', $bag)
    );
}

?>