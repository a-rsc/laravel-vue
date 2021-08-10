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
            <p>Podemos realizar esta misma petición mediante una función asíncrona <strong>"getAsync"</strong>, que realice el <strong>"fetch"</strong> internamente y retorne el resultado, una vez obtenida la respuesta mediante <strong>"await"</strong>. Esto es posible gracias a las promesas, que veremos en ejercicios posteriores.</p>
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
            this.getAsync('https://vue-100-ejercicios-cli-series.firebaseio.com/.json')
                .then(response => { this.arraySeries = response; })
                .catch(error => console.log('Error: ', error.statusText));
        },
        data: {
            title: 'Bucle atributos y rango',
            subtitle: 'Fetch',
            arraySeries: []
        },
        methods: {
            getAsync: async function(url) {
                let response = await fetch(url);
                if (response.ok) return await response.json();
                else throw new Error(response.status);
            }
        }
    });
</script>
@endsection
