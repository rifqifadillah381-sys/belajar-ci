<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login()
    {
        
        if ($this->request->is('post')) {
            
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            
            $dataUser = [
                'username' => 'april', 
                'password' => '202cb962ac59075b964b07152d234b70', 
                'role'     => 'admin'
            ];

           
            if ($username == $dataUser['username']) {
                
                
                if (md5($password) == $dataUser['password']) {
                    
                    
                    session()->set([
                        'username'   => $dataUser['username'],
                        'role'       => $dataUser['role'],
                        'isLoggedIn' => TRUE
                    ]);

                   
                    return redirect()->to(base_url('/')); 

                } else {
                   
                    session()->setFlashdata('failed', 'Username & Password Salah');
                    return redirect()->to(base_url('login'));
                }

            } else {
                
                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                return redirect()->to(base_url('login'));
            }
        }

      
        return view('v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}