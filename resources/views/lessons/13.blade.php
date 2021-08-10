@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div style="margin-bottom: 1rem;">
            <button type="button" v-on:click="handleClick">Change image!</button>
        </div>
        <div>
            <img v-bind:src="image" alt="picsum.photos">
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Con la directiva <strong>v-bind</strong> podemos vincular un atributo de algún elemento html a una propiedad de nuestra instancia.</p>
            <p>Ahora simplemente tendremos que vincular o enlazar la propiedad image con el atributo src del elemento img mediante la directiva <strong>v-bind</strong>.</p>
            <p>Hemos enlazado un atributo de un elemento HTML con una propiedad de nuestra instancia.</p>
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
            title: 'Vincular propiedades',
            subtitle: 'Uso de v-bind',
            lesson: '',
            image: 'https://picsum.photos/200/300?random=0',
            random: 0
        },
        methods: {
            handleClick() {
                this.image = `https://picsum.photos/200/300?random=${++this.random}`;
            }
        }
    });
</script>
@endsection
