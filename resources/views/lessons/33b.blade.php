@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <ul>
                <li v-for="serie in arraySeries">
                    <ul>
                        <li v-for="(value, key) in serie">@{{ key }}: @{{ value }}</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Al recibir la respuesta, trata el tipo de respuesta mediante <strong>response.ok</strong>, en caso satisfactorio, transforma la respuesta a objeto JSON mediante el método <strong>.json()</strong>.</p>
            <p>Para obtener datos de un api web remota, una de las alternativas es utilizar el <strong>api fetch</strong>, que nos permite tratar peticiones y respuestas HTTP. Tiempo atrás, esta misma funcionalidad la conseguíamos mediante el uso de <strong>XMLHttpRequest</strong>; sin embargo, este api mejora con creces el tratamiento de estas peticiones.</p>
            <p>Creemos un ejercicio donde realicemos una petición HTTP GET y obtengamos un array de objetos, que representaremos en pantalla en forma de lista.</p>
            <p>Por otra parte, declaramos en el data la variable series, inicializada a array vacío. Preparemos la solicitiud HTTP, en la isntancia Vue, en el <strong>mounted</strong>, utilizamos <strong>fetch</strong> para realizar una solicitud GET, es compatible con todos los navegadores, por lo que podemos utilizarlo sin temor.</p>
            <p>El primer parámetro de <strong>fetch</strong> es la url del api para obtener el recurso. Utiliza dos métodos <strong>then</strong>, el primero trata si es satisfactoria o no la respuesta.</p>
            <p>Esta verificación es posible leyendo la propiedad <strong>ok</strong> de la respuesta recibidia, en caso afirmativo, usamos el métodos <strong>.json()</strong> sobre la respuesta, para transformar y retornarla, como un objeto de tipo JSON, que podemos interpretar.</p>
            <p>Esta respuesta es recibida por el segundo método <strong>then()</strong>, es aquí donde asignamos el resultado a la variable del data, en este caso un array. Una vez asignado, si abrimos la página html en el navegador, veremos la lista.</p>
            <p>En caso de que se hubiera producido un error, la excepción sería tratada en el método <strong>catch</strong> de este mismo.</p>
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
            fetch('https://vue-100-ejercicios-cli-series.firebaseio.com/.json')
                .then(response => { if (response.ok) return response.json(); })
                .then(response => { this.arraySeries = response; })
                .catch(error => console.log('Error: ', error.statusText));
        },
        data: {
            title: 'Bucle atributos y rango',
            subtitle: 'Fetch',
            arraySeries: []
        },
        methods: {
        }
    });
</script>
@endsection
