<?php

namespace App\GraphQL\Query;

use App\Post;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'PostQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Post'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
            'title' => ['name' => 'title', 'type' => Type::string()],
            'user_id' => ['name' => 'user_id', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $fields = $info->getFieldSelection($depth = 3);
        if (isset($args['id'])) {
            $articles = Post::where('id', $args['id']);
        } elseif (isset($args['title'])) {
            $articles = Post::where('title', 'like', $args['title'] . '%');
        } else {
            $articles = Post::query();
        }

        foreach ($fields as $field => $keys) {
            if ($field === 'author') {
                $articles->with('user');
            }
        }

        return $articles->get();
    }
}
