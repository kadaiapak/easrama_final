<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminDanSuperAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('level') != 1 && session()->get('level') != 2){
            if(session()->get('log') != true){
                return redirect()->to(base_url('/login'));
            }else {
                return redirect()->to(base_url('/dashboard'));
            }
        } 
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}