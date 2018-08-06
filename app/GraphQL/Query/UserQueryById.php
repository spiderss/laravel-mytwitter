<?php

namespace App\GraphQL\Query;
use App\User;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class UserQueryById extends Query
{
    protected $attributes = [
        'name' => 'UserQueryById',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('User'));
    }
    //需要圈地的参数
    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::String()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (empty($args['id'])) {
            throw new \InvalidArgumentException('请传入用户ID!');
        }
        $user = User::where("id",$args['id'])->get();
        return $user;
    }
}
