@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>

            <ul>
                <li v-for="(task, index) in tasks" v-bind:key="task.id">
                    @{{ index }}
                    <div v-for="(value, key, ind) in task"><strong>@{{ `${ind} => ${key}` }}</strong>: @{{ value }}</div>
                    <input type="checkbox" v-bind:id="'chk_'+index" v-on:click="done('chk_'+index, task)" v-bind:checked="task.done" v-bind:ref="'chk_'+index"><label v-bind:for="'chk_'+index">Realizar</label>
                </li>
            </ul>
            <h4>Rango de @{{ tasks.length }}</h4>
            <ul v-for="item in tasks.length"><li>@{{ item }}</li></ul>

        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Hasta ahora hemos iterado en los bucles sobre elementos de un <strong>"array"</strong>. También existen otros tipos de iteración, tantos como niveles queramos descender. En este ejercicio trataremos de iterar los elementos y, dentro de estos, iteraremos para obtener el nombre del atributo y el valor de cada elemento.</p>
            <p>Comencemos por declarar, el bucle <strong>"v-for"</strong>, que iterará por elementos y que a su vez por cada elemento, iteraremos por otro bucle <strong>"v-for"</strong>, obteniendo clave <strong>"key"</strong> y valor <strong>"value"</strong> de cada elemento leído; de esta forma podemos listar cada una de las propiedades que contiene el elemento.</p>
            <p>Además, podemos hacer uso de los rangos, establecer un bucle indicando el número máximo por el cual iterar, en nuestro caso, la lonigutud del listado de tareas, visualizando dicho valor numérico.</p>
            <p>Ahora bien, en caso de querer iterar representando en una misma línea cada atributo, basta con hacer uso de la etiqueta <strong>"template"</strong>, en lugar de los <strong>"div"</strong>:</p>
<pre><code>
&lt;template v-for="(value, key) in task"&gt;{! key !}: {! value !}&lt;/template&gt;
</code></pre>
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
            var filename = url.substring(url.lastIndexOf('/') + 1); // url filename

            // filename = filename.split('.').slice(0, -1).join('.'); // extension
            // filename = filename.substring(filename.lastIndexOf('-') + 1); // lesson

            // console.log(filename);
            this.lesson = `Lección ${filename}`;
        },
        beforeMount() {
            document.getElementsByTagName('title')[0].innerText = this.title;
        },
        mounted() {},
        data: {
            title: 'Bucle atributos y rango',
            subtitle: 'V-for',
            lesson: '',
            tasks: [{
                    title: 'Recoger tarta',
                    done: true,
                    id: 1000
                },
                {
                    title: 'Enviar postal',
                    done: false,
                    id: 1001
                },
                {
                    title: 'Llamar al trabajo',
                    done: true,
                    id: 1002
                }
            ]
        },
        methods: {
            done(checkbox, item) {
                console.log(checkbox);
                console.log(item)
                Vue.set(item, 'done', this.$refs[checkbox][0].checked);
            }
        }
    });
</script>
@endsection
