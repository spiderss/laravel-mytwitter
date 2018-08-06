<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Error\AuthorizationError;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use JWTAuth;
use Auth;
class LoginMutation extends Mutation
{
    protected $attributes = [
        'name' => 'LoginMutation',
        'description' => 'A mutation for user login'
    ];

    public function type()
    {
       // return Type::listOf(Type::string());
        return GraphQL::type("User");
    }

    public function args()
    {
        return [
            'email' => ['name' => 'email', 'type' => Type::nonNull(Type::string())],
            'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
          'email' =>['required','email'],
          'password'=>['required']
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $credentials = [
            'email' => $args['email'],
            'password' => $args['password']
        ];
        if (!$token = JWTAuth::attempt($credentials)) {
            throw  new AuthorizationError("Invalid Credentials.");
        }
        $user = Auth::user();
        $user->token = $token;
        return $user;
    }
}
