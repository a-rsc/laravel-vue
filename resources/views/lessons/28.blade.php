@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1 class="title">@{{ title }}<span>@{{ lesson }}</span></h1>
            <my-reactiviy :prop-person="{ 'firstname': 'Álvaro', 'lastname': 'Rodríguez'}"></my-reactiviy>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
        </div>
    </div>
</div>
@endsection

@section('vuejs')
<script>
    let MyReactivityComponent = Vue.component('my-reactiviy', {
        template: `<div component="my-reactiviy">
                    <p v-if="person"><b>(Reactividad Objeto) Persona:</b>
                        <span>@{{ person.firstname }} @{{ person.lastname }} @{{ person.age }}</span>
                    </p>
                    <input type="text" id="inputText" v-model="name" v-on:change="onChangeName" placeholder="name">
                    <p><b>(Reactividad) Edad: </b>@{{ edad }}</p>
                    <input type="number" v-model="edad" value="15" placeholder="edad">
                    <input type="button" v-on:click="deleteFirstname" value="Borrar nombre">
                    <input type="button" v-on:click="addFirstname" value="Añade nombre">
                    <input type="button" v-on:click="deleteAge" value="Borrar edad">
                    <input type="button" v-on:click="addAge" value="Añade edad">
                </div>`
        ,
        mounted() {
            document.getElementById('inputText').focus();
        },
        data() {
            return {
                person: this.propPerson, name: 'Álvaro', edad: 15
            }
        },
        watch: {
            // name() { this.person.firstname = this.name; }
        },
        methods: {
            onChangeName() {
                Vue.set(this.person, 'firstname', this.name);
            },
            addFirstname() {
                this.person.firstname = this.name;
            },
            deleteFirstname() {
                this.name = '',
                Vue.delete(this.person, 'firstname');
            },
            addAge() {
                this.person.age = this.edad;
            },
            deleteAge() {
                // this.edad = null,
                Vue.delete(this.person, 'age');
            },
        },
        props: {
            propPerson: {type: Object}
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
            title: 'Reactividad Data',
            subtitle: 'Reactividad',
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
