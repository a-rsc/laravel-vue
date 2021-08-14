@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/37.css') }}">
<link rel="stylesheet" href="{{ asset('css/39.css') }}">
@endpush

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <div class="row">
                <my-post class="post"></my-post>
            </div>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Conviene no abusar ya que podemos distraer la atención de lo realmente importante para nuestra aplicación.</p>
            <p>Usaremos la etiqueta <strong>transition</strong> para envolver una parte de nuestro componente que se renderizará condicionalmente en función de una de sus propiedades.</p>
            <p>Dentro de nuestro componente mostraremos un título, subtítulo, contenido y una imagen ilustrativa y lo que haremos será animar la entrada / salida de nuestra imagen en el DOM en función de la propiedad <strong>show</strong>.</p>
            <p>En primer lugar, lo primero es envolver nuestra imagen dentro del tag <strong>transition</strong> al que le pondremos un nombre <strong>fade</strong>. Le ponemos este nombre porque lo que queremos es que vaya gradulamente apareciendo o desapareciendo en función de la evaluación de la condición de renderizado <strong>(fade-in, fade-out)</strong>.</p>
            <p>Es importante que dentro de la etiqueta <strong>transition</strong> sólo se vaya a renderizar un elemento a la vez y sea condicionado, ya que si no es así no funcionará.</p>
            <p>Para cambiar la condición podremos hacerlo <strong>pulsando un botón, eligiendo un valor de un desplegable o como se nos ocurra</strong>.</p>
            <p>Durante el proceso de añadido y eliminación queremos que pase gradualmente a visible para lo que usamos la propiedad CSS transition y un tiempo para que sea gradual.</p>
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
                show: false,
                header: 'Article',
                title: 'Title',
                image: 'https://picsum.photos/400/200',
                post: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus earum autem ipsam similique nam iure dolore adipisci sed distinctio, maxime molestias nemo provident quidem nobis quisquam fugit necessitatibus iusto eaque.'
            }
        },
        template: `<div class="card">
                    <h1 @mouseover="show = !show" style="cursor: pointer;">@{{ header }} (mouseover)</h1>
                    <p class="subtitle">@{{ title }}</p>
                    <div class="row">
                        <p class="column-70 post">@{{ post }}</p>
                        <transition name="fade" class="column-30">
                            <img v-if="show" v-bind:src=image alt="article" width="400" height="200">
                        </transition>
                    </div>
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
            title: 'Transiciones / Animaciones I',
            subtitle: 'Usando CSS',
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
