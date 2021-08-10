@extends('layouts.app')

@section('title', 'Instancia Vue')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <h1>My Vue Blog</h1>
        <h2>Content</h2>

        <h3>@{{ title1 }}</h3>
        <p>@{{ post1 }}</p>

        <h3>@{{ title2 }}</h3>
        <p>@{{ post2 }}</p>

        <h3>@{{ title3 }}</h3>
        <p>@{{ post3 }}</p>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        data: {
            title1: 'Trip 1',
            title2: 'Trip 2',
            title3: 'Trip 3',
            post1: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis minima dolorem maiores dolores dicta labore porro vero, quas velit quam temporibus laborum suscipit assumenda aspernatur voluptate vitae culpa laboriosam quidem?',
            post2: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis minima dolorem maiores dolores dicta labore porro vero, quas velit quam temporibus laborum suscipit assumenda aspernatur voluptate vitae culpa laboriosam quidem?',
            post3: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis minima dolorem maiores dolores dicta labore porro vero, quas velit quam temporibus laborum suscipit assumenda aspernatur voluptate vitae culpa laboriosam quidem?'
        }
    });
</script>
@endsection
