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
            <p>Hemos realizado nuestra primera animación usando CSS de forma fácil y ahora haremos algo similar solo usando Javascript. Podemos mezclar las dos estrategias usando CSS junto a los métodos hooks de Javascript dentro del apartado "methods" del componente para aprovechar toda la potencia de ambos.</p>
            <p>Marcaremos como falso la propiedad css para asegurar que no se utilizan las variables CSS.</p>
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
                        <transition v-on:before-enter="beforeEnter" v-on:enter="enter" v-on:leave="leave" v-bind:css="false">
                            <img v-if="show" v-bind:src=image alt="article" width="400" height="200">
                        </transition>
                    </div>
                </div>`
        ,
        methods: {
            beforeEnter: function(el) {
                this.elementSlide = -200;
                this.opacity = 0;
                el.style.top = this.elementSlide + 'px';
                el.style.opacity = this.opacity;
                console.log('beforeEnter');
                console.log(el.style.opacity);
            },
            enter: function(el, done) {
                console.log('enter');
                let counter = 1;
                const interval = setInterval(() => {
                    el.style.top = (this.elementSlide + counter * 10) + 'px';
                    el.style.opacity = this.opacity + counter * 0.05;
                    console.log(el.style.opacity);
                    counter++;
                    if (counter > 20) {
                        clearInterval(interval);
                        done();
                    }
                }, 20);
            },
            leave: function (el, done) {
                console.log('leave');
                el.style.opacity = this.opacity;
                let counter = 1;
                const interval = setInterval(() => {
                    el.style.top = (this.elementSlide - counter * 10) + 'px';
                    el.style.opacity = 1 - (this.opacity + counter * 0.05);
                    console.log(el.style.opacity);
                    counter++;
                    if (counter > 20) {
                        clearInterval(interval);
                        done();
                    }
                }, 20);
            }
        }
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
            title: 'Transiciones / Animaciones II',
            subtitle: 'Usando Javascript',
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
