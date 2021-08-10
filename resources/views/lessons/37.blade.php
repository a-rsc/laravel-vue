@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/37.css') }}">
@endpush

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <div class="row">
                <my-post class="column-70 post"></my-post>
                <my-post inline-template class="column-30 card post" v-color="'#eaeaea'">
                    <div>
                        <p class="subtitle">@{{ title }}</p>
                        <p>@{{ post }}</p>
                        <img v-bind:src="image" alt="title" width="200" height="100">
                    </div>
                </my-post>
            </div>
            <my-post inline-template class="post" v-color="'#ffefef'">
                <div class="card">
                    <h1>@{{ header }}</h1>
                    <div class="subtitle">@{{ title }}</div>
                    <div class="row">
                        <div class="column">
                            <p>@{{ post }}</p>
                        </div>
                        <div class="column">
                            <img v-bind:src=image alt="article" width="400" height="300" style="margin:auto; display:block;">
                        </div>
                    </div>
                </div>
            </my-post>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Si normalmente definimos el marcado HTML dentro del componente en esta modalidad, si el atributo inline-template está presente podremos definirlo dentro de la propia etiqueta del componente.</p>
            <p>Esto nos aporta mayor flexibilidad y podremos tener un renderizado por defecto definido dentro del componente y la facilidad de sobrescribirlo cuando queramos indicando mediante el uso del atributo inline-template.</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    Vue.directive('color', function(el, binding, vnode) {
        el.style.background = binding.value;
    });

    let MyPost = Vue.component('my-post', {
        data() {
            return {
                header: 'Article',
                title: 'Title',
                image: 'https://picsum.photos/400/200',
                post: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus earum autem ipsam similique nam iure dolore adipisci sed distinctio, maxime molestias nemo provident quidem nobis quisquam fugit necessitatibus iusto eaque.'
            }
        },
        template: `<div component="my-post">
                    <p>@{{ title }}</p>
                    <h1>@{{ header }}</h1>
                    <p>@{{ post }}</p>
                    <img v-bind:src=image alt="article" width="400" height="200">
                </div>`
    });

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
            title: 'Inline templates',
            subtitle: 'Definiendo plantillas de componentes',
            lesson: null
        },
        components: {
            'my-post': MyPost
        },
        methods: {
        }
    });
</script>
@endsection
