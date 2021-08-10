@extends('layouts.app')

@section('title', 'Instancias Vue')

@section('content')
<div class="flex-container">
    <div id="app1" class="flex-item flex-item-content">
        <h1>My Vue Blog</h1>
        <h2>Content</h2>

        <h3>@{{ title1 }}</h3>
        <p>@{{ post1 }}</p>

        <h3>@{{ title2 }}</h3>
        <p>@{{ post2 }}</p>

        <h3>@{{ title3 }}</h3>
        <p>@{{ post3 }}</p>

    </div>
    <div id="app2" class="flex-item flex-item-summary">

        <h2>@{{ message }}</h2>

        <ul>
            <li class="item">@{{ title1 }}</li>
            <li class="item">@{{ title2 }}</li>
            <li class="item">@{{ title3 }}</li>
        </ul>

    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app1 = new Vue({
        el: '#app1',
        data: {
            title1: 'Trip 1',
            title2: 'Trip 2',
            title3: 'Trip 3',
            post1: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis minima dolorem maiores dolores dicta labore porro vero, quas velit quam temporibus laborum suscipit assumenda aspernatur voluptate vitae culpa laboriosam quidem?',
            post2: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis minima dolorem maiores dolores dicta labore porro vero, quas velit quam temporibus laborum suscipit assumenda aspernatur voluptate vitae culpa laboriosam quidem?',
            post3: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis minima dolorem maiores dolores dicta labore porro vero, quas velit quam temporibus laborum suscipit assumenda aspernatur voluptate vitae culpa laboriosam quidem?'
        }
    });
    const app2 = new Vue({
        el: '#app2',
        data: {
            message: 'Summary',
            title1: '16/06/2019 Trip 1',
            title2: '05/12/2020 Trip 2',
            title3: '03/04/2021 Trip 3'
        }
    });

    console.log('Esto es una prueba');
    console.log(app1.title1);
</script>
@endsection
