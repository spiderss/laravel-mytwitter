<?php

namespace App\GraphQL\Query;

use App\Post;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class PostQueryById extends Query
{
    protected $attributes = [
        'name' => 'ArticleQueryById',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::type('Post');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (empty($args['id'])) {
            throw new \InvalidArgumentException('请传入文章ID!');
        }
        return Post::find($args['id']);
    }
}
