@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <parent></parent>
            <child></child>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Si volvemos al ejercicio anterior podemos componer con slots algo similar al artículo de blog que lográbamos con las inline-templates.</p>
            <p>Crearemos dos componentes para componer nuestro artículo de blog: por un lado tenemos el título y el subtítulo y por el otro el cuerpo del artículo con las imágenes ilustrativas.</p>
            <p>Siguiendo las reglas del anterior ejemplo el componente con la cabecera (título y subtítulo) contendrá el cuerpo del mensaje y las propiedades del padre serán inyectadas al hijo donde pongamos el tag <strong>slot</strong>.</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    let Child = Vue.component('child', {
        data() {
            return {
                childVariable: 'Variable del HIJO'
            }
        },
        template: `<div>
                    <slot></slot>
                    <p class="red">Este es el contenido del componente HIJO</p>
                    <p class="red">@{{ childVariable }}</p>
                    <slot></slot>
                </div>`
    });

    let Parent = Vue.component('parent', {
        data() {
            return {
                parentVariable: 'Variable del PADRE'
            }
        },
        template: `<div>
                    <child>
                        <p class="blue">Este es el contenido del componente PADRE</p>
                        <p class="blue">@{{ parentVariable }}</p>
                    </child>
                    <child></child>
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
            title: 'Slots',
            subtitle: 'Creando Slots',
            lesson: null
        },
        components: {
            'parent': Parent
        },
        methods: {
        }
    });
</script>
@endsection
