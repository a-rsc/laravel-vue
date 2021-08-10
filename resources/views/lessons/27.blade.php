@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <input type="text" id="valueData" v-model="valueData">
            <p>Valor no componente: @{{ valueData }}</p>
            <my-props-component :prop-value="valueData"></my-props-component>
            <hr>
            <input type="text" id="valueData2" v-model="valueData2">
            <p>Valor no componente: @{{ valueData2 }}</p>
            <my-props-component2 :prop-value2="valueData2"></my-props-component2>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Hasta ahora, enviábamos un valor a un componente, recibiéndolo por las props, sin embargo, no hemos probado que ocurriría si actualizásemos dicho valor. ¿Refrescaría su valor el componente?</p>
            <p>Definimos dentro de la instancia de la aplicación, una caja de texto cuyo valor realice "data-bind" con la variable "valueData" del data de la aplicación cada vez que modifiquemos el texto de este input. Además, instanciamos el componente "my-props-component" que crearemos, al que proporcionamos por su propiedad "prop-value", el valor de esta variable del data de la aplicación.</p>
            <p>Creamos el componente "my-props-componente", en que que definimos una propiedad de tipo texto "propValue", en las props. Esta inicializa el valor de la variable local "myValue", del data del componente.</p>
            <p>Abrimos la página html en el navegador, veremos el valor "Valor inicial" tanto en el input como en el componente, dado que es el valor con el que inicializamos dicha variable de la aplicación y es recibida correctamente por las props del componente, pero el componente no representa dichos cambios.</p>
            <p>Esto se debe a que el valor proporcionado en las props inicializa las variables del data del componente la primerva vez. De modo que, al recibir actualizaciones, el valor de dicha propiedad no lo controlamos en el componente.</p>
            <p>Para controlar estos cambios de valor debemos hacer uso de las "watch", y en este caso observar cambios en la propiedad "propValue", por lo que si añadimos este "watch" al componente, asignamos el nuevo valor recibido al data. Abrimos de nuevo la página en el navegador y al cambiar el valor, el componente actualiza la vista.</p>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    let MyPropsComponent = Vue.component('my-props-component', {
        template: `<p component="my-props-component">Valor componente: @{{ myValue }}</p>`
        ,
        data() {
            return {
                myValue: this.propValue
            }
        },
        props: {
            propValue: {type: String, required: true}
        }
    });

    let MyPropsComponent2 = Vue.component('my-props-component2', {
        template: `<p component="my-props-component2">Valor componente: @{{ myValue2 }}</p>`
        ,
        watch: {
            propValue2() { this.myValue2 = this.propValue2 }
        },
        data() {
            return {
                myValue2: this.propValue2
            }
        },
        props: {
            propValue2: {type: String, required: true}
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
            document.getElementById('valueData').focus();
        },
        data: {
            title: 'Cambiar valor de props',
            subtitle: 'Cambio valor',
            lesson: '',
            valueData: 'Valor inicial',
            valueData2: 'Valor inicial'
        },
        components: {
            'my-props-component': MyPropsComponent,
            'my-props-component2': MyPropsComponent2
        },
        methods: {
        }
    });
</script>
@endsection
