<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    private $endpoint = 'http://localhost:8001/api';

    public function headers()
    {
        return [
            "Authorization" => request()->headers->get('Authorization')
        ];
    }

    public function getUser(): User
    {

        $response = \Http::withHeaders($this->headers())->get("{$this->endpoint}/user");

        $json = $response->json();

        $user = new User();
        $user->id = $json['id'];
        $user->first_name = $json['first_name'];
        $user->last_name = $json['last_name'];
        $user->email = $json['email'];
        $user->is_influencer = $json['is_influencer'];

        return $user;
    }
}
