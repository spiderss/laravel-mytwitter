<!-- user.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>{{$user->name}}</h3>
                @if(auth()->user())
                    @if(auth()->user()->isNot($user))
                        @if(auth()->user()->isFollowing($user))
                            <a href="{{ route('user.unfollow', $user) }}" class="btn btn-danger">取消关注</a>
                        @else
                            <a href="{{ route('user.follow', $user) }}" class="btn btn-success">关注</a>
                        @endif
                    @endif
                @else
                    <a href="{{ route('user.follow', $user) }}" class="btn btn-success">关注</a>
                    <a  class="btn btn-success">粉丝数：{{$user->fans}}</a>
                @endif
            </div>
        </div>
    </div>
@endsection