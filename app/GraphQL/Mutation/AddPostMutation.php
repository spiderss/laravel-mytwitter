<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Post;
use JWTAuth;
use Auth;
class AddPostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'AddPostMutation',
        'description' => 'A mutation'
    ];
    public function authenticated($root, $args, $context)
    {
        return JWTAuth::parseToken()->authenticate() ? true : false;
    }
    public function type()
    {
        return GraphQL::type("Post");
    }

    public function args()
    {
        return [
            'title' => ['name' => 'title', Type::string()],
            'content' => ['name' => 'content', Type::string()],
        ];
    }
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }
    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $article = new Post();
        $article->title = $args['title'];
        $article->body = $args['content'];
        $article->user_id = Auth::user()->id;
        $article->save();
        return $article;
    }
}
