<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About'], ['nama' => 'Ari Gunawan']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => '1',
            'slug' => 'judul-pekob-1',
            'title' => 'Judul pekob 1',
            'author' => 'Lupus',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non nostrum accusamus, assumenda'
        ],
        [
            'id' => '2',
            'slug' => 'judul-pekob-2',
            'title' => 'Judul pekob 2',
            'author' => 'Lupus',
            'body' => 'adipisicing elit. Non nostrum accusamus, assumenda'
        ]
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => '1',
            'slug' => 'judul-pekob-1',
            'title' => 'Judul pekob 1',
            'author' => 'Lupus',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non nostrum accusamus, assumenda'
        ],
        [
            'id' => '2',
            'slug' => 'judul-pekob-2',
            'title' => 'Judul pekob 2',
            'author' => 'Lupus',
            'body' => 'adipisicing elit. Non nostrum accusamus, assumenda'
        ]
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'single post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
