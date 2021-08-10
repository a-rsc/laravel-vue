@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <h2><span style="margin-right: 1rem; font-size: 1rem; color: lime;">Sin directiva v-once</span>@{{ message }}</h2>
            <h2 v-once><span style="margin-right: 1rem; font-size: 1rem; color: lime;">Con directiva v-once</span>@{{ message }}</h2>
            <input type="text" id="message" v-model="message">
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>En caso de que necesitemos mostrar un único valor cuando carguemos la página haremos uso de una directiva especial llamada <strong>v-once</strong>. Esta directiva asegura que un elemento tomará un valor durante el renderizado y, en el caso de que la página se vuelva a renderizar, considerará al elemento como un elemento estático que no se tomará en cuenta de nuevo.</p>
            <p>Si posteriormente a la carga modificamos el contenido del input, podemos comprobar cómo no se renderiza de nuevo el contenido del mensaje.</p>
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
            document.getElementById('message').focus();
        },
        data: {
            title: 'Filtros',
            subtitle: 'Modificadores de valor',
            lesson: '',
            message: 'Renderizar sólo una vez'
        },
        methods: {
        }
    });
</script>
@endsection
