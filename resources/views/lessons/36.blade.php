@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <p v-for="serie in series">
                <strong>La serie con el id @{{ serie.Id }} es</strong>: @{{ serie.Titulo }} <br>
                <strong>Año</strong>: @{{ serie.Anyo }} <br>
                <strong>Cadena</strong>: @{{ serie.Cadena }}
            </p>
            <p>@{{ message }}</p>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Ejecutar promesas al mismo tiempo no excluye poder tratar individualmente cada promesa. Cada una de las respuestas, tiene su propio <strong>then</strong> y <strong>catch</strong>.</p>
            <p>Las promesas controlan de forma asíncrona la resolución de peticiones, sin embargo, es posible que queramos lanzar asíncronamente un conjunto de peticiones a la vez; nos da igual el orden en que acaben, lo que importa es que todas finalicen satisfactoriamente.</p>
            <p>Este caso lo resuelve utilizar <strong>Promise.all()</strong>, donde le pasamos un conjunto de promesas lanzadas a la vez y, una vez finalicen todas, entonces realizar una acción.</p>
            <p>...</p>
            <p>Por último, invocamos a <strong>Promise.all()</strong> pasándole el array de promesas y se encargará de invocarlas todas a la vez asíncronamente. Una vez toda petición haya concluido, se ejecutará el método <strong>then</strong> en caso de que todas las llamadas fueran satisfactorias, donde asignaremos un mensaje mostrado por pantalla tras cargas todos los datos.</p>
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
            let ids = [1, 2, 3, 10];
            let promises = [];

            for (let index = 0; index < ids.length; index++) {
                promises.push(
                    this.getSerie(ids[index])
                    .then((res) => { this.series.push(res);})
                    .catch((error) => { alert(error.message); }));
            }
            // promises.push(
            //         this.getSerie(1)
            //         .then((res) => { this.series.push(res);})
            //         .catch((error) => { alert(error.message); }));
            // promises.push(
            //         this.getSerie(2)
            //         .then((res) => { this.series.push(res);})
            //         .catch((error) => { alert(error.message); }));
            Promise.all(promises)
                .then((res) => {
                    this.message = `Se han cargado ${promises.length} elementos`
                });
        },
        data: {
            title: 'Conjunto de Promesas',
            subtitle: 'Promise All',
            lesson: null,
            series: [],
            message: null
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
