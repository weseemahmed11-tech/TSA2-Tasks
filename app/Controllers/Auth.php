<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('partials/header', ['title' => 'Login'])
            . view('auth/login')
            . view('partials/footer');
    }

    public function attemptLogin()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $user = (new UserModel())->where('username', $username)->first();

        if ($user === null || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'The username or password is incorrect.');
        }

        $this->session->regenerate();
        $this->session->set([
            'isLoggedIn' => true,
            'userId' => $user['id'],
            'username' => $user['username'],
        ]);

        return redirect()->to((string) $this->session->get('redirect_url') ?: site_url('tasks'));
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to(site_url('login'))->with('message', 'You have been logged out.');
    }
}
