@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>

            <ul>
                <li v-for="(task, index) in tasksOrdered" :key="task.id">
                    <span v-if="task.done">@{{ `${index}: Tarea realizada - ${task.title}` }}</span>
                    <span v-else>@{{ `${index}: Tarea pendiente - ${task.title}` }} <input type="checkbox" :id="'chk_'+index" v-on:click="done('chk_'+index, task)" :ref="'chk_'+index"><label :for="'chk_'+index">Realizar</label></span>
                </li>
            </ul>

            <input type="text" id="newTask" v-model="newTask">
            <input type="button" v-on:click="tasks.push({title: newTask, done: false, id: new Date().getTime()})" value="Añadir nueva tarea">

        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>El atributo <strong>":key"</strong> o <strong>"v-bind:key"</strong> debe ser una clave única para identificar un elemento en la lista y actualizar solo los elementos modificados, en lugar de todos.</p>
            <p>Si el orden de una lista varía al cambiar el contenido de un elemento, Vue copia el contenido a la nueva posición del elemento, permaneciendo a nivel de DOM. Esto es un error, dado que debería mover el contendio a nivel de DOM en lugar de copiarlo. Par ello se necesita asignar una clave única mediante <strong>":key"</strong> a cada elemento par identificarlo.</p>
            <p>Ahora bien, si queremos ver la lista ordenada, lo haremos mediante la propiedad computada <strong>"tasksOrdered"</strong> en lugar de <strong>"tasks"</strong>.</p>
<pre><code>
&lt;li v-for="(task, index) in tasksOrdered" :key="task.id"&gt;...&lt;/li&gt;
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
            document.getElementById('newTask').focus();
        },
        data: {
            title: 'Bucle v-for y key',
            subtitle: 'V-for',
            lesson: '',
            newTask: '',
            tasks: [
                {title: 'Recoger tarta', done: true, id: 1000},
                {title: 'Enviar postal', done: false, id: 1001},
                {title: 'Llamar al trabajo', done: true, id: 1002}
            ]
        },
        computed: {
            tasksOrdered() {
                return this.tasks.sort((a, b) => b.title.localeCompare(a.title))
                                    .sort((a, b) => a.done ? -1 : 1)
            }
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
