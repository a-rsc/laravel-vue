@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <ul>
                <li v-for="(value, key, index) in post" style="padding: .5rem 0; list-style-type: none;"><strong>@{{ index +1 }}</strong> => <strong>@{{ key }}</strong>: @{{ value }}</li>
            </ul>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>En este ejercicio veremos cómo mostrar un listado de propiedades de un objeto de nuestra instancia Vue.</p>
<pre><code>
post: {
title: @{{ post.title }},
date: @{{ post.date }},
author: @{{ post.author }},
content: @{{ post.content }}
}
</code></pre>
<pre><code>
&lt;ul&gt;
&lt;li v-for="(value, key, index) in post" style="list-style-type:none;"&gt;
    {! index + 1 !} => {! key !}: {! value !}
&lt;/li&gt;
&lt;/ul&gt;
</code></pre>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    const app = new Vue({
        el: '#app',
        beforeCreate() {
            // this.title = document.getElementsByTagName('title')[0].innerText;
        },
        created() {
            var url = window.location.pathname;
            var filename = url.substring(url.lastIndexOf('/')+1); // url filename

            // filename = filename.split('.').slice(0, -1).join('.'); // extension
            // filename = filename.substring(filename.lastIndexOf('-')+1); // lesson

            // console.log(filename);
            this.lesson = `Lección ${filename}`;
        },
        beforeMount() {
            document.getElementsByTagName('title')[0].innerText = this.title;
        },
        mounted() {
        },
        data: {
            title: 'Enumeración de propiedades',
            subtitle: 'v-for para objetos',
            lesson: '',
            post: {
                title: 'Nuevo artículo',
                date: new Date().toLocaleDateString(),
                author: 'Álvaro',
                content: `Lorem ipsum dolor sit amet consectetur adipisicing elit.`
            }
        },
        methods: {
        }
    });
</script>
@endsection
