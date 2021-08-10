@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <my-reactivity />
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Cuando queramos forzar la reactividad, podemos hacer uso de <mark>Vue.nextTick</mark>, dado que lo que incluyamos dentro, se ejecutará tras haber finalizado la asignación en el DOM.</p>
            <p>La reactividad es muy caprichosa, la vista no se refresca a no ser que <strong>la variable del data observada cambie de valor</strong>, sin embargo nos preguntamos <mark>¿qué ocurriría en caso de querer forzar la reactividad asignando un mismo valor?</mark></p>
            <p>Veremos cómo la reactividad ocurre la primera vez que cambia el valor de la variable, pero no en sucesivos y cómo forzar esta reactividad.</p>
            <p>Declaramos un watch, de tal forma que cuando ocurran cambios sobre esta variable realice el focus sobre el input, en caso de tener el valor a true.</p>
            <p>Abrimos la página html, al pulsar el botón, como el valor de la variable era falso, entra en el método y establece el valor a cierto. El <strong>"watch"</strong> detecta el cambio y realiza el foco. Si lo intentamos de nuevo, no vuelve a realizar el foco porque el valor era cierto y al volver a serlo, por lo que el watch no detecta cambios y la reactividad no ocurre.</p>
            <p>Modificamos el código del método, en lugar de asignar siempre a cierto, lo inicializamos a falso, dejamos que dicho valor forme parte del DOM y tras esto, se ejecuta el bloque <strong>"Vue.nextTick"</strong>, donde cambios el valor a cierto.</p>
            <p>Abrimos de nuevo el html, el valor es falso, al pulsar ponemos su valor a falso y tras asignarlo al DOM, se ejecuta el bloque <strong>"nextTick"</strong> cambiando su valor a true, por lo que el watch detecta el cambio y ocurre la reactividad.</p>
            <p>Ahora el valor es cierto, pulsamos de nuevo, cambia el valor a falso, lo asigna al DOM y tras esto en el <strong>"nextTick"</strong>, cambiamos a cierto, detectamos el cambio y ocurre la reactividad.</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    let MyReactivityComponent = Vue.component('my-reactivity', {
        template: `<div component="my-reactiviy">
                    <p>Focus: @{{ focus }}</p>
                    <input type="text" id="nombre" ref="nombreRef" placeholder="nombre" v-model="nombre">
                    <input type="button" v-on:click="DoFocus" value="Hacer foco!">
                </div>`
        ,
        data() {
            return {
                nombre: 'Álvaro',
                focus: false
            }
        },
        watch: {
            focus: function() {
                console.log('Focus: ' + this.focus);
                if (this.focus) {
                    this.$refs.nombreRef.focus();
                }
            }
        },
        methods: {
            DoFocus() {
                // this.focus = true;

                this.focus = false;
                Vue.nextTick(() => {
                    this.focus = true;
                })
            }
        }
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
            document.getElementById('nombre').focus();
        },
        data: {
            title: 'Reactividad NextTick',
            subtitle: 'NextTick',
            lesson: ''
        },
        components: {
            'my-reactivity': MyReactivityComponent
        },
        methods: {
        }
    });
</script>
@endsection
