@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <p v-if="serie">
                <strong>La serie 1 es</strong>: @{{ serie.Titulo }} <br>
                <strong>Año</strong>: @{{ serie.Anyo }} <br>
                <strong>Cadena</strong>: @{{ serie.Cadena }}
            </p>
            <p v-else>Cargando...</p>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Utilice promesas siempre y no olvide retornar <strong>resolve</strong> o <strong>reject</strong> según el tipo de respuesta, o quien espera tratar el resultado de la promesa no recibirá nada.</p>
            <p>El uso de promesas para gestionar llamadas remotas a una api está muy extendido. Nos permiten gestionar las respuestas tras enviar una solicitud al servidor y, cuando este responda, se tratará para realizar alguna acción.</p>
            <p>Las promesas se componen de dos elementos principales: <strong>resolve</strong> y <strong>reject</strong>. El primero se utiliza para gestionar respuestas exitosas, de modo que quien esté a la escucha del resultado de la promesa, a través del método <strong>then</strong>, recoja el valor retornado por el <strong>resolve</strong> de la promesa.</p>
            <p>El otro elemento es <strong>reject</strong>, el caso opuesto, retorna error a quien esté a la escucha de la promesa, por el <strong>catch</strong>.</p>
            <p>Creamos definiendo la variable <strong>title</strong> en el data, para recoger el valor de la respuesta. Definimos el método <strong>getSerie</strong> con parámetro id de la serie. Este método retorna una promesa, que contiene una llamada remota mediante <strong>fetch</strong>.</p>
            <p>En caso de éxito del <strong>fetch</strong>, inyectamos el valor devuelto por la api a <strong>resolve()</strong>. Si fuera error, retornaríamos <strong>reject</strong>, al que inyectaríamos el error.</p>
            <p>Será en el <strong>mounted</strong> donde invocamos al método <strong>getSerie</strong> que, como hemos visto, retorna una promesa, de modo que cuando la promesa ejecute el <strong>resolve</strong>, se recibirá el valor por el <strong>then</strong> de la invocación del método, asignando el valor a la variable <strong>title</strong> para visualizarlo, mientras que, si ocurriera el error, sería capturado por el <strong>catch</strong>.</p>
            <p>Si abrimos la página html, veremos el mensaje <strong>Cargando...</strong>, al no tener valor título, en la carga del componente invocamos la promesa. En caso de éxito, la promesa envía mediante <strong>resolve</strong>, el valor que queremos que recoja por el <strong>then</strong>, quien invocó la promesa, donde se obtendrá el valor y será asignado al título.</p>
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
            this.getSerie(this.id)
            .then((res) => { this.serie = res;})
            .catch((error) => { alert(error.message); })
        },
        data: {
            title: 'Promesas',
            subtitle: 'Promise',
            lesson: '',
            id: 1,
            serie: {}
        },
        methods: {
            getSerie(id) {
                return new Promise((resolve, reject) => {
                    fetch(`https://vue-100-ejercicios-cli-series.firebaseio.com/${id}.json`)
                    .then(response => {
                        if (response.ok) { return response.json();}
                        else reject(response.statusText); })
                    .then(data => { resolve(data); })
                    .catch(error => { console.log(error); reject(error);})
                });
            }
        }
    });
</script>
@endsection
