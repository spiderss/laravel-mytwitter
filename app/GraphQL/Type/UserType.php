<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'A Use'
    ];

    public function fields()
    {
        return [
            'id'  =>[
                'type'=>Type::nonNull(Type::string()),
                'description'=>"The id of the user"
            ],
            'name' =>[
                'type'=>Type::nonNull(Type::string()),
                'description'=>"The name of the user"
            ],
            "email" =>[
                'type'=>Type::string(),
                'description'=>"The email of the user"
            ],
            'token' => [
                'type' => Type::string(),
                'description' => 'The token of the user',
            ],
            'posts' => [
                'type' => Type::listOf(GraphQL::type('Post')),
                'description' => 'The post by the user'
            ]
        ];
    }

    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }

    protected function resolvePostsField($root, $args)
    {
        if (isset($args['id'])) {
            return $root->posts->where('id', $args['id']);
        }

        return $root->posts;
    }
}
