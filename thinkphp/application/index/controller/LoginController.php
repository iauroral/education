<?php

namespace app\index\controller;

use app\index\utils\Status;

/**
 * 登录控制器
 * @author zhangxishuo
 */
class LoginController extends BaseController
{
    /**
     * 登录首页
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 注册首页
     */
    public function register()
    {
        $specialty = $this->specialtyService->getAllSpecialty();
        $this->assign('specialty', $specialty);
        return $this->fetch();
    }

    /**
     * 用户登录
     */
    public function login()
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');
        $result = $this->userService->login($username, $password);
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'index/index');
        } else {
            $this->error($result['info'], 'login/index');
        }
    }

    /**
     * 用户注销
     */
    public function logout()
    {
        $result = $this->userService->logout();
        if (Status::isSuccess($result['status'])) {
            $this->success($result['info'], 'login/index');
        }
    }
}