@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div id="app" class="flex-item flex-item-content">
        <div>
            <h1>@{{ subtitle }}</h1>
            <h2>Eres de perros o gatos?</h2>
            <select name="pet" id="pet" v-model="pet" v-on:change="choosePet">
                <option value="none" selected>Escoge tu respuesta</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
            </select>
            <div v-if="pet == 'dog' || pet == 'cat' ">
                <div v-if="pet == 'dog'">
                    <h2>Woof!</h2>
                    <img v-bind:src="image" alt="dog">
                </div>
                <div v-else-if="pet == 'cat'">
                    <h2>Miau!</h2>
                    <img v-bind:src="image" alt="cat">
                </div>
            </div>
        </div>

        <div class="lesson">
            <h2>@{{ subtitle }}</h2>
            <p>Durante el desarrollo de una aplicación es posible que queramos renderizar un bloque u otro en función de una condición. En este caso, haremos uso de las directivas <strong>v-if</strong> y <strong>v-else</strong>.</p>
            <p>La directiva <strong>v-if</strong> siempre contiene una condición en su interior, del estilo <strong>v-if="miCondicion"</strong>, si quisiéramos añadir una segunda alternativa, proseguiríamos con un <strong>v-else-if</strong>, también acompañada por una condición en su interior. En caso de añadir la condición de, si no se han cumplido ninguna de las anteriores, utilizaríamos la directiva <strong>v-else</strong>, sin condición.</p>
            <p>En este caso, necesitaremos una propiedad de la instancia Vue que denominaremos, pet, que ligaremos con la directiva <strong>v-model</strong> al selector. Al seleccionar uno de los valores posibles se dispara un cambio en las diferentes propiedades de la instancia. Posteriormente crearemos los dos bloques con el contenido opcional y los marcaremos con las directivas <strong>v-if</strong> y <strong>v-else</strong>.</p>
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
        },
        data: {
            title: 'Condicionales',
            subtitle: 'Uso v-if y v-else',
            lesson: '',
            pet: 'none',
            image: ''
        },
        updated() {
            console.log(this.pet);
        },
        methods: {
            choosePet() {
                this.image = `https://loremflickr.com/320/240/${this.pet}`;
            }
        },
    });
</script>
@endsection
