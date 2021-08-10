@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <div class="area" v-on:mousemove="move" style="width: 400px; height: 300px; border: 15px solid green;"></div>
            <div class="result" style="color: green; font-size: 2rem; font-weight: bold;">@{{ mouseX + ' - ' + mouseY }}</div>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>En esta ocasión vamos a ver dentro de las directivas para capturar eventos del DOM aquella que nos permite filtrar los generados cuando el ratón se mueve por encima de uno de nuestros componentes.</p>
            <p>A medida que se captura el movimeinto del ratón se ejecuta la función y vamos refrescando las variables de la instancia que se renderizarán en nuestra página.</p>
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
            title: 'Mouse move',
            subtitle: 'Directiva v-on:mousemove',
            lesson: '',
            mouseX: '0',
            mouseY: '0'
        },
        methods: {
            move(event) {
                this.mouseX = event.clientX;
                this.mouseY = event.clientY;
            }
        }
    });
</script>
@endsection
