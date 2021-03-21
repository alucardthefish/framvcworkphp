<?php

namespace app\controllers;

use alucardthefish\framvcwork\Application;
use alucardthefish\framvcwork\Request;
use alucardthefish\framvcwork\Controller;
use app\models\ContactForm;

class SiteController extends Controller {

    public function home() {
        $params = [
            'name' => "TheCodeHolic"
        ];
        return $this->render('home', $params);
    }

    public function contact($request, $response) {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }

}