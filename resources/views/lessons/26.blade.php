@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <my-props prop-required="Hola mundo!" prop-multiple-value="25-10-1984" :prop-array="['España', 'Europa', 'Mundo']" :prop-object="{'Name': 'Ramón', 'LastName': 'Serrano Valero', 'Age': 34}"></my-translator>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    let MyProps = Vue.component('my-props', {
        template: `<div component="my-props">
                    <p>Texto requerido: @{{ myRequired }}*</p>
                    <p>Texto no requerido: @{{ myNotRequired }}*</p>
                    <p>Múltiple Valor: @{{ myMultipleValue }}</p>
                    Array: <ul><li v-for="item in myArray">@{{ item }}</li></ul>
                    <p>Objeto: @{{ CompleteName }}</p>
                </div>`
        ,
        data() {
            return {
                myRequired: this.propRequired,
                myNotRequired: this.propNotRequired,
                myMultipleValue: this.propMultipleValue,
                myArray: this.propArray
            }
        },
        computed:{
            CompleteName() {
                if (this.propObject && this.propObject.Name && this.propObject.LastName)
                    return `${this.propObject.Name} ${this.propObject.LastName}`;
                else
                    return '-- Falta Nombre --';
            }
        },
        props: {
            propRequired: {type: String, required: true},
            propNotRequired: {type: String, required: false},
            propArray: {type: Array, default: () => { return []; }, validator: values => { return values && values.length > 0}},
            propObject: {type: Object, default: () => { return {}}},
            propMultipleValue: [Number, String, Date]
        },
        methods: {
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
        },
        data: {
            title: 'Componente tipo propiedades',
            subtitle: 'Tipos de propiedades',
            lesson: ''
        },
        components: {
            'my-props': MyProps
        },
        methods: {
        }
    });
</script>
@endsection
